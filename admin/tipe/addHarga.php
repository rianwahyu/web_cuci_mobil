<?php

include '../../connection.php';

class data{}

$idJenis = $_POST['idJenis'];
$keterangan = $_POST['keterangan'];
$harga = $_POST['harga'];

$query = "INSERT INTO `jenisharga`(`idJenis`, `keterangan`, `harga`) 
VALUES ('$idJenis', '$keterangan', '$harga')";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if ($result == true) {
    $response = new data();
    $response->success = TRUE;
    $response->message = "Sukses Menambah Harga";
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Gagal Menambah Harga";
    die(json_encode($response));
}

mysqli_close($dbc);