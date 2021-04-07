<?php

class data{}

include '../../connection.php';

$userID = $_POST['userID'];

$query="SELECT a.idReport, a.orderID, a.hargaFinal, a.hargaKetFinal, a.tanggalOrder, a.tanggalSelesaiOrder, c.namaLengkap 
FROM laporan a 
INNER JOIN booking b ON a.orderID = b.orderID 
INNER JOIN member c ON b.userID = c.idMember
WHERE b.userID='$userID' ";

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