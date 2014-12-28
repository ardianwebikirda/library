<?php
	session_start();
	include "../../../../bin/koneksi.php";
	
	$code_anggota = strtolower($_GET['term']);

	$sqlFind 	= " SELECT code_anggota FROM tm_anggota WHERE lower(code_anggota) LIKE '%$code_anggota%' AND isrent='N' ";
	$sqlQuery	= $konek->query($sqlFind);
	while($row=$sqlQuery->fetch_assoc()){
		$data = $row;
	}
	echo json_encode($data);	
	
?>