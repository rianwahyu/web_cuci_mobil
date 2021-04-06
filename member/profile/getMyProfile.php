<?php 

include '../../connection.php';
class data{}
$userID = $_POST['userID'];

$query = " SELECT * FROM `member` WHERE idMember='$userID' ";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
//echo $query;
if (!empty($row)) {
    $response = new data();
    $response->success = true;
    $response->message = "Berhasil mendapatkan data";
    $response->namaLengkap = $row['namaLengkap'];
    $response->alamat = $row['alamat'];
    $response->noHp = $row['noHp'];
    $response->email = $row['email'];
    $response->tanggalRegistrasi = $row['tanggalRegistrasi'];
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = false;
    $response->message = "Gagal mendapatkan data";    
    die(json_encode($response));
}
?>