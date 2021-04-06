<?php 

include '../../connection.php';

$orderID = $_POST['orderID'];
$userID = $_POST['userID'];

$keterangan = "Pembayaran di terima pihak Cimoling";

$query = "";
$query = $query. " UPDATE booking SET statusOrder='6' WHERE orderID='$orderID' ; ";
$query = $query. " INSERT INTO bookingValue (orderID, keterangan, status, userAdmin ) 
VALUES ('$orderID', '$keterangan', '6', '$userID') ; ";

if (mysqli_multi_query($dbc, $query)) {
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses Proses Order"
    ));
}else{
    echo json_encode(array(
        "success" => false,
        "message" => "Gagal"
    ));
}

mysqli_close($dbc);
