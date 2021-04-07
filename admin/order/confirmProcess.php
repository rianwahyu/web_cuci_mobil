<?php 

include '../../connection.php';

$orderID = $_POST['orderID'];
$userID = $_POST['userID'];

$keterangan = "Cimoling konfirmasi order dan menuju lokasi pelanggan";
$keteranganDetail = "Selamat Pesanan telah di konfirmasi oleh admin, mohon menunggu cimoling menuju lokasi anda";

$query = "";
$query = $query. " UPDATE booking SET statusOrder='2' WHERE orderID='$orderID' ; ";
$query = $query. " INSERT INTO bookingValue (orderID, keterangan, status, userAdmin ) 
VALUES ('$orderID', '$keterangan', '2', '$userID') ; ";

$tokenMember = getTokenMember($orderID);
$idMember = getMemberID($orderID);

if (mysqli_multi_query($dbc, $query)) {
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses Proses Order"
    ));

    sendNotif($keterangan, $keteranganDetail, $tokenMember, $idMember);
}else{
    echo json_encode(array(
        "success" => false,
        "message" => "Gagal"
    ));
}

function sendNotif($keterangan, $keteranganDetail, $tokenMember, $idMember){
    include '../../connection.php';
    require_once __DIR__ . '/../../notification.php';
    $notification = new Notification();
    $title = $keterangan;
    $message = $keteranganDetail;
    $imageUrl = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $action = "activity";

    $actionDestination = "HomeMember";
    $notification->setTitle($title);
    $notification->setMessage($message);
    $notification->setImage($imageUrl);
    $notification->setAction($action);
    $notification->setActionDestination($actionDestination);
    
    $firebase_token = $tokenMember;
    $firebase_api = "AAAAQn1qnC0:APA91bH6yz5xCKah26YNoOhqlgxM5Oy9gYYLH1jbcRz1OovCMg7UJLYLdHEfmNXWqs1dQ6NlAMx3n7Q-El27zN1tvgpgz4BiMEhqONrDjME9PVQHxgdzUE5lw1z4BsiNiuz_Mk9Ag8tZ";
    
    $topic = $_POST['topic'];
    
    $requestData = $notification->getNotification();
    
    if ($_POST['send_to'] == 'topic') {
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

    $query = "INSERT INTO `notifikasi`(judul, `pesan`, `userID`) VALUES ('$title', '$message', '$idMember')";    
    $res = mysqli_query($dbc, $query);
    if ($res == true) {        
    }
    
}

function getTokenMember($orderID){
    include '../../connection.php';

    $query = "SELECT b.token FROM booking a INNER JOIN member b ON a.userID=b.idMember";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);

    return $row['token'];
}

function getMemberID($orderID){
    include '../../connection.php';

    $query = "SELECT b.idMember FROM booking a INNER JOIN member b ON a.userID=b.idMember";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);

    return $row['idMember'];
}
//mysqli_close($dbc);
