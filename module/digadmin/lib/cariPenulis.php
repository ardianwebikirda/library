<?php
	include "../../../bin/koneksi.php";

	$penulis = strtolower($_GET['term']);

		$sql2 		= "SELECT id_author, code_author, firstname, lastname FROM tm_penulis WHERE lower(firstname) LIKE '%$penulis%' OR lower(lastname) LIKE '%$penulis%' ";
		$hasil2 	= $konek->query($sql2);
		while($row 	= $hasil2->fetch_assoc()){
			$row['value'] 	= $row['code_author']."| ".$row['firstname']." ".$row['lastname'];
			$row['id']		= $row['id_author'];
			$data[] = $row;
		}

		echo json_encode($data);
?>