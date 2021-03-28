<?php

include '../../connection.php';

class data{}

$namaKategori = $_POST['namaKategori'];

$query = "INSERT INTO `kategorikendaraan`( `namaKategori`) 
 VALUES ('$namaKategori') ";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if ($result == true) {
    $response = new data();
    $response->success = TRUE;
    $response->message = "Sukses Menambah Kategori";
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Gagal Menambah Kategori";
    die(json_encode($response));
}

mysqli_close($dbc);