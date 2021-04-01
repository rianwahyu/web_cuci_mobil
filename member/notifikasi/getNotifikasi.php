<?php

include '../../connection.php';

class data{}

$userID = $_POST['userID'];

$query = " SELECT * FROM notifikasi WHERE userID='$userID' ORDER BY idNotifikasi DESC "; 

$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result) >= 1) {
    while($data = mysqli_fetch_array($result)){
        $myArray[]=$data;
    }
    $response = new data();
    $response->success = TRUE;
    $response->message = "Berhasil Mendapatkan Data";
    $response->data = $myArray;
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Tidak ada Data";
    die(json_encode($response));
}

mysqli_close($dbc);