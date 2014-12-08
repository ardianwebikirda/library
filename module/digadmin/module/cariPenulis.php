<?php
// // session_start();
// // if($_SESSION['login'] != 1){
// //      header('location:../../');
// // } else {
	include "../../../bin/koneksi.php";

	$penulis = strtolower($_GET['name']);

	if(empty($name)){
		$sql 	= "SELECT * FROM tm_penulis ORDER BY first_name";
		$hasil 	= $konek->query($sql);
		// var_dump($hasil->fetch_assoc());
		// exit();
		while($row = $hasil->fetch_assoc()){
			extract($row); 
			echo "<span>".$row['first_name']."&nbsp;".$row['last_name']."</span>";
		}
	} else {
		$sql2 	= "SELECT * FROM tm_penulis WHERE lower(name) LIKE '%$penulis%' OR lower(last_name) LIKE '%$penulis%' ";
		$hasil2 	= $konek->query($sql2);
		while($row = $hasil2->fetch_assoc()){
			// extract($row); 
			// echo "<span>".$row['first_name']."&nbsp;".$row['last_name']."</span>";
			$data[] = $row['first_name']." ".$row['last_name'];
		}
		echo json_encode($data);
	}
// }    
	// $query 		= $_POST['query'];
	// $sql2 		= "SELECT * FROM tm_penulis WHERE lower(first_name) LIKE '%($query)%' OR lower(last_name) LIKE '%($query%)' ";
	// $hasil2 	= $konek->query($sql2);
	// while($row 	= $hasil2->fetch_assoc()){
	// 	$data[] = $row['first_name']." ".$row['last_name'];
	// }

	// echo json_encode($data);
?>