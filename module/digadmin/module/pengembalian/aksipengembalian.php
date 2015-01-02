<?php
	session_start();
	include "../../../../bin/koneksi.php";

		/*
		* Auto Number Untuk No Peminjaman 
		*/
		function autoNoPinjam($lebar=0, $awalan=''){
			include "../../../../bin/koneksi.php";
			$sqlcount= "SELECT nopengembalian FROM trs_pengembalian ORDER BY nopengembalian DESC";
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
	
	/* Jika Tombol Klik Disave */
	if($_POST['aksi']=='kembalikan'){

		$varNopeminjaman 	= $_POST['nopeminjaman'];
		$queryPinjam 		= "SELECT * FROM view_trspeminjaman WHERE nopeminjaman='$varNopeminjaman'";
		$sqlPinjam 			= $konek->query($queryPinjam);
		$data 				= $sqlPinjam->fetch_assoc();
		
		$nopengembalian = autoNoPinjam(5,'DIG-RTN');
		$nopeminjaman	= strip_tags($_POST['nopeminjaman']);
		$tglKembali 	= date("Y-m-d");
		$lamapinjam 	= $data['lamapinjam'];
		
		if($data['lamapinjam'] <= 0){
			$keterlambatan = 0;
		} else {
			$keterlambatan 	= $data['keterlambatan'];
		}

		if($data['denda'] <= 0){
			$denda = 0;
		} else {
			$denda 		= $data['denda'];
		}
		$iscomplete 	= 'Y';
		$created 		= date('Y-m-d H:m:s');
		$createdby 		= $_SESSION['name'];
		$updated 		= date('Y-m-d H:m:s');
		$updatedby 		= $_SESSION['name'];

		/* Variabel Untuk Membuat Default Data */
		$codebuku 		= $data['code_buku'];
		$codeanggota 	= $data['code_anggota'];

		/* Query INSERT */
		$sqlSave = "INSERT INTO 
		trs_pengembalian (id_pengembalian,
			nopengembalian,
			nopeminjaman,
			tgl_dikembalikan,
			lama_pinjam,
			keterlambatan,
			denda,
			iscomplete,
			created,
			createdby,
			updated,
			updatedby)  
		VALUES
		('',
			'$nopengembalian',
			'$nopeminjaman',
			'$tglKembali',
			'$lamapinjam',
			'$keterlambatan',
			'$denda',
			'$iscomplete',
			'$created',
			'$createdby',
			'$updated',
			'$updatedby')";

		/* Input to Database */
		$insert = $konek->query($sqlSave);

		/* Query Membuat Default Data */
		$sqlUpdateBook 		= "UPDATE tm_buku SET status='Ready' WHERE code='$codebuku'";
		$sqlUpdateMember 	= "UPDATE tm_anggota SET isrent='N' WHERE code_anggota='$codeanggota'";
		$sqlUpdatePinjam	= "UPDATE trs_peminjaman SET statusbuku='OutOfDate' WHERE nopeminjaman='$nopeminjaman'";
		$updateBook 		= $konek->query($sqlUpdateBook);
		$updateMember 		= $konek->query($sqlUpdateMember);
		$updatePinjam 		= $konek->query($sqlUpdatePinjam);

		/* Validasi Kode */
		$sqlCek 	= "SELECT nopengembalian FROM trs_pengembalian WHERE nopengembalian='$nopengembalian'";
		$output 	= $konek->query($sqlCek);
		$cekData	= mysqli_num_rows($output);

		/*Jika Code Buku Tidak Ada */
		if($cekData == 1){

			/* Cek Data After Insert */
			$cekInsertData 	= "SELECT nopeminjaman FROM trs_pengembalian WHERE nopeminjaman = '$nopeminjaman'";
			$outputInsert 	= $konek->query($cekInsertData);
			$cekDataInsert	= mysqli_num_rows($outputInsert);
			if($cekDataInsert == 1){
				$pesan 		= "Buku Telah Dikembalikan";
				$response 	= array('pesan'=>$pesan, 'data'=>array($nopengembalian, $nopeminjaman));
				echo json_encode($response);

			} else {
				$pesan 		= "Gagal Menyimpan Data";
				$response 	= array('pesan'=>$pesan, 'data'=>array($nopengembalian, $nopeminjaman));
				echo json_encode($response);
			}
		} else {
			$pesan 		= "Terjadi Error... Harap Hubungi Vendor IT Anda.. ";
			$response 	= array('pesan'=>$pesan, 'data'=>array($firstname, $lastname, $email));
			echo json_encode($response);
		}

	/* 
	* Fungsi Untuk Menampilkan Status Buku
	* Jika Buku Belum Dipinjam Maka Akan Muncul Judul Buku
	* Jika Buku Sedang Dipinjam Maka Akan Muncul teks "BUKU SEDANG DIPINJAM"
	*/
	} elseif($_POST['aksi']=='loadData'){
		$code = $_POST['code'];
		$sqlFind 	= " SELECT * FROM view_trspeminjaman WHERE nopeminjaman = '$code' AND statusbuku='Running' ";
		$hasilFind	= $konek->query($sqlFind);
		$cekData 	= mysqli_num_rows($hasilFind);
		while($row=$hasilFind->fetch_assoc()){
			$data['data']=array('name'=>$row['nama'], 'codeanggota'=>$row['code_anggota']);
		}
		if($cekData>0){
			echo json_encode($data['data']);
		} else {
			$data['data']=array('name'=>'Data Sudah Tervalidasi', 'codeanggota'=>'Data Sudah Tervalidasi');
			echo json_encode($data['data']);
		}

	} else {
		$code = strtolower($_GET['term']);
		
		$sqlFind 	= " SELECT nopeminjaman FROM view_trspeminjaman WHERE lower(nopeminjaman) LIKE '%$code%' ";
		$sqlQuery	= $konek->query($sqlFind);
		while($row=$sqlQuery->fetch_assoc()){
			$data = $row;
		}
		echo json_encode($data);

	}
?>