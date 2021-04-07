<?php

class data{}

include '../../connection.php';

$start = $_POST['start']." 00:00:00";
$end = $_POST['end']. " 23:59:00";

$query="SELECT a.idReport, a.orderID, a.hargaFinal, a.hargaKetFinal, a.tanggalOrder, a.tanggalSelesaiOrder, c.namaLengkap 
FROM laporan a 
INNER JOIN booking b ON a.orderID = b.orderID 
INNER JOIN member c ON b.userID = c.idMember
WHERE a.tanggalOrder BETWEEN '$start' AND '$end' ";

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