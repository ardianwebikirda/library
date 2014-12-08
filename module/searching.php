<?php
	include "../bin/koneksi.php";

	/*
	* Variabel untuk membuat No Urut 
	*/
	$i = 1;

	/*
	* Variabel Kata Kunci Pencarian
	*/
	$name = $_GET['name'];

	/*
	* Jika Tombol Cari di klik dan kata kunci pencarian tidak kosong
	* Maka akan menjalan pencarian
	*/
	if(isset($name) && $name!=null){
		//Query Mysqli Untuk Menampilkan Data Buku Berdasarkan Kata Kunci Pencarian
		$sql 	= "SELECT code, name, publisher, status FROM tm_buku WHERE name LIKE '%$name%' ";
		$hasil 	= $konek->query($sql);

		/*
		* Jika Kata Kunci Pencarian Tidak sama dengan data yang ada pada Database
		* Maka Akan memunculkan tesk Data Tidak Ditemukan 
		*/
		if(empty($hasil->fetch_assoc())){
			echo "<tr><td colspan=5>Data Tidak Ditemukan</td></tr>";
		
		/*
		* Namun jika data ditemukan maka akan ditampilkan dalam bentuk grid 
		*/
		} else {
			while($row = $hasil->fetch_assoc()){
				
				/*
				* fungsi extract($row) memiliki arti
				* mengganti penulisan $row['nama_field'] menjadi {$nama_field}
				* sebagai contoh $row['code'] menjadi {$code}
				*/
				extract($row);

				/*
				* Menampilkan Extraksi Data dari function extract($row)
				*/
				echo "
				<tr>
					<th>".$i."</th>
					<th>{$code}</th>
					<th>{$name}</th>
					<th>{$publisher}</th>
					<th>{$status}</th>
				</tr>
				";
				$i++;
			}
		}
		/*
		* Free Memory
		*/
		$hasil->free();

		/*
		* Menutup Koneksi Ketika Data Telah Ditampilkan
		*/
		$konek->close();
	
	/*
	* Jika kata kunci pencarian tidak diisi maka akan memunculkan teks
	* Perintah untuk memasukan kata kunci pencarian 
	*/
	}elseif($name == ""){
		echo "<tr><td colspan=5>Anda Belum Memasukan Kata Kunci Pencarian</td></tr>";
	} else {
		echo "<tr><td colspan=5>Data Tidak Ditemukan</td></tr>";
	}
	
?>