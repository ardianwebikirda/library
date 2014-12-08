<!DOCTYPE html>
<html>
	<head>
		<title>~Dig Library~</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Bootsrap CSS -->
		<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="lib/css/layout.css">
	</head>
	<body>
		<!-- JS File -->
		<script src="lib/js/jquery.min.js"></script>
		<script src="lib/js/bootstrap.min.js"></script>

		<!-- Javascript Login function -->
		<script src="lib/js/login.js"></script>

		<nav class="navbar navbar-inverse" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="?page=home">
		      	<img alt="Brand" src="lib/img/digtuts.png">
		      </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	<li class="active"><a href="?page=home">Home<span class="sr-only">(current)</span></a></li>
		        <li class="active" data-toggle="modal" target="#digLogin"><a href="?page=login">Login<span class="sr-only">(current)</span></a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<!-- Content -->
		<div class="content">
			<?php
				/* Memanggil Koneksi Darabase */
				include "bin/koneksi.php";

				/*
				* Variabel page yang akan menangkap value dari parameter page 
				* Menggunakan  method GET 
				*/
				$page = $_GET['page'];

				switch($page){
					case "":
						include "module/list_buku.php";
						break;					
					default:
						include "module/list_buku.php";
						break;
					case "home":
						include "module/list_buku.php";
						break;	
					case "login":
						include "module/login.php";
						break;
				}
			?>
		</div>
		<!-- /.End Content -->

		<!-- Footer -->
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
  			<div class="footer">
  				Copyright &copy; 2014 DigTuts.com. All Rights Reserved
  			</div>
		</nav> <!-- /.End Footer -->
	</body>
</html>