<?php

include '../../connection.php';

class data
{
}

$statusOrder = $_POST['statusOrder'];

$query = " SELECT a.orderID, a.userID, a.tipeKendaraan , a.alamatOrder, a.latitude, a.longitude, a.tanggalOrder, a.waktuOrder, a.statusOrder, e.harga, e.keterangan as ketHarga, b.namaLengkap, b.noHp
FROM booking a 
INNER JOIN member b ON a.userID = b.idMember
INNER JOIN kategorikendaraan c ON a.idKategori = c.idKategori
INNER JOIN jeniskendaraan d ON a.idJenis = d.idJenis
INNER JOIN jenisharga e ON a.idHarga = e.idHarga 
WHERE a.statusOrder = '$statusOrder' ";

$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result) >= 1) {
    while ($data = mysqli_fetch_array($result)) {
        
        //$myArray[]=$data;

        $myArray[] = array(
            "orderID" => $data['orderID'],
            "userID" => $data['userID'],
            "tipeKendaraan" => $data['tipeKendaraan'],
            "alamatOrder" => $data['alamatOrder'],
            "latitude" => $data['latitude'],
            "longitude" => $data['longitude'],
            "tanggalOrder" => $data['tanggalOrder'],
            "waktuOrder" => $data['waktuOrder'],
            "statusOrder" => $data['statusOrder'],
            "harga" => $data['harga'],
            "ketHarga" => $data['ketHarga'],
            "namaLengkap" => $data['namaLengkap'],
            "noHp" => $data['noHp'], 
            "jarak" => getJarak($data['latitude'], $data['longitude'])/1000
        );
    }

    $response = new data();
    $response->success = TRUE;
    $response->message = "Berhasil Mendapatkan Data";
    $response->data = $myArray;
    die(json_encode($response));
} else {
    $response = new data();
    $response->success = FALSE;
    $response->message = "Tidak ada Data";
    die(json_encode($response));
}

function getJarak($latitudeFrom, $longitudeFrom)
{

    include '../../connection.php';
    $sql = "SELECT * FROM `office` WHERE `id`='1' ";
    $result = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
    $row = mysqli_fetch_array($result);
    if (!empty($row)) {
        $latitudeAwal  = $row['latitude'];
        $longitudeAwal = $row['longitude'];
    }

    $earthRadius = 6371000;
    $latFrom = deg2rad($latitudeAwal);
    $lonFrom = deg2rad($longitudeAwal);
    $latTo = deg2rad($latitudeFrom);
    $lonTo = deg2rad($longitudeFrom);

    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;

    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    return round($angle * $earthRadius);
}

mysqli_close($dbc);
