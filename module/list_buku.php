<!-- Data Tables -->
<link rel="stylesheet" type="text/css" href="lib/css/jquery.dataTables.css">

<!-- Call JQuery Library -->
<script src="lib/js/jquery.js" type="text/javascript"></script>

<!-- Call DataTables Library -->
<script src="lib/js/jquery.dataTables.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#databuku').DataTable();
		});
</script>

<div class="container-fluid">
<h3>DAFTAR BUKU DIGTUTS LIBRARY</h3><hr>
</div>
<table id="databuku" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
<thead>
	<th width="10%">Kode</th>
	<th>Judul</th>
	<th width="16%">Penerbit</th>
	<th width="10%">Status</th>
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
