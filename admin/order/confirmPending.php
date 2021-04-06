<?php 

include '../../connection.php';

$orderID = $_POST['orderID'];
$userID = $_POST['userID'];

$keterangan = "Pesanan telah di proses admin";

$query = "";
$query = $query. " UPDATE booking SET statusOrder='1' WHERE orderID='$orderID' ; ";
$query = $query. " INSERT INTO bookingValue (orderID, keterangan, status, userAdmin ) 
VALUES ('$orderID', '$keterangan', '1', '$userID') ; ";

//echo $query;

if (mysqli_multi_query($dbc, $query)) {
    echo json_encode(array(
        "success" => true,
        "message" => "Sukses Proses Order"
    ));
}else{
    echo json_encode(array(
        "success" => false,
        "message" => "Gagal"
    ));
}

mysqli_close($dbc);
