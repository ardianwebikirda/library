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

	<!-- Custom CSS -->
	<style type="text/css">
		.form-control{
			padding-bottom: auto;
			margin-bottom: 5px;
		}
	</style>

	<!-- Data Tables CSS -->
	<link rel="stylesheet" type="text/css" href="../../lib/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../../lib/css/dataTables.jqueryui.css">

	<!-- Call JQuery Library -->
	<script src="../../lib/js/jquery.js" type="text/javascript"></script>
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqBootstrapValidation.js" type="text/javascript"></script>

	<!-- Call DataTables Library -->
	<script src="../../lib/js/jquery.dataTables.js" type="text/javascript"></script>
	<script src="../../lib/js/dataTables.jqueryui.js" type="text/javascript"></script>

	<!-- Call Custom Library -->
	<script src="lib/jsmodule/buku/buku.js" type="text/javascript"></script>
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


			<!-- Form Place -->
			<div class="col-md-5 column">
				<ul class="breadcrumb">
					<li><i class="fa fa-list-alt"></i> <b>Form Data Buku</b></li>
					<li><button type="button" id="action" class="btn btn-info">Click for Update / Delete</button></li>
				</ul>

			          
			    <!-- Form CRUD Book Master -->
				<form class="form" id="frm-book" action="" method="post">
				<input type="text" class="form-control" id="cd-update" disabled="disabled" placeholder="Masukan Code Buku">

					<div class="form-group">
						<label>Judul Buku</label>
						<input type="text" class="form-control" id="judul" name="judul" 
						maxlength="50" required	placeholder="Masukan Judul Buku ...">

						<label>Penulis</label>
 						<input type="text" class="form-control" id="penulis" name="penulis" 
						required placeholder="Masukan Nama Penulis ..."/>

						<label>Tanggal Datang</label>
						<input type="text" class="form-control" id="tgl_datang" name="tgl_datang" 
						required placeholder="Klik Disini ...">

						<label>Penerbit</label>
						<input type="text" class="form-control" id="publisher" name="publisher" 
						required placeholder="Ketik Nama Penerbit...">
						
						<label>Tahun Terbit</label>
						<input type="text" class="form-control" id="poy" name="poy" 
						required placeholder="Ketik manual atau Klik Disini, format akan terisi otomatis  ..."> 
					</div>
					<button type="submit" id="save" name="save" class="btn btn-sm btn-success">Save</button>
					<button type="button" id="update" name="update" class="btn btn-sm btn-warning">Update</button>
					<button type="button" id="delete" name="delete" class="btn btn-sm btn-danger">Delete</button>	
					<button type="reset" id="reset" class="btn btn-sm btn-primary">Reset</button>						
				</form><!-- /. End Form CRUD Book Master -->
			</div><!-- /. End Form Place -->

			<!-- Datagrid Place -->
			<div class="col-md-7 column">
				<table id="tablebuku" class="display" cellspacing="0">
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

		</div>
	</div>	<!-- ./End Container datagrid dan form -->
</body>
</html>
<?php } ?>