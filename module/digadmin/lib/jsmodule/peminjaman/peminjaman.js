$(document).ready(function() {

	/* Fungsi Mereset Form */
	function resetForm() {
		$('#save').removeAttr('disabled');
		$('#cd-update').attr('disabled','disabled');
		$('label, #firstname, #lastname, #email').removeAttr('disabled');
		$('#action').show();
		$('#cd-update').hide();
		$('.deta').hide();
		$('input[type=text]').each(function(){
			$(this).val("");
		});
	}

	/* 
	* Function Docking berfungsi untuk mendisable tombol save, 
	* Mengenable tombol Edit, Delete, Reset dan memunculkan Textbox bertuliskan "Masukan Code Buku"  
	* Serta menyembunyikan Tombol Klik for Update/Delete
	*/
	function dockingForm(){
		$('#save').attr('disabled', 'disabled');
		$('#cd-update').removeAttr('disabled');
		$('#action').hide();
		$('#cd-update').show();
	}

	resetForm();
	$('#cd-update').hide();
	
	/* JQuery DataGrid Function */
	$('#tablepeminjaman').DataTable({
		jQueryUI: true
	});

	$('#daftarpeminjaman').DataTable({
		jQueryUI: true
	});

	/* JQuery Save Function */
	$('#save').click(function(){

		var aksi 			= $('#save').val();
		var codeanggota 	= $('#codeanggota').val();
		var codebuku 		= $('#codebuku').val();

		if( codeanggota=="" || codebuku=="" ){
			/* Jquery Bootstrap Validation */
			$(function(){
				$("input, select, textarea").not("[type=submit]").jqBootstrapValidation();
			});
		} else {
			/* Request Ajax */
			$.ajax({
				type 	: 'POST',
				data 	: {
					aksi 			: aksi,
					codeanggota 	: codeanggota,
					codebuku 		: codebuku,
				},
				dataType 	: 'json',
				url 		: 'module/peminjaman/aksipeminjaman.php',
				success : function(data){
					alert(data.pesan);
					resetForm();
					location.reload(); 
				}
			});
		}
	});

	/* JQuery Syncronize Function */
	$('#syncronize').click(function(){
		var aksi = "syncronize";
		$.ajax({
			type 		: 'POST',
			data 		: {
				aksi : aksi
			},
			dataType 	: 'JSON',
			url			: 'module/peminjaman/aksipeminjaman.php',
			success:function(data){
				alert(data.pesan);
				resetForm();
				location.reload();
			}
		});
	});

	/* 
	* Event Ketika Tombol Klik for Update/Delete diklik 
	* Maka akan memanggil function dockingForm
	*/
	$('#action').click(function(){
		$('label, #firstname, #lastname,#email').attr('disabled', 'disabled');
		dockingForm();
	});

	/* JQuery Auto Compelete Get Code Anggota Function */
	$('#codeanggota').autocomplete({
		source : 'module/peminjaman/getDataAnggota.php'
	});

	/* JQuery Auto Compelete Get Code Buku Function */
	$('#codebuku').autocomplete({
		source : 'module/peminjaman/getDataBuku.php'
	});

	/* JQuery Load Data Nama Anggota Function */
	$('#codeanggota').keyup(function(oe){
		
		var code = $('#codeanggota').val();
		var aksi = "loadanggota";
		$.ajax({
			url  		: 'module/peminjaman/aksipeminjaman.php',
			data 		: {code:code, aksi:aksi},
			type 		: 'POST',
			dataType 	: 'json',
			success:function(data){
				$('#nama').val(data.name);
			}
		});
	});

	/* JQuery Load Data Nama Buku Function */
	$('#codebuku').keyup(function(oe){
		
		var code = $('#codebuku').val();
		var aksi = "loadbuku";
		$.ajax({
			url  		: 'module/peminjaman/aksipeminjaman.php',
			data 		: {code:code, aksi:aksi},
			type 		: 'POST',
			dataType 	: 'json',
			success:function(data){
				$('#judul-buku').val(data.name);
			}
		});
	});

	/* Jquery Event Reset Button Click */
	$('#reset').click(function(){
		resetForm();
	});

	/* Jquery Print Area */
	$('#cetak').click(function(){
		$('.panel').hide();
	});
});