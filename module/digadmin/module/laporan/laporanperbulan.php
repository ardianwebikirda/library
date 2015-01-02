<?php
session_start();
if($_SESSION['login'] != 1){
     header('location:../../');
} else {
    
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>

	<!-- Container datagrid dan form -->
	<div class="container-fluid">
		<div class="row-fluid clearfix">

			<!-- Datagrid Place -->
			<div class="col-md-12 column">
				<form action="module/laporan/lapPDFMonth.php" method="post">
				<ul class="breadcrumb">
				<li>
				<select name="bulan" id="bulan" class="form-control">
					<option value="01">Januari</option>
					<option value="02">Februari</option>
					<option value="03">Maret</option>
					<option value="04">April</option>
					<option value="05">Mei</option>
					<option value="06">Juni</option>
					<option value="07">Juli</option>
					<option value="08">Agustus</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Desember</option>
				</select>
				</li>
				<li>
					<button type="submit" id="lappdf" name="lappdf" value="lappdf" class="btn btn-sm btn-danger fa fa-file-pdf-o"> PDF</button>
				</li>
				</ul>
				</form>			
				<table id="daftarlaporan" class="display" cellspacing="0">
					<thead>
						<tr>
							<th width="10%">Code</th>
							<th width="35%">Judul</th>
							<th width="15%">Pinjam</th>
							<th width="10%">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include "../../bin/koneksi.php";
							$bulan 	= date("m");
							$sql 	= "SELECT * FROM view_trspeminjaman WHERE MONTH(tgl_pinjam)='$bulan' OR MONTH(tgl_kembali)='$bulan'";
							$hasil 	= $konek->query($sql);
							while($row = $hasil->fetch_assoc()){
								extract($row);
								echo"
									<tr>
										<td>{$code_buku}</td>
										<td>{$judul}</td>
										<td>{$tgl_pinjam}</td>
										<td>{$statusbuku}</td>
									</tr>";
							}
						?>                		
					</tbody>
				</table>
			</div><!-- /. End Datagrid Place -->

		</div>
	</div>	<!-- ./End Container datagrid dan form -->
</body>
</html>
<?php
}
?>