<?php

if(isset($_POST['title'])){
    include '../connection.php';
    require_once __DIR__ . '/../notification.php';
    $notification = new Notification();
    
    $title = $_POST['title'];
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $imageUrl = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    $actionDestination = isset($_POST['action_destination']) ? $_POST['action_destination'] : '';
    
    if ($actionDestination == '') {
        $action = '';
    }
    $notification->setTitle($title);
    $notification->setMessage($message);
    $notification->setImage($imageUrl);
    $notification->setAction($action);
    $notification->setActionDestination($actionDestination);
    
    $firebase_token = $_POST['firebase_token'];
    $firebase_api = $_POST['firebase_api'];
    
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
    
    // Set POST variables
    $url = 'https://fcm.googleapis.com/fcm/send';
    
    $headers = array(
        'Authorization: key=' . $firebase_api,
        'Content-Type: application/json'
    );
    
    // Open connection
    $ch = curl_init();
    
    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Disabling SSL Certificate support temporarily
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    
    // Execute post
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    // Close connection
    curl_close($ch);
    
    echo '<h2>Result</h2><hr/><h3>Request </h3><p><pre>';
    echo json_encode($fields, JSON_PRETTY_PRINT);
    echo '</pre></p><h3>Response </h3><p><pre>';
    echo $result;
    echo '</pre></p>';
    
    $query = "INSERT INTO `notifikasi`(judul, `pesan`, `userID`) VALUES ('$title', '$message', 'XEZXSSv2r0bbCu1FIrdOvrFoMCA3')";
    echo $query;
    $res = mysqli_query($dbc, $query);
    if ($res == true) {
        echo "sukses";
    }
}


