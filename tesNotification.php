<?php
$apikey = "AAAAQn1qnC0:APA91bH6yz5xCKah26YNoOhqlgxM5Oy9gYYLH1jbcRz1OovCMg7UJLYLdHEfmNXWqs1dQ6NlAMx3n7Q-El27zN1tvgpgz4BiMEhqONrDjME9PVQHxgdzUE5lw1z4BsiNiuz_Mk9Ag8tZ";
$action = isset($_POST['action']) ? $_POST['action'] : '';
$topic = $_POST['topic'];
$firebase_tokens = $_POST['firebase_token'];
$firebase_api = $apikey;
$send_to = $_POST['send_to'];

require_once __DIR__ . '/notification.php';
$notification = new Notification();
$headers = array(
    'Authorization: key=' . $firebase_api,
    'Content-Type: application/json'
);
$url = 'https://fcm.googleapis.com/fcm/send';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$requestData = $notification->getNotification();
$fields = array(
    'to' => $firebase_tokens,
    'data' => $requestData,
);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
if ($result === FALSE) {
    die('Curl failed: ' . curl_error($ch));
}
echo json_encode($fields);
curl_close($ch);
