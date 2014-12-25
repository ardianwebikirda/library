<?php
	session_start();
	include "../../../../bin/koneksi.php";
	
	$code = strtolower($_GET['term']);
	
	$sqlFind 	= " SELECT code FROM tm_buku WHERE lower(code) LIKE '%$code%' AND status = 'Ready' ";
	$sqlQuery	= $konek->query($sqlFind);
	while($row=$sqlQuery->fetch_assoc()){
		$data = $row;
	}
	echo json_encode($data);
?>