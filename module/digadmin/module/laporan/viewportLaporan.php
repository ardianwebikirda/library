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
		#nama{
			font-weight: bold;
			font-size: 14px;
			color: #4A9900;
		}

		#codeanggota{
			font-weight: bold;
			font-size: 14px;
			color: #4A9900;
		}

		#nopeminjaman2{
			font-weight: bold;
			font-size: 14px;
			color: #4A9900;
		}

		#red{
			font-weight: bold;
			font-size: 14px;
			color: #4A9900;
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
	<script src="lib/jsmodule/laporan/laporan.js" type="text/javascript"></script>
</head>
<body>
	<div class="row">
	<div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-briefcase"></i> LAPORAN
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
						<a href="#panel-laporan" data-toggle="tab"> <i class="fa fa-th-list"></i> Laporan Hari Ini</a>
					</li>
					<li>
						<a href="#panel-detail-laporan" data-toggle="tab"><i class="fa fa-table"></i> Laporan Perbulan</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-laporan">
						<p> 
							<?php include "module/laporan/laporan.php"; ?>
						</p>
					</div>
					<div class="tab-pane" id="panel-detail-laporan">
						<p>
							<?php include "module/laporan/laporanperbulan.php";	?>
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