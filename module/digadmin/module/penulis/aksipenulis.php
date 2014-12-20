<?php
	session_start();
	include "../../../../bin/koneksi.php";
	
	$code_buku = strtolower($_GET['term']);
		/*
		* Auto Number Untuk Code Penulis 
		*/
		function autonum($lebar=0, $awalan=''){
			include "../../../../bin/koneksi.php";
			$sqlcount= "SELECT code_author FROM tm_penulis ORDER BY code_author desc";
			$hasil= $konek->query($sqlcount);
			$jumlahrecord = mysqli_num_rows($hasil);

			if($jumlahrecord == 0)
				$nomor=1;
			else {
				$nomor = $jumlahrecord+1;
			}

			if($lebar>0)
				$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
			else
				$angka = $awalan.$nomor;
			return $angka;
		}
	
	if($_POST['aksi']=='save'){
		
		$code 		= autonum(4,"AUT");
		$firstname = strip_tags($_POST['firstname']);
		$lastname 	= strip_tags($_POST['lastname']);
		$email 		= strip_tags($_POST['email']);
		$created 	= date('Y-m-d H:m:s');
		$createdby 	= $_SESSION['name'];
		$updated 	= date('Y-m-d H:m:s');
		$updatedby 	= $_SESSION['name'];

		/* Validasi Kode */
		$sqlCek 	= "SELECT code_author FROM tm_penulis WHERE code_author='$code'";
		$output 	= $konek->query($sqlCek);
		$cekData	= mysqli_num_rows($output);

		/* Query INSERT */
		$sqlSave = "INSERT INTO 
		tm_penulis (id_author,
			code_author,
			firstname,
			lastname,
			email,
			created,
			createdby,
			updated,
			updatedby) 
		VALUES
		('',
			'$code',
			'$firstname',
			'$lastname',
			'$email',
			'$created',
			'$createdby',
			'$updated',
			'$updatedby')";

		/* Input to Database */
		$insert = $konek->query($sqlSave);

		/*Jika Code Penulis Kembar */
		if($cekData == 0){

			/* Cek Data After Insert */
			$cekInsertData 	= "SELECT code_author FROM tm_penulis WHERE code_author = '$code'";
			$outputInsert 	= $konek->query($cekInsertData);
			$cekDataInsert	= mysqli_num_rows($outputInsert);
			if($cekDataInsert == 1){
				$pesan 		= "Data Berhasil Disimpan";
				$response 	= array('pesan'=>$pesan, 'data'=>array($code, $firstname, $lastname, $email));
				echo json_encode($response);

			} else {
				$pesan 		= "Gagal Menyimpan Data";
				$response 	= array('pesan'=>$pesan, 'data'=>array($code, $firstname, $lastname, $email));
				echo json_encode($response);
			}
		} else {
			$pesan 		= "Terjadi Error... Harap Hubungi Vendor IT Anda.. ";
			$response 	= array('pesan'=>$pesan, 'data'=>array($firstname, $lastname, $email));
			echo json_encode($response);
		}
	}elseif($code_buku){
		$sqlFind	= "SELECT code_author FROM tm_penulis WHERE lower(code_author) LIKE '%$code%'";
		$hasilFind	= $konek->query($sqlFind);
		while($row 	= $hasilFind->fetch_assoc()){
			$data 	= $row;
		}
		echo json_encode($data);	
	} elseif($_POST['aksi']=='load'){
		$code = $_POST['code'];
		$sqlFind 	= "SELECT * FROM tm_penulis WHERE code_author = '$code'";
		$hasilFind	= $konek->query($sqlFind);
		while($row=$hasilFind->fetch_assoc()){
			$data['data']=array(
				'firstname'=>$row['firstname'],
				'lastname'=>$row['lastname'],
				'email'=>$row['email']
			);
		}
		echo json_encode($data['data']);
	} elseif($_POST['aksi']=='delete'){
		$code = $_POST['code'];

		/* Query DELETE */
		$sqlFind 	= "DELETE FROM tm_penulis WHERE code_author = '$code'";
		$hasilFind	= $konek->query($sqlFind);
		if($hasilFind){
			$pesan 	= "Data Berhasil Dihapus";
			$data 	= array('pesan'=>$pesan, 'data'=>$_POST); 
			echo json_encode($data);
		}else{
			$pesan = "Data Gagal Dihapus";
			$data 	= array('pesan'=>$pesan, 'data'=>$_POST); 
			echo json_encode($data);
		}
	}elseif($_POST['aksi']=='update'){
		$code 		= strip_tags($_POST['code']);
		$firstname = strip_tags($_POST['firstname']);
		$lastname 	= strip_tags($_POST['lastname']);
		$email 		= strip_tags($_POST['email']);
		$updated 	= date('Y-m-d H:m:s');
		$updatedby 	= $_SESSION['name'];

		/* Query UPDATE */
		$sql = "UPDATE tm_penulis SET
			firstname 	= '$firstname',
			lastname	= '$lastname',
			email 		= '$email',
			updated 	= '$updated',
			updatedby 	= '$updatedby'
			WHERE code_author = '$code'";

		$outputUpdate 	= $konek->query($sql);
		$sqlCekdate 	= "SELECT * FROM tm_penulis WHERE code_author = '$code'";
		$cekData 		= $konek->query($sqlCekdate);
		$row 		 	= $cekData->fetch_assoc();
		$dateDB 		= $row['updated'];
		if($dateDB == date('Y-m-d H:m:s')){
			$pesan 			= "Data Berhasil Dirubah";
			$response 		= array('pesan'=>$pesan, 'data'=>$_POST);
			echo json_encode($response);
		} else {
			$pesan 			= "Data Gagal Dirubah";
			$response 		= array('pesan'=>$pesan, 'data'=>$_POST);
			echo json_encode($response);	
		}
	}
?>