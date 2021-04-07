<?php 

include '../../connection.php';

class data{}


$query = "SELECT * FROM `member` WHERE 1 ";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result) >= 1) {

    while($data = mysqli_fetch_array($result)){
        $myArray[] = $data;
    }

    $response = new data();
    $response->success = TRUE;
    $response->message = "Berhasil Mendapatkan Data";
    $response->data = $arrays = array_values($myArray);;
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Tidak ada Data";
    die(json_encode($response));
}

mysqli_close($dbc);