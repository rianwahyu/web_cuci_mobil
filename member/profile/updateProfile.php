<?php 

include '../../connection.php';
class data{}

$userID = $_POST['userID'];
$namaLengkap = $_POST['namaLengkap'];
$alamat = $_POST['alamat'];
$noHp = $_POST['noHp'];

$query = " UPDATE `member` SET namaLengkap='$namaLengkap', alamat='$alamat', noHp='$noHp' WHERE idMember='$userID' ";
$result = mysqli_query($dbc, $query);
if ($result == true) {
    $response = new data();
    $response->success = true;
    $response->message = "Berhasil update data";    
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = false;
    $response->message = "Gagal update data";    
    die(json_encode($response));
}
?>