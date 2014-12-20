<?php
session_start();
if($_SESSION['login'] != 1){
	 header('location:../../');
} else {
	
?>
<DOCTYPE html>
<html>
<head>
	<title>DigLib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Call Bootstrap Css Core -->
	<link rel="stylesheet" type="text/css" href="../../lib/css/bootstrap.min.css">

	<!-- Call Bootstrap Css Template -->
	<link rel="stylesheet" type="text/css" href="../../lib/css/sb-admin.css">

	<!-- Call Bootstrap Plugin Css -->
	<link rel="stylesheet" type="text/css" href="../../lib/css/plugins/morris.css">

	<!-- Custom Fonts -->
	<link rel="stylesheet" type="text/css" href="../../lib/font-admin/css/font-awesome.min.css">

	<!-- Data Tables -->
	<link rel="stylesheet" type="text/css" href="../../lib/css/jquery.dataTables.css">

	<!-- Date Picker -->
	<link rel="stylesheet" type="text/css" href="../../lib/css/bootstrap-datetimepicker.min.css">

	<!-- Jquery - UI -->
	<link rel="stylesheet" type="text/css" href="../../lib/css/jquery-ui.css">
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	

</head>
<body>
	<!-- Main Div Wrapper -->
	<div id="wrapper">
	<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

			<!-- Navbar Header Brand & Toggle Grouping -->
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menuleft">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">
				<img alt="Brand" src="../../lib/img/digtuts.png">
			</a>
			</div><!-- /. End of Navbar -->

			<!-- Top Rights Menu Items -->
			<ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-home"></i>&nbsp;<?php echo $_SESSION['name']; ?>&nbsp;<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-user"></i>&nbsp;Profile</a></li>
						<li><a href="#"><i class="fa fa-gear"></i>&nbsp;Setting</a></li>
						<li class="divider"></li>
						<li><a href="../../bin/logout.php"><i class="fa fa-power-off"></i>&nbsp;Log Out</a></li>
					</ul>
					
				</li>
			</ul><!-- /.End Top Rights Menu Items -->
			
			<!-- Sidebar Menus -->
			<div class="collapse navbar-collapse menuleft">
				<ul class="nav navbar-nav side-nav">
					<li class="active">
						<a href="?hal=dashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;Dashboard</a>
					</li>
					<li>
						<a href="?hal=masterbuku"><i class="fa fa-fw fa-book"></i>&nbsp;Data Buku</a>
					</li>
					<li>
						<a href="?hal=masterpenulis"><i class="fa fa-fw fa-user"></i>&nbsp;Data Penulis</a>
					</li>
					<li>
						<a href="?hal=masteranggota"><i class="fa fa-fw fa-users"></i>&nbsp;Data Anggota</a>
					</li>
					<li>
						<a href="?hal=peminjaman"><i class="fa fa-fw fa-desktop"></i>&nbsp;Peminjaman</a>
					</li>
					<li>
						<a href="?hal=pengembalian"><i class="fa fa-fw fa-edit"></i>&nbsp;Pengembalian</a>
					</li>
					<li>
						<a href="?hal=laporan"><i class="fa fa-fw fa-briefcase"></i>&nbsp;Laporan</a>
					</li>
				</ul>
			</div><!-- /. End of Sidebar Menus -->
		</nav><!-- ./End Of Navigation-->

		<!-- Page Wrapper -->
		<div id="page-wrapper">
			<div class="container-fluid">
			<?php
				$hal = $_GET['hal'];

				switch($hal){
					case "":
						include "module/chart/chart.php";
						break;					
					default:
						include "module/chart/chart.php";
						break;
					case "dashboard":
						include "module/chart/chart.php";
						break;
					case "masterbuku":
						include "module/buku/buku.php";
						break;
					case "masterpenulis":
						include "module/penulis/penulis.php";
						break;
					case "masteranggota":
						include "module/anggota/anggota.php";
						break;	
					case "peminjaman":
						include "module/peminjaman/viewportPeminjaman.php";
						break;
					case "pengembalian":
						include "module/pengembalian.php";
						break;
					case "laporan":
						include "module/laporan/laporan.php";
						break;
				}
			?>
			</div><!--/. End of Container Fluid -->
		</div><!-- /. End Page Wrapper -->

		<!-- Sidebar Menus -->
		
		<!-- /. End of Sidebar Menus -->

	</div><!-- ./End Of Wrapper-->

	<!-- Call JQuery Library 
	<script src="../../lib/js/jquery.js" type="text/javascript"></script> -->
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jquery-ui.js" type="text/javascript"></script>

	<!-- Call Bootstrap Core JS -->
	<script src="../../lib/js/bootstrap.min.js" type="text/javascript"></script>

	<!-- Call DataTables Library -->
	<script src="../../lib/js/jquery.dataTables.js" type="text/javascript"></script>

	<!-- Call Morris Chart Library  
	<script src="../../lib/js/plugins/morris/raphael.min.js" type="text/javascript"></script>
	<script src="../../lib/js/plugins/morris/morris.min.js" type="text/javascript"></script>
	<script src="../../lib/js/plugins/morris/morris-data.js" type="text/javascript"></script> -->

</body>
</html>
<?php } ?>