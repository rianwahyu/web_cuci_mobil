<?php

include '../../connection.php';

class data{}

$statusOrder = $_POST['statusOrder'];

$query = " SELECT a.orderID, a.userID, a.tipeKendaraan , a.alamatOrder, a.latitude, a.longitude, a.tanggalOrder, a.waktuOrder, a.statusOrder, e.harga, e.keterangan as ketHarga, b.namaLengkap
FROM booking a 
INNER JOIN member b ON a.userID = b.idMember
INNER JOIN kategorikendaraan c ON a.idKategori = c.idKategori
INNER JOIN jeniskendaraan d ON a.idJenis = d.idJenis
INNER JOIN jenisharga e ON a.idHarga = e.idHarga 
WHERE a.statusOrder = '$statusOrder' ";

$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result) >= 1) {
    while($data = mysqli_fetch_array($result)){
        $myArray[]=$data;
    }

    $response = new data();
    $response->success = TRUE;
    $response->message = "Berhasil Mendapatkan Data";
    $response->data = $myArray;
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Tidak ada Data";
    die(json_encode($response));
}

mysqli_close($dbc);