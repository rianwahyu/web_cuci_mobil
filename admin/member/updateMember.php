<?php 

include '../../connection.php';

$idMember = $_POST['idMember'];
$namaLengkap = $_POST['namaLengkap'];
$alamat = $_POST['alamat'];
$noHp = $_POST['noHp'];

$query = " UPDATE member SET namaLengkap='$namaLengkap', alamat='$alamat', noHp='$noHp' WHERE idMember='$idMember' ";
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