<?php
include "bin/koneksi.php";

	/*
	* Variabel Username dan Password
	*/
	$username = $_GET['username'];
	$password = md5($_GET['password']);

	/*
	* Jika Tombol Login di klik Field Username & Password tidak kosong
	* Maka akan melakukan proses login
	*/
	if($username != NULL && $password != NULL){
		$sqllogin 	= " SELECT * FROM tm_users WHERE username='$username' AND password='$password' AND active='Y' ";
		$hasil		= $konek->query($sqllogin);
		$row 		= $hasil->fetch_assoc();
		$ketemu 	= mysqli_num_rows($hasil);

		/* Apabila Username & Passwod Terdapat Pada Database */
		if($ketemu > 0){

			/* Membuat Session Login dan Menentukan Timeout Login */
			session_start();
			include "bin/timeout.php";

			$_SESSION[id_users]	= $row['id_users'];
			$_SESSION[name] 	= $row['name'];
			$_SESSION[username] = $row['username'];
			$_SESSION[password]	= $row['password'];
			$_SESSION[sess_id]	= $row['sess_id'];

			/* Session Timeout */
			$_SESSION[login] = 1;
			timer();

			$sess_old = session_id();
			session_regenerate_id();
			$sess_new = session_id();

			/* Memasukan Session keladalam database secara dinamis dengan perintah Update */
			$konek->query("UPDATE tm_users SET sess_id = '$sess_new' WHERE username = '$username'");
			$pesan 		= "Login Berhasil";
			$response 	= $pesan;

			/* Membuat JSON file untuk dikembalikan login.js */
			echo json_encode($response);
		/* Apabila Username & Password tidak terdapat pada Database */
		} else {
			include "module/error.php";
			$pesan = "Login Gagal, Cek Username & Password Anda..!";
			$response['pesan'] = $pesan;
			echo json_encode($response);
		}
	}
?>