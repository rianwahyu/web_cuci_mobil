<?php

class usr{}

include '../connection.php';

$sql = "SELECT * FROM `ketentuan` WHERE id='1' ";
$result = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $response = new usr();
    $response->success = TRUE;
    $response->message ="Mendapatkan data";    
    $response->nama = $row['namaLengkap'];
    $response->deskripsi = $row['deskripsi'];
    die(json_encode($response));
}else{
    $response = new usr();
    $response->success = FALSE;
    $response->message ="Gagal mendapatkan data";    
    die(json_encode($response));
}
?>