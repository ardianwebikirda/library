<?php

$server 	= "localhost";
$user 		= "root";
$password 	= "";
$db 		= "dblib";

$konek = mysqli_connect($server,$user, $password,$db);
if($konek){
	//echo "Koneksi Database Sukses";
} else {
	die('Koneksi Gagal');
	mysql_error();
}
?>