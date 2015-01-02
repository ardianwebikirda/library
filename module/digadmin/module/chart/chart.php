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
	<!-- Call Chart Library -->
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/highcharts.js" type="text/javascript"></script>
	<script type="text/javascript">
		var chart1; // globally available

		$(document).ready(function(){
	      chart1 = new Highcharts.Chart({
	         chart: {
	            renderTo: 'container',
	            type: 'column'
	         },   
	         title: {
	            text: 'Grafik Peminjaman '
	         },
	         xAxis: {
	            categories: ['Tgl Pinjam']
	         },
	         yAxis: {
	            title: {
	               text: 'Jumlah Peminjam'
	            }
	         },
	              series:             
	            [
	            <?php 
		        	include"../../bin/koneksi.php";
		           	$sql   = "SELECT nopeminjaman  FROM trs_peminjaman";
		            $query = $konek->query($sql);
		            while( $ret = $query->fetch_assoc()){
	            	$nopinjam = $ret['nopeminjaman'];                     
	                 $sql_jumlah   = "SELECT COUNT(nopeminjaman) AS jumlah FROM trs_peminjaman WHERE nopeminjaman='$nopinjam'";        
	                 $query_jumlah = $konek->query($sql_jumlah);
	                 while( $data = $query_jumlah->fetch_assoc()){
	                    $jumlah = $data['jumlah'];                 
	                  }             
	            ?>
	                  {
	                      name: '<?php echo $nopinjam; ?>',
	                      data: [<?php echo $jumlah; ?>]
	                  },
	                <?php } ?>
	            ]
	      });
	   });	
	</script>
	</head>
	<body>
		<div id='container'></div>		
	</body>
</html>
<?php } ?>