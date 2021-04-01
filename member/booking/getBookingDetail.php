<?php

include '../../connection.php';

class data{}

$orderID = $_POST['orderID'];

$query = " SELECT a.orderID, a.userID, a.tipeKendaraan , a.alamatOrder, a.latitude, a.longitude, a.tanggalOrder, a.waktuOrder, a.statusOrder, e.harga, e.keterangan as ketHarga
FROM booking a 
INNER JOIN member b ON a.userID = b.idMember
INNER JOIN kategorikendaraan c ON a.idKategori = c.idKategori
INNER JOIN jeniskendaraan d ON a.idJenis = d.idJenis
INNER JOIN jenisharga e ON a.idHarga = e.idHarga 
WHERE a.orderID = '$orderID' ";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);

$query2 = "SELECT * FROM `bookingValue` WHERE orderID='$orderID' ";
$result2 = mysqli_query($dbc, $query2);

if (!empty($row)) {
    $response = new data();
    $response->success = TRUE;
    $response->message = "Berhasil Mendapatkan Data";
    $response->orderID = $row['orderID'];
    $response->userID = $row['userID'];
    $response->tipeKendaraan = $row['tipeKendaraan'];
    $response->alamatOrder = $row['alamatOrder'];
    $response->latitude = $row['latitude'];
    $response->longitude = $row['longitude'];
    $response->tanggalOrder = $row['tanggalOrder'];
    $response->waktuOrder = $row['waktuOrder'];
    $response->statusOrder = $row['statusOrder'];
    $response->harga = $row['harga'];
    $response->ketHarga = $row['ketHarga'];    

    if (mysqli_num_rows($result2) >= 1) {
        while($data = mysqli_fetch_array($result2)){
            $myArray[]=$data;
        }            
    }
    $response->data = $myArray;
    die(json_encode($response));

}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Tidak ada Data";
    die(json_encode($response));
}

mysqli_close($dbc);