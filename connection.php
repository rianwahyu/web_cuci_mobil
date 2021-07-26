<?php 

date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$dbc = mysqli_connect("localhost","u1116864_rian","Samsung001","u1116864_cimoling");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>