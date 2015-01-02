<style type="text/css" media="print">
	.panel{
		display: none;
	}
	#strukpengembalian{
		margin-top: 2px;
	}
</style>
<!-- Struk Peminjaman Default Tersembungi Hanya Muncul Ketika Di Cetak -->
<div id="strukpengembalian">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<table class="table" id="strukpengembalian">
					<thead>
						<tr>
							<th colspan="2">
								<h2>Digital Tutorials Library </h2>
								* Jika Denda Bernilai Negatif / minus (-) berarti tidak ada denda
							</th>
						</tr>
					</thead>
					<?php
						include "../../bin/koneksi.php";
						$idp = $_GET['idp'];
						$sql 	= "SELECT * FROM view_trspengembalian WHERE nopeminjaman='$idp'";
						$hasil 	= $konek->query($sql);
						while($row = $hasil->fetch_assoc()){
							$nopengembalian = $row['nopengembalian'];
							$nopeminjaman 	= $row['nopeminjaman'];
							$code_anggota	= $row['code_anggota'];
							$judul 			= $row['judul'];
							$tgl_pinjam 	= $row['tgl_pinjam'];
							$tgl_kembali 	= $row['tgl_kembali'];
							$tgl_pengembalian 	= $row['tgl_pengembalian'];
							$lamapinjam 	= $row['lamapinjam'];
							$denda 			= $row['denda'];
							$nama 			= $row['nama'];		
						}
					?> 
					<tbody>
						<tr>
							<td width="25%">No Pengembalian</td>
							<td>: <?php echo $nopengembalian; ?></td>
						</tr>
						<tr>
							<td width="25%">No Peminjaman</td>
							<td>: <?php echo $nopeminjaman; ?></td>
						</tr>
						<tr>
							<td>Member</td>
							<td>: <?php echo $code_anggota." | ".$nama; ?></td>
						</tr>
						<tr>
							<td>Judul Buku</td>
							<td>: <?php echo $judul; ?></td>
						</tr>
						<tr>
							<td>Tanggal Pinjam</td>
							<td>: <?php echo $tgl_pinjam; ?></td>
						</tr>
						<tr>
							<td>Tanggal Kembali</td>
							<td>: <?php echo $tgl_kembali; ?></td>
						</tr>
						<tr>
							<td>Dikembalikan</td>
							<td>: <?php echo $tgl_pengembalian; ?></td>
						</tr>
						<tr>
							<td>Lama Pinjam</td>
							<td>: <?php echo $lamapinjam." Hari"; ?></td>
						</tr>
						<tr>
							<td>Denda</td>
							<td>: <?php echo $denda; ?></td>
						</tr>
						<tr>
							<td>Petugas</td>
							<td>: <?php echo $_SESSION['name']; ?></td>
						</tr>
					</tbody>
				</table>
				<ul class="breadcrumb panel">
				<li>
					<a href="?hal=pengembalian" id="back">
					<button type="submit" class="btn btn-sm btn-default">Back</button>
					</a>
					<a href="printPeminjaman.php" onClick="window.print(); return false" id="cetak">
						<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Cetak</button>
					</a>
				</li>
				</ul>	
			</div>
		</div>
	</div>                				
</div>
<!-- End Struk Peminjaman -->