<?php

include '../../connection.php';

$orderID = $_POST['orderID'];
$adminID = $_POST['adminID'];

$curTime = date('Y-m-d H:i:s');

$sql = "SELECT a.orderID, a.tanggalOrder, a.waktuOrder, b.harga, b.keterangan 
        FROM booking a 
        INNER JOIN jenisharga b ON a.idHarga = b.idHarga 
        WHERE orderID='$orderID' ";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $tanggalOrder = $row['tanggalOrder'] . " " . $row['waktuOrder'];
    $harga = $row['harga'];
    $keterangans = $row['keterangan'];

    $keterangan = "Pembayaran di terima pihak Cimoling";

    $query = "";
    $query = $query . " UPDATE booking SET statusOrder='6' WHERE orderID='$orderID' ; ";
    $query = $query . " INSERT INTO bookingValue (orderID, keterangan, status, userAdmin ) 
                        VALUES ('$orderID', '$keterangan', '6', '$userID') ; ";

    $query = $query . " INSERT INTO laporan (orderID, hargaFinal, hargaKetFinal, tanggalOrder, tanggalSelesaiOrder  ) 
    VALUES ('$orderID', '$harga' ,'$keterangans', '$tanggalOrder', '$curTime' ) ; ";

    if (mysqli_multi_query($dbc, $query)) {
        echo json_encode(array(
            "success" => true,
            "message" => "Sukses Proses Order"
        ));
    } else {
        echo json_encode(array(
            "success" => false,
            "message" => "Gagal"
        ));
    }
}


// mysqli_close($dbc);
