<?php

class usr
{
}

date_default_timezone_set('Asia/Jakarta');
include('connection.php');

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM administrator WHERE email='$email' AND password='$password' ";
$result = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $response = new usr();
    $response->success = TRUE;
    $response->message ="Selamat Datang Admin ";
    $response->id = $row['idAdmin'];
    $response->access = 'Admin';
    die(json_encode($response));

}else{
    // $querys = "SELECT * FROM `pengguna` WHERE email='$email' AND password='$password' ";
    // $results = mysqli_query($dbc, $querys) or die(mysqli_error($dbc));
    // $rows = mysqli_fetch_array($results);
    // if (!empty($rows)) {
    //     $response = new usr();
    //     $response->success = TRUE;
    //     $response->message ="Selamat Datang " .$row['namaLengkap'];
    //     $response->id = $rows['nip'];
    //     $response->access = 'Pengguna';
    //     die(json_encode($response));
    // }else{
    //     $response = new usr();
    //     $response->success = FALSE;
    //     $response->message ="Akun tidak ditemukan, mohon periksa kembali email dan password anda";
    //     die(json_encode($response));
    // }   
}

mysqli_close($dbc);