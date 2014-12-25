<?php
	session_start();
	include "../../../../bin/koneksi.php";
	
	$code = strtolower($_GET['term']);
	
	$sqlFind 	= " SELECT nopeminjaman FROM view_detail_peminjaman WHERE lower(nopeminjaman) LIKE '%$nopeminjaman%'";
	$sqlQuery	= $konek->query($sqlFind);
	while($row=$sqlQuery->fetch_assoc()){
		$data = $row;
	}
	echo json_encode($data);
?>