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
	<script src="lib/jsmodule/penulis/penulis.js" type="text/javascript"></script>


</head>
<body>
	<div class="row">
	<div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i> DATA PENULIS
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
					<li><i class="fa fa-list-alt"></i> <b>Form Data Penulis</b></li>
					<li><button type="button" id="action" class="btn btn-info">Click for Update / Delete</button></li>
				</ul>

			          
			    <!-- Form CRUD Book Master -->
				<form class="form" id="frm-book" action="" method="post">
				<input type="text" class="form-control" id="cd-update" disabled="disabled" placeholder="Masukan Code Penulis">

					<div class="form-group">
						<label>Nama Depan</label>
						<input type="text" class="form-control" id="firstname" name="firstname" 
						maxlength="50" required	placeholder="Masukan Nama Depan Penulis ...">

						<label>Nama Belakang</label>
 						<input type="text" class="form-control" id="lastname" name="lastname" 
						required placeholder="Masukan Nama Belakang Penulis ..."/>


						<label>Email</label>
						<input type="email" class="form-control" id="email" name="email" 
						required placeholder="Ketik Email Penulis...">
						
					</div>
					<button type="submit" id="save" name="save" value="save" class="btn btn-sm btn-success">Save</button>
					<button type="button" id="update" name="update" class="btn btn-sm btn-warning">Update</button>
					<button type="button" id="delete" name="delete" class="btn btn-sm btn-danger">Delete</button>	
					<button type="reset" id="reset" class="btn btn-sm btn-primary">Reset</button>						
				</form><!-- /. End Form CRUD Book Master -->
			</div><!-- /. End Form Place -->

			<!-- Datagrid Place -->
			<div class="col-md-7 column">
				<table id="tablepenulis" class="display" cellspacing="0">
					<thead>
						<tr>
							<th width="10%">Kode</th>
							<th>Nama Penulis</th>
							<th width="25%">Email</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include "../../bin/koneksi.php";

							$sql 	= "SELECT * FROM tm_penulis ORDER BY firstname ASC";
							$hasil 	= $konek->query($sql);
							while($row = $hasil->fetch_assoc()){
								extract($row);

								echo"
									<tr>
										<td>{$code_author}</td>
										<td>{$firstname} {$lastname}</td>
										<td>{$email}</td>
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