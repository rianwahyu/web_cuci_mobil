<?php 

include '../connection.php';

class data{}

$userID = $_POST['userID'];

$query = "SELECT * FROM `notifikasi` WHERE userID='$userID' ORDER BY idNotifikasi DESC LIMIT 1 ";
//echo $query;
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $response = new data();
    $response->success = true;
    $response->message = "Berhasil mendapatkan data";
    $response->judul = $row['judul'];
    $response->pesan = $row['pesan'];
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = false;
    $response->message = "Gagal mendapatkan data";
    die(json_encode($response));
}

?>