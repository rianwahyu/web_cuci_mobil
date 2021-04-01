<?php

include '../connection.php';

$userID = $_POST['userID'];
$token = $_POST['token'];

class data{}

$query = "UPDATE member SET token= '$token' WHERE idMember='$userID' ";
$result = mysqli_query($dbc, $query);
if ($result == true) {
    $response = new data();
    $response->success = TRUE;
    $response->message = "Berhasil Update Token";
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Gagal Update";
    die(json_encode($response));
}

mysqli_close($dbc);
