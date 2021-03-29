<?php

include '../../connection.php';

class data{}

$idJenis = $_POST['idJenis'];
$namaJenis = $_POST['namaJenis'];

$query = "UPDATE `jeniskendaraan` SET `namaJenis`='$namaJenis' WHERE idJenis='$idJenis' ";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if ($result == true) {
    $response = new data();
    $response->success = TRUE;
    $response->message = "Sukses Update Jenis";
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Gagal Update Jenis";
    die(json_encode($response));
}

mysqli_close($dbc);