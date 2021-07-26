<?php 

include '../../connection.php';

$idMember = $_POST['idMember'];

$query = "UPDATE member SET banned='0' WHERE idMember='$idMember'  ";
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