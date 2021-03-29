<?php

include '../../connection.php';

class data{}

$idHarga = $_POST['idHarga'];
$keterangan = $_POST['keterangan'];
$harga = $_POST['harga'];

$query = "UPDATE `jenisharga` SET `keterangan`='$keterangan', `harga`='$harga' 
WHERE idHarga='$idHarga' ";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if ($result == true) {
    $response = new data();
    $response->success = TRUE;
    $response->message = "Sukses Update Harga";
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Gagal Update Harga";
    die(json_encode($response));
}

mysqli_close($dbc);