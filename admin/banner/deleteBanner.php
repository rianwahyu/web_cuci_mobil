<?php 

include '../../connection.php';

class data{}

$idBanner= $_POST['idBanner'];
$query ="DELETE FROM `banner` WHERE `idBanner`='$idBanner' ";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if ($result == true) {
    $response = new data();
    $response->success = TRUE;
    $response->message = "Sukses Hapus";
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Gagal Hapus";
    die(json_encode($response));
}

mysqli_close($dbc);