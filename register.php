<?php

class usr
{
}

date_default_timezone_set('Asia/Jakarta');
include('connection.php');

$idMember = $_POST['idMember'];
$namaLengkap = $_POST['namaLengkap'];
$noHp = $_POST['noHp'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "INSERT INTO `member`(`idMember`, `namaLengkap`, `noHp`, `email`, `password` ) 
VALUES ('$idMember', '$namaLengkap', '$noHp', '$email', '$password')";

$result = mysqli_query($dbc, $sql);
if ($result == true) {
    $response = new usr();
    $response->success = TRUE;
    $response->message = "Sukses registrasi, cek email anda untuk verifikasi";
    die(json_encode($response));
} else {
    $response = new usr();
    $response->success = FALSE;
    $response->message = mysqli_error($dbc);
    die(json_encode($response));
}

mysqli_close($dbc);
