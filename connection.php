<?php 

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$dbc = mysqli_connect("localhost","root","","cucimobil");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>