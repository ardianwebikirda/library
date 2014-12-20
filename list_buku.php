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
	<link rel="stylesheet" type="text/css" href="lib/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="lib/css/dataTables.jqueryui.css">

	<!-- Call JQuery Library -->
	<script src="lib/js/jquery.js" type="text/javascript"></script>
	<script src="lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="lib/js/jqBootstrapValidation.js" type="text/javascript"></script>

	<!-- Call DataTables Library -->
	<script src="lib/js/jquery.dataTables.js" type="text/javascript"></script>
	<script src="lib/js/dataTables.jqueryui.js" type="text/javascript"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		/* JQuery DataGrid Function */
		$('#tablebuku').DataTable({
			jQueryUI	: true
		});
	});
	</script>
</head>
<body>
	
	<!-- Container datagrid dan form -->
	<div class="container-fluid">
		<div class="row-fluid clearfix">

			<!-- Datagrid Place -->
			<div class="col-md-12 column">
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
							include "bin/koneksi.php";

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