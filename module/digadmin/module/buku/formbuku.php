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
		<!-- Call JQuery Library -->
	<script src="../../lib/js/jquery.js" type="text/javascript"></script>
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/typeahead.bundle.js" type="text/javascript"></script>
</head>
<body>
<div class="modal fade" id="formBuku" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-list-alt"></i> Form Data Buku</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">

					<div class="control-group">
						<label class="control-label">Judul Buku</label>
						<div class="controls">
							<input type="text" class="form-control" name="judul" placeholder="Masukan Judul Buku ..." size="75%" required>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Penulis</label>
						<div class="controls">
							<input type="text" class="form-control typeahead" name="penulis" 
							data-provide="typeahead" data-items="4" id="penulis" 	
							placeholder="Masukan Nama Penulis ..." size="75%" required>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tanggal Datang</label>
						<div class="controls">
							<input type="text" class="form-control tanggal" data-date-format="yyyy-mm-dd" name="tgl_datang" placeholder="Masukan Tanggal ..." size="75%" required>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tahun Terbit</label>
						<div class="controls">
							<input type="text" class="form-control poy" data-date-format="yyyy" name="poy" placeholder="Masukan Tahun Terbit" size="75%" required>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Penerbit</label>
						<div class="controls">
							<input type="text" class="form-control" name="publisher" placeholder="Masukan Nama Penerbit ..." size="75%" required>
							<p class="help-block"></p>
						</div>
					</div>							
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btnSave">
				<i class="fa fa-check-square-o"></i> Save</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#penulis').focusin(function(oe){
			ajaxCariPenulis();
		});

		$('#penulis').keypress(function(oe){
			ajaxCariPenulis();
		});

		function ajaxCariPenulis(){
			$.ajax({
				url		: 'module/cariPenulis.php',
				type	: 'get',
				dataType : 'JSON',
				data 	: {name : $('input#penulis').val()},
				success	: function(response){
					$('#penulis').html(response);
				}
			});
		}
	});	
	// $(function(){
	// 	$("#penulis").typeahead({
	// 		source	: function(query, process){
	// 			$.ajax({
	// 				url 		: 'module/cariPenulis.php',
	// 				type 		: 'POST',
	// 				data 		: 'query='+ query,
	// 				dataType 	: 'JSON',
	// 				success : function(data){
	// 					process(data);
	// 				}
	// 			});	
	// 		}
	// 	});
	// });
	
</script>
</body>
</html>
<?php } ?>