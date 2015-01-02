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

			<!-- Form Place -->
			<div class="col-md-4 column" id="formKembali">
				<ul class="breadcrumb">
					<li><i class="fa fa-th-list"></i> <b>Trasaksi Pengembalian</b></li>
				</ul>

	    		<!-- Form CRUD Book Master -->
				<form class="form" id="frm-pengembalian" action="" method="post">
				<input type="text" class="form-control" id="cd-update" disabled="disabled" placeholder="Masukan Code Buku">

					<div class="form-group">
						<label>No Peminjaman</label>
						<input type="text" class="form-control" id="nopeminjaman" name="nopeminjaman" 
						maxlength="50" required	placeholder="Masukan Nomor Peminjaman ...">

						<label>Code Anggota</label>
						<input type="text" class="form-control" id="codeanggota" name="codeanggota" 
						disabled="disabled" required> 

						<label>Nama Peminjam</label>
 						<input type="text" class="form-control" id="nama" name="nama" 
						required disabled="disabled" />

					</div>
					<button type="submit" id="save" name="save" value="save" class="btn btn-sm btn-success">Load Data</button>
					<button type="reset" id="reset" class="btn btn-sm btn-primary">Reset</button>						
				</form><!-- /. End Form CRUD Book Master -->
			</div><!-- /. End Form Place -->

			<!-- Datagrid Place -->
			<div class="col-md-8 column" id="gridKembali">
				<ul class="breadcrumb">
				<li>
					<button type="button" id="kembalikan" name="kembalikan" class="btn btn-sm btn-info">Kembalikan</button>
				</li>
				</ul>				
				<table id="tablepengembalian" class="display" cellspacing="0">
					<thead>
						<tr>
							<th width="10%">Code</th>
							<th width="35%">Judul</th>
							<th width="15%">Pinjam</th>
							<th width="10%">Kembali</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include "../../bin/koneksi.php";

							$nomor = $_POST['nopeminjaman'];

							$sql 	= "SELECT * FROM view_trspeminjaman WHERE nopeminjaman = '$nomor' ";
							$hasil 	= $konek->query($sql);
							while($row = $hasil->fetch_assoc()){
								extract($row);
								$no2 = $row['nopeminjaman'];
								echo"
									<tr>
										<td>{$code_buku}</td>
										<td>{$judul}</td>
										<td>{$tgl_pinjam}</td>
										<td>{$tgl_kembali}</td>
									</tr>";
							}
						?>                		
					</tbody>
					<tfoot>
						<tr>
							<td id="red"><b>Nomor = </b></td>
							<td colspan='3' id='nopeminjaman2'><b><?php echo $no2; ?></b></td>
						</tr>
					</tfoot>
				</table>
			</div><!-- /. End Datagrid Place -->

		</div>
	</div>	<!-- ./End Container datagrid dan form -->
</body>
</html>
<?php
}
?>