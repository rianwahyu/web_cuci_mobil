<?php

include '../../connection.php';

$kode = "CML";
$orderID = "";
$sql = "SELECT orderID  FROM booking ORDER BY orderID DESC LIMIT 1 ";
$res  = mysqli_query($dbc, $sql);
$data = mysqli_fetch_assoc($res);
if (mysqli_num_rows($res) < 1) {
    $orderID = $kode . "0000001";
} else {
    $id = $data["orderID"];
    $id = substr($id, 3);
    $orderID = $kode . str_pad($id + 1, 7, 0, STR_PAD_LEFT);
}

//echo $orderID;

$userID = $_POST['userID'];
$tipeKendaraan = $_POST['tipeKendaraan'];
$idKategori = $_POST['idKategori'];
$idJenis = $_POST['idJenis'];
$idHarga = $_POST['idHarga'];
$alamatOrder = $_POST['alamatOrder'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
// $tanggalOrder = $_POST['tanggalOrder'];
// $waktuOrder = $_POST['waktuOrder'];

$tanggalOrder = date('Y-m-d');
$waktuOrder = ('H:i:s');

$curDate = date('Y-m-d h:i:s');

$query = "";
$query = $query. " INSERT INTO `booking`(`orderID`, `userID`, `tipeKendaraan`, `idKategori`, `idJenis`, `idHarga`, `alamatOrder`, `latitude`, `longitude`, `tanggalOrder`, `waktuOrder`, `statusOrder`) 
VALUES ('$orderID', '$userID', '$tipeKendaraan', '$idKategori', '$idJenis', '$idHarga', '$alamatOrder', '$latitude', '$longitude', '$tanggalOrder', '$waktuOrder', '0') ;";

$query = $query. " INSERT INTO `bookingValue`( `orderID`, `keterangan`, `status`, `tanggalValue`, `userAdmin`) VALUES ('$orderID', 'Pesanan telah dibuat', '0', '$curDate', '' ) ;";

if (mysqli_multi_query($dbc, $query)) {
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses Booking Cuci Mobil"
    ));
    sendNotif();
}else{
    echo json_encode(array(
        "success" => false,
        "message" => "Gagal Booking"
    ));
}

function sendNotif(){
    include '../../connection.php';
    require_once __DIR__ . '/../../notification.php';
    $notification = new Notification();
    $title = "Order Baru";
    $message = "Adna mendapatkan order baru, silahkan cek notifikasi dan aplikasi Cimoling";
    $imageUrl = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $action = "activity";
    $send_to = "topic";

    $actionDestination = "HomeAdmin";
    $notification->setTitle($title);
    $notification->setMessage($message);
    $notification->setImage($imageUrl);
    $notification->setAction($action);
    $notification->setActionDestination($actionDestination);
    
    $firebase_token = "";
    $firebase_api = "AAAAQn1qnC0:APA91bH6yz5xCKah26YNoOhqlgxM5Oy9gYYLH1jbcRz1OovCMg7UJLYLdHEfmNXWqs1dQ6NlAMx3n7Q-El27zN1tvgpgz4BiMEhqONrDjME9PVQHxgdzUE5lw1z4BsiNiuz_Mk9Ag8tZ";
    
    $topic = "adminCimoling";
    
    $requestData = $notification->getNotification();
    
    if ($send_to == 'topic') {
        $fields = array(
            'to' => '/topics/' . $topic,
            'data' => $requestData,
        );
    } else {
        $fields = array(
            'to' => $firebase_token,
            'data' => $requestData,
        );
    }    
    $url = 'https://fcm.googleapis.com/fcm/send';
    
    $headers = array(
        'Authorization: key=' . $firebase_api,
        'Content-Type: application/json'
    );    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));    
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }    
    curl_close($ch);
    
}

mysqli_close($dbc);