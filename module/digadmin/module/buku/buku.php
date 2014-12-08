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
		<!-- Data Tables -->
	<link rel="stylesheet" type="text/css" href="../../lib/css/jquery.dataTables.css">
	<style type="text/css">
		.form-control{
			padding-bottom: auto;
			margin-bottom: 5px;
		}
	</style>
	<!-- Call JQuery Library -->
	<script src="../../lib/js/jquery.js" type="text/javascript"></script>
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>

	<!-- Call DataTables Library -->
	<script src="../../lib/js/jquery.dataTables.js" type="text/javascript"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#tablebuku').DataTable();
			});
	</script>

</head>
<body>
	<div class="row">
	<div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-book"></i> DATA BUKU
            </li>
        </ol>
    </div>
	</div><!--/. End of Row -->

	<!-- Container datagrid dan form -->
	<div class="container-fluid">
		<div class="row-fluid clearfix">

			<!-- Datagrid Place -->
			<div class="col-md-7 column">
				<table id="tablebuku" class="display" cellspacing="1">
					<thead>
						<tr>
							<th width="10%">Kode</th>
							<th>Judul</th>
							<th width="15%">Penerbit</th>
							<th width="10%">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include "../../bin/koneksi.php";

							$sql 	= "SELECT * FROM tm_buku ORDER BY code ASC";
							$hasil 	= $konek->query($sql);
							while($row = $hasil->fetch_assoc()){
								extract($row);

								echo"
									<tr>
										<td>{$code}</td>
										<td>{$name}</td>
										<td>{$publisher}</td>
										<td>{$status}</td>
									</tr>
								";
							}
						?>                		
					</tbody>
				</table>
			</div><!-- /. End Datagrid Place -->

			<!-- Form Place -->
			<div class="col-md-5 column">
				<ul class="breadcrumb">
					<li><i class="fa fa-list-alt"></i> <b>Form Data Buku</b></li>
				</ul>
				<form class="form">
					<div class="form-group">
					<label>Judul Buku</label>
					<input type="text" class="form-control" id="judul" name="judul" 
					maxlength="50" data-validation-required-message="Judul Harus Diisi" 
					placeholder="Masukan Judul Buku ..."> 
					<label>Penulis</label>
					<input type="text" class="form-control" id="penulis" name="penulis" 
					required placeholder="Masukan Nama Penulis ...">
					<label>Tgl Datang</label>
					<input type="text" class="form-control" id="tgl_datang" name="tgl_datang" placeholder="Klik Disini ...">
					<label>Penerbit</label>
					<input type="text" class="form-control" id="publisher" name="publisher" placeholder="Ketik Nama Penerbit...">
					<label>Tahun Terbit</label>
					<input type="text" class="form-control" id="poy" name="poy" placeholder="Klik Disini ..."> 
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Save</button>
					<button type="submit" class="btn btn-sm btn-warning">Update</button>
					<button type="button" class="btn btn-sm btn-danger">Delete</button>						
				</form>
			</div><!-- /. End Form Place -->
		</div>
	</div>	<!-- ./End Container datagrid dan form -->
</body>
</html>
<?php } ?>