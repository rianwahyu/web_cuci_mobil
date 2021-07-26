<?php 

include '../../connection.php';

$idMember = $_POST['idMember'];
$keteranganBanned = $_POST['keteranganBanned'];
$curTime = date('Y-m-d H:i:s');

$query = "UPDATE member SET banned='1', tanggalBanned='$curTime', keteranganBanned ='$keteranganBanned' WHERE idMember='$idMember'  ";
$result = mysqli_query($dbc, $query);

if($result == true){
     echo json_encode(array(
         "success" => true,
         "message" => "Sukses "
         ));
}else{
     echo json_encode(array(
         "success" => false,
         "message" => "Gagal"
         ));
}