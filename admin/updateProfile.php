<?php 

include '../connection.php';
class data{}

$userID = $_POST['userID'];
$namaLengkap = $_POST['namaLengkap'];
$email = $_POST['email'];
$statusPassword = $_POST['statusPassword'];
$strPassword = $_POST['strPassword'];
$passwordLama = MD5($_POST['passwordLama']);
$passwordBaru = MD5($_POST['passwordBaru']);

if($statusPassword=="1"){
    if($strPassword==$passwordLama){
        $query = " UPDATE `administrator` SET `namaLengkap`='$namaLengkap',`email`='$email', password='$passwordBaru' WHERE idAdmin='$userID' ";
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
    }else{
        $response = new data();
        $response->success = false;
        $response->message = "Password lama tidak sesuai";    
        die(json_encode($response));
    }
}else{
    $query = " UPDATE `administrator` SET `namaLengkap`='$namaLengkap',`email`='$email' WHERE idAdmin='$userID' ";
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
}



?>