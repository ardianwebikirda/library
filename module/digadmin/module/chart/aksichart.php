<?php
	session_start();
	include "../../../../bin/koneksi.php";

	$sqlcount = "SELECT COUNT(nopeminjaman) AS m, MONTH(tgl_pinjam) AS bulan FROM view_trspeminjaman GROUP BY MONTH(tgl_pinjam)";
	$hasil = $konek->query($sqlcount);
	while($row = $hasil->fetch_object()){
		$data = array('y'=>$row['bulan'],'jumlah'=>$row['m']);
	}
	echo json_encode($data);
?>