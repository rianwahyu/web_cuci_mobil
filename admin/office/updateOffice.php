<?php 

class usr{}

include '../../connection.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$jarakMax = $_POST['jarakMax'];

$query = "UPDATE office SET nama='$nama', alamat='$alamat', latitude='$latitude', longitude='$longitude', jarakMax='$jarakMax' WHERE id='1' ";
$result = mysqli_query($dbc, $query);
if($result == true){
    $response = new usr();
    $response->success = TRUE;
    $response->message ="Sukses";        
    die(json_encode($response));
}else{
    $response = new usr();
    $response->success = FALSE;
    $response->message ="Gagal";        
    die(json_encode($response));
}