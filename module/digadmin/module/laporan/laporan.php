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
				<ul class="breadcrumb">
				<li>
					<a href="module/laporan/lapPDFDay.php">
					<button type="submit" id="lappdf" name="lappdf" value="lappdf" class="btn btn-sm btn-danger fa fa-file-pdf-o"> PDF</button>
					</a>
					Running = Sedang Dipinjam | OutOfDate = Sudah Dikembalikan
				</li>
				</ul>				
				<table id="tablelaporan" class="display" cellspacing="0">
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
							$hariini = date("Y-m-d"); 
							$sql 	= "SELECT * FROM view_trspeminjaman WHERE tgl_pinjam='$hariini' OR tgl_kembali='$hariini'";
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