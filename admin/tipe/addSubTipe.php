<?php

include '../../connection.php';

class data{}

$idKategori = $_POST['idKategori'];
$namaJenis = $_POST['namaJenis'];

$query = "INSERT INTO `jeniskendaraan`(`idKategori`, `namaJenis`) 
VALUES ('$idKategori', '$namaJenis')";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if ($result == true) {
    $response = new data();
    $response->success = TRUE;
    $response->message = "Sukses Menambah Jenis";
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Gagal Menambah Jenis";
    die(json_encode($response));
}

mysqli_close($dbc);