<?php

include '../../connection.php';

class data{}

$idKategori = $_POST['idKategori'];
$myArray = array();

$query = "SELECT * FROM jenisKendaraan WHERE idKategori='$idKategori' ";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result) >= 1) {

    while($data = mysqli_fetch_array($result)){
        
    
        $myArray[$data['idJenis']]= array('idJenis' => $data['idJenis'],
				'namaJenis' => $data['namaJenis'],				
				'listHarga' => array());


        $querys = "SELECT * FROM jenisharga WHERE idJenis ='$data[idJenis]' ";
        $results = mysqli_query($dbc, $querys);
        while($datas = mysqli_fetch_array($results)){

            $idHarga = $datas['idHarga'];
            $keterangan = $datas['keterangan'];
            $harga = $datas['harga'];

            $subTipeHargaArray = array("idHarga" => $idHarga,
            "keterangan" => $keterangan, 
            "harga" => $harga);
            
            $myArray[$datas['idJenis']]['listHarga'][]= array(
                'idHarga' => $datas['idHarga'],
                'keterangan' => $datas['keterangan'],
                'harga' => $datas['harga']);
        }        
    }

    $response = new data();
    $response->success = TRUE;
    $response->message = "Berhasil Mendapatkan Data";
    $response->data = $arrays = array_values($myArray);;
    die(json_encode($response));
}else{
    $response = new data();
    $response->success = FALSE;
    $response->message = "Tidak ada Data";
    die(json_encode($response));
}

mysqli_close($dbc);
