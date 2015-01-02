$('#chartboard').hide();

$.ajax({
	url 		: 'module/chart/aksichart.php',
	cache		: false,
	type		: 'GET',
	dataType	: 'JSON',
	timeout 	: 5000,
	beforeSend : function(){
		$('#chartboard').show();
		$('#chartboard').html("<img src='../../lib/images/ajax-loader.gif'>");
	},
	success:function(data){
		var graph = Morris.Line({
   			element 	: 'bookchart', 
  		 	data 		: data, 
    		xkey 		: 'data.y', 
    		ykeys 		: ['data.jumlah'], 
    		labels 		: ['Transaksi'],        
    		lineColors 	: ['#2b44d2'], 
		});
	}
});

   