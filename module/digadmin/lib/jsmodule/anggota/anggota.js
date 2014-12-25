$(document).ready(function() {

	/* Fungsi Mereset Form */
	function resetForm() {
		$('#save').removeAttr('disabled');
		$('#update, #delete, #reset, #cd-update').attr('disabled','disabled');
		$('label, #name, #phone, #email').removeAttr('disabled');
		$('#action').show();
		$('#cd-update').hide();
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
		$('#update, #delete, #reset, #cd-update').removeAttr('disabled');
		$('#action').hide();
		$('#cd-update').show();
	}

	/* Fungsi Yang Pertama Kali Diload */
	resetForm();
	$('#cd-update').hide();
	
	/* JQuery DataGrid Function */
	$('#tableanggota').DataTable({
		jQueryUI: true
	});

	/* JQuery Save Function */
	$('#save').click(function(){

		var aksi 	= $('#save').val();
		var name 	= $('#name').val();
		var phone 	= $('#phone').val();
		var email 	= $('#email').val();

		if( name=="" || phone=="" ||  email==""){
			/* Jquery Bootstrap Validation Untuk Fungsi Validasi */
			$(function(){
				$("input, select, textarea").not("[type=submit]").jqBootstrapValidation();
			});
		} else {
			/* Request Ajax */
			$.ajax({
				type 	: 'POST',
				data 	: {
					aksi 	: aksi,
					name 	: name,
					phone 	: phone,
					email 	: email
				},
				dataType 	: 'json',
				url 		: 'module/anggota/aksianggota.php',
				success : function(data){
					alert(data.pesan);
					resetForm();
					location.reload(); 
				}
			});
		}
	});

	/* JQuery Update Function */
	$('#update').click(function(){
		var aksi 	= "update";
		var code 	= $('#cd-update').val();
		var name 	= $('#name').val();
		var phone 	= $('#phone').val();
		var email 	= $('#email').val();

		/* Request Ajax */
		$.ajax({
		type 	: 'POST',
		data 	: {
			aksi 	: aksi,
			code 	: code,
			name 	: name,
			phone 	: phone,
			email 	: email
		},
	 	dataType 	: 'json',
	 	url 		: 'module/anggota/aksianggota.php',
	 	success : function(data){
	 		alert(data.pesan);
	 		resetForm();
	 		location.reload(); 
	 	}
		});
	});

	/* JQuery Delete Function */
	$('#delete').click(function(){
		var aksi = "delete";
		var code = $('#cd-update').val();
		$.ajax({
			type 		: 'POST',
			data 		: {aksi:aksi, code:code},
			dataType	: 'json',
			url 		: 'module/anggota/aksianggota.php',
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
		$('label, #name, #phone, #email').attr('disabled', 'disabled');
		dockingForm();
	});

	/* JQuery Get Code Buku Function */
	$('#cd-update').autocomplete({
		source : 'module/anggota/aksianggota.php',
	});

	/* JQuery Load Data to Form Function */
	$('#cd-update').keyup(function(oe){
		
		var code = $('#cd-update').val();
		var aksi = "load";
		$.ajax({
			url  		: 'module/anggota/aksianggota.php',
			data 		: {code:code, aksi:aksi},
			type 		: 'POST',
			dataType 	: 'json',
			success:function(data){
				$('#name').val(data.name);
				$('#phone').val(data.phone);
				$('#email').val(data.email);
			}
		});
		$('label, #name, #phone, #email').removeAttr('disabled');
	});

	/* Jquery Event Reset Button Click */
	$('#reset').click(function(){
		resetForm();
	});
});