<?php
	session_start();
	include "../../../../bin/koneksi.php";
	
	$code_buku = strtolower($_GET['term']);
	
	/*
	* Auto Number Untuk Code Buku 
	*/
	function autonum($lebar=0, $awalan=''){
		include "../../../../bin/koneksi.php";
		$sqlcount= "SELECT code from tm_buku order by code desc";
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

	/* Jika Tombol Save Diklik */	
	if($_POST['aksi']=='save'){
		
		$code 		= autonum(3,"DIG");
		$judul 		= strip_tags($_POST['judul']);
		$penulis 	= strip_tags(substr($_POST['penulis'],0,7));
		$tgl_datang = strip_tags($_POST['tgl_datang']);
		$publisher 	= strip_tags($_POST['publisher']);
		$poy 		= strip_tags($_POST['poy']);
		$status 	= "Ready";
		$created 	= date('Y-m-d H:m:s');
		$createdby 	= $_SESSION['name'];
		$updated 	= date('Y-m-d H:m:s');
		$updatedby 	= $_SESSION['name'];

		/* Validasi Kode */
		$sqlCek 	= "SELECT code FROM tm_buku WHERE code='$code'";
		$output 	= $konek->query($sqlCek);
		$cekData	= mysqli_num_rows($output);

		/* Query INSERT */
		$sql = "INSERT INTO 
		tm_buku (id_buku,
			code_author,
			code,
			name,
			poy,
			publisher,
			tgl_datang,
			status,
			created,
			createdby,
			updated,
			updatedby) 
		VALUES
		('',
			'$penulis',
			'$code',
			'$judul',
			'$poy',
			'$publisher',
			'$tgl_datang',
			'$status',
			'$created',
			'$createdby',
			'$updated',
			'$updatedby')";

		/*Jika Code Buku Kembar */
		if($cekData == 0){
			/* Input to Database */
			$insert = $konek->query($sql);

			/* Cek Data After Insert */
			$cekInsertData 	= "SELECT code FROM tm_buku WHERE code='$code'";
			$outputInsert 	= $konek->query($cekInsertData);
			$cekDataInsert	= mysqli_num_rows($outputInsert);

			/* JIka Data Berhasil Disimpan */
			if($cekDataInsert == 1){
				$pesan 		= "Data Berhasil Disimpan";
				$response 	= array('pesan'=>$pesan, 'data'=>$_POST);
				echo json_encode($response);
			} else {
				$pesan 		= "Gagal Menyimpan Data";
				$response 	= array('pesan'=>$pesan, 'data'=>$_POST);
				echo json_encode($response);
			}
		} else {
			$pesan 		= "Terjadi Error... Harap Hubungi Vendor IT Anda.. ";
			$response 	= array('pesan'=>$pesan, 'data'=>$_POST);
			echo json_encode($response);
		}
	/* Fungsi PHP untuk Autocomplete JQuery */
	}elseif($code_buku){
		$sqlFind	= "SELECT code FROM tm_buku WHERE lower(code) LIKE '%$code_buku%'";
		$hasilFind	= $konek->query($sqlFind);
		while($row 	= $hasilFind->fetch_assoc()){
			$data 	= $row;
		}
		echo json_encode($data);
	/* Fungsi PHP Untuk Load Data ke Form*/	
	} elseif($_POST['aksi']=='load'){
		$code = $_POST['code'];
		$sqlFind 	= "SELECT * FROM view_buku_penulis WHERE code = '$code'";
		$hasilFind	= $konek->query($sqlFind);
		while($row=$hasilFind->fetch_assoc()){
			$data['data']=array(
				'judul'=>$row['name'],
				'penulis'=>$row['code_author']." | ".$row['firstname']." ".$row['lastname'],
				'tgl_datang'=>$row['tgl_datang'],
				'publisher'=>$row['publisher'],
				'poy'=>$row['poy']
			);
		}
		echo json_encode($data['data']);
	/* Jika Tombol Delete Di Klik */
	} elseif($_POST['aksi']=='delete'){
		$code = $_POST['code'];

		/* Query DELETE */
		$sqlFind 	= "DELETE FROM tm_buku WHERE code = '$code'";
		$cekHapus 	= "SELECT code_buku FROM temp_peminjaman WHERE code_buku = '$code'";
		$queryCek 	= $konek->query($cekHapus);
		$foundData	= mysqli_num_rows($queryCek);
		if($foundData == 0){
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
		} else {
			$pesan = "Terdapat Data Berelasi, Anda Tidak Mengghapus Sebelum Menghapus Child Datanya..! ";
			$data = array('pesan'=>$pesan, 'data'=>'Tidak Ada Data');
			echo json_encode($data);
		}
	/* Jika Tombol Update Di Klik */
	}elseif($_POST['aksi']=='update'){
		$code 		= strip_tags($_POST['code']);
		$judul 		= strip_tags($_POST['judul']);
		$penulis 	= strip_tags(substr($_POST['penulis'],0,7));
		$tgl_datang = strip_tags($_POST['tgl_datang']);
		$publisher 	= strip_tags($_POST['publisher']);
		$poy 		= strip_tags($_POST['poy']);
		$updated 	= date('Y-m-d H:m:s');
		$updatedby 	= $_SESSION['name'];

		/* Query UPDATE */
		$sql = "UPDATE tm_buku SET
			code_author ='$penulis',
			name 		= '$judul',
			poy 		= '$poy',
			publisher 	= '$publisher',
			tgl_datang	= '$tgl_datang',
			updated 	= '$updated',
			updatedby 	= '$updatedby'
			WHERE code 	= '$code'";

		$outputUpdate 	= $konek->query($sql);
		$sqlCekdate 	= "SELECT * FROM tm_buku WHERE code = '$code'";
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