<?php
	session_start();
	include "../../../../bin/koneksi.php";

		/*
		* Auto Number Untuk No Peminjaman 
		*/
		function autoNoPinjam($lebar=0, $awalan=''){
			include "../../../../bin/koneksi.php";
			$sqlcount= "SELECT nopeminjaman FROM trs_nopeminjaman ORDER BY nopeminjaman DESC";
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
		
		$nextTgl 			= mktime(0, 0, 0, date("m"), date("d") + 2, date("Y"));
		$nopeminjaman 		= autoNoPinjam(5,'DIG-TRS');
		$codeanggota		= strip_tags($_POST['codeanggota']);
		$codebuku			= strip_tags($_POST['codebuku']);
		$tglpinjam 			= date('Y-m-d');
		$tglkembali 		= date('Y-m-d', $nextTgl);
		$status 			= 'Running';


		/* Validasi Kode */
		$sqlCek 	= "SELECT code_buku FROM temp_peminjaman WHERE code_buku='$codebuku'";
		$output 	= $konek->query($sqlCek);
		$cekData	= mysqli_num_rows($output);

		/* Query INSERT */
		$sqlSave = "INSERT INTO 
		temp_peminjaman (id_temp,
			nopeminjaman,
			code_anggota,
			code_buku,
			tgl_pinjam,
			tgl_kembali,
			statusbuku) 
		VALUES
		('',
			'$nopeminjaman',
			'$codeanggota',
			'$codebuku',
			'$tglpinjam',
			'$tglkembali',
			'$status')";

		/* Input to Database */
		$insert = $konek->query($sqlSave);
		$sqlUpdateBook 	= "UPDATE tm_buku SET status='Out' WHERE code='$codebuku'";
		$updateBook 	= $konek->query($sqlUpdateBook);

		/*Jika Code Buku Tidak Ada */
		if($cekData == 0){

			/* Cek Data After Insert */
			$cekInsertData 	= "SELECT code_buku FROM temp_peminjaman WHERE code_buku = '$codebuku'";
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
	} elseif($_POST['aksi']=='loadanggota'){
		$code = $_POST['code'];
		$sqlFind 	= "SELECT * FROM tm_anggota WHERE code_anggota = '$code'";
		$hasilFind	= $konek->query($sqlFind);
		while($row=$hasilFind->fetch_assoc()){
			$data['data']=array('name'=>$row['name']);
		}
		/* Cek Status Buku */ 
		$cekAnggota = mysqli_num_rows($hasilFind);

		/* Jika Buku Ditemukan */
		if($cekAnggota>0){
			echo json_encode($data['data']);
		} else {
			$data['data']=array('name'=>'MEMBER INI MASIH MEMINJAM BUKU');
			echo json_encode($data['data']);
		}
	} elseif($_POST['aksi']=='loadbuku'){
		$code = $_POST['code'];
		$sqlFind 	= "SELECT * FROM tm_buku WHERE code = '$code' AND status='Ready'";
		$hasilFind	= $konek->query($sqlFind);
		while($row=$hasilFind->fetch_assoc()){
			$data['data']=array('name'=>$row['name']);
		}

		/* Cek Status Buku */ 
		$cekBuku = mysqli_num_rows($hasilFind);

		/* Jika Buku Ditemukan */
		if($cekBuku>0){
			echo json_encode($data['data']);
		} else {
			$data['data']=array('name'=>'BUKU SEDANG DIPINJAM');
			echo json_encode($data['data']);
		}
		
	} elseif($_GET['id']){
		$id 	= $_GET['id'];
		$code 	= $_GET['code'];
		/* Query DELETE */
		$sqlFind 	= "DELETE FROM temp_peminjaman WHERE id_temp = '$id'";
		$hasilFind	= $konek->query($sqlFind);
		if($hasilFind){
			$sqlUpdateBook 	= "UPDATE tm_buku SET status='Ready' WHERE code = '$code'";
			$queryUpdate 	= $konek->query($sqlUpdateBook);
			echo "<script>alert('Data Berhasil Dihapus');top.location='../../dashboard.php?hal=peminjaman'</script>";
		}else{
			echo "<script>alert('Data Gagal Dihapus');top.location='../../dashboard.php?hal=peminjaman'</script>";
		}
	} elseif($_POST['aksi']=='syncronize'){
		$noPinjam 		= autoNoPinjam(5,'DIG-TRS');
		$sqlCA 			= "SELECT code_anggota FROM temp_peminjaman LIMIT 1";
		$queryCA 		= $konek->query($sqlCA);
		$row 			= $queryCA->fetch_assoc();
		$code_anggota 	= $row['code_anggota'];
		$sqlUpdateCA 	= "UPDATE tm_anggota set isrent='Y' WHERE code_anggota='$code_anggota'";  
		$sqlTrsPinjam 	= "CALL simpanTrsPeminjaman()";
		$sqlSimpanTrs	= "CALL simpanTrsNoPinjam('$noPinjam')";
		$hapusTemp 		= "DELETE FROM temp_peminjaman";
		$querySync 		= $konek->query($sqlSimpanTrs);
		$querySync2 	= $konek->query($sqlTrsPinjam);
		$queryUpdateCA	= $konek->query($sqlUpdateCA);
		$hapus 			= $konek->query($hapusTemp);
		if($querySync && $querySync2){
			$pesan = "Data Berhasil Di syncronize";
			$data = array('pesan'=>$pesan,'data'=>'Succes');
			echo json_encode($data);
		} else {
			$pesan = mysqli_connect_errno();
			var_dump($pesan);
			exit();
			$data = array('pesan'=>$pesan,'data'=>'Succes');
			echo json_encode($data);
		} 
	}
?>