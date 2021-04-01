<?php

include '../../connection.php';

class data{}

$idNotifikasi = $_POST['idNotifikasi'];

$query = " DELETE FROM `notifikasi` WHERE idNotifikasi='$idNotifikasi' "; 

$result = mysqli_query($dbc, $query);
if($result == true){
    $response = new data();
    $response->success = TRUE;
    $response->message = "Berhasil menghapus notifikasi";    
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Gagal menghapus notifikasi";    
    die(json_encode($response));
}

mysqli_close($dbc);