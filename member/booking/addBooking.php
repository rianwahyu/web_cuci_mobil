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
    $orderID = $kode . str_pad($id + 1, 6, 0, STR_PAD_LEFT);
}

$userID = $_POST['userID'];
$tipeKendaraan = $_POST['tipeKendaraan'];
$idKategori = $_POST['idKategori'];
$idJenis = $_POST['idJenis'];
$idHarga = $_POST['idHarga'];
$alamatOrder = $_POST['alamatOrder'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$tanggalOrder = $_POST['tanggalOrder'];
$waktuOrder = $_POST['waktuOrder'];

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
}else{
    echo json_encode(array(
        "success" => false,
        "message" => "Gagal Booking"
    ));
}

mysqli_close($dbc);