<?php 

class data{}

include '../connection.php';

$query = "SELECT a.orderID, a.userID, b.namaLengkap 
         FROM booking a INNER JOIN member b ON a.userID=b.idMember 
         WHERE a.statusOrder='0' 
         ORDER BY a.orderID DESC LIMIT 1 ";
// /echo $query;
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);

if (!empty($row)) {
    $response = new data();
    $response->success = true;
    $response->message = "Berhasil mendapatkan data";
    $response->orderID = $row['orderID'];
    $response->userID = $row['userID'];
    $response->namaLengkap = $row['namaLengkap'];
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = false;
    $response->message = "Tidak ada data";    
    die(json_encode($response));
}