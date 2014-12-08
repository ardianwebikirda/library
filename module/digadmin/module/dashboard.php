<?php
session_start();
if($_SESSION['login'] != 1){
     header('location:../../');
} else {
    
?>
<div class="row">
	<div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> DASHBOARD
            </li>
        </ol>
    </div>
</div><!--/. End of Row -->

 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Grafik Peminjaman</h3>
            </div>
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
        </div>
    </div>
</div><!--/. End of Row -->
<?php } ?>