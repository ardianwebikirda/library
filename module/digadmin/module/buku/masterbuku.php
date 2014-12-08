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

	<table id="tablebuku" class="display" cellspacing="1" width="100%">
		<thead>
			<tr>
				<th width="10%">Kode</th>
				<th>Judul</th>
				<th width="15%">Penerbit</th>
				<th width="10%">Status</th>
				<th width="10%">
					<a href="#" data-toggle="modal" class="btn btn-primary btn-sm" data-target="#formBuku">
					<i class="fa fa-save"></i> Tambah Buku</a>
				</th>
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
							<td align='center'>
								<button class='btn btn-primary'><i class='fa fa-edit' title='Update Buku'></i></button>
								<button class='btn btn-primary'><i class='fa fa-times' title='Hapus Buku'></i></button>
							</td>
						</tr>
					";
				}
			?>                		
		</tbody>
	</table>
</body>
<?php include "module/buku/formbuku.php"; ?>
</html>
<?php } ?>