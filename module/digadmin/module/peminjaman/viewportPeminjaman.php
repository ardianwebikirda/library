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
	<script src="lib/jsmodule/peminjaman/peminjaman.js" type="text/javascript"></script>
</head>
<body>
	<div class="row">
	<div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-Desktop"></i> TRANSAKSI PEMINJAMAN
            </li>
        </ol>
    </div>
	</div><!--/. End of Row -->

	<div class="container-fluid">
	<div class="row clearfix">
		<div class="col-lg-12 column">
			<div class="tabbable" id="tabs-374969">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-peminjaman" data-toggle="tab"> <i class="fa fa-th-list"></i> Peminjaman</a>
					</li>
					<li>
						<a href="#panel-detail-peminjaman" data-toggle="tab"><i class="fa fa-table"></i> Detail Peminjaman</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-peminjaman">
					<p>
						<?php include "module/peminjaman/peminjaman.php"; ?>
					</p>
					</div>
					<div class="tab-pane" id="panel-detail-peminjaman">
						<p>
							<?php 
								include "module/peminjaman/detailPeminjaman.php"; 
								$hal = $_GET['hal'];

								switch($hal){
								case "detailPinjaman":
									include "module/peminjaman/gridPeminjaman.php";
									break;
								}
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>
<?php
}
?>