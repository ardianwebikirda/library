$(document).ready(function() {

	/* Fungsi Mereset Form */
	function resetForm() {
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
	$('#tablepengembalian').DataTable({
		jQueryUI: true
	});

	/* JQuery DataGrid Function */
	$('#daftarpengembalian').DataTable({
		jQueryUI: true
	});

	/* 
	* Event Ketika Tombol Kembalikan Di Klik
	*/
	$('#kembalikan').click(function(){
		var aksi 			= "kembalikan";
		var nopeminjaman	= $('#nopeminjaman2').text();
		$.ajax({
			type 		: 'POST',	
			url 		: 'module/pengembalian/aksipengembalian.php',
			data 		: {
				aksi : aksi, 
				nopeminjaman : nopeminjaman
			},
			dataType 	: 'JSON',
			success:function(response){
				alert(response.pesan);
				resetForm();
				location.reload();
				window.location='dashboard.php?hal=pengembalian';
			}
		});
	});


	/* JQuery Auto Compelete Get Code Anggota Function */
	$('#nopeminjaman').autocomplete({
		source : 'module/pengembalian/aksipengembalian.php'
	});

	/* JQuery Load Data Nama Anggota Function */
	$('#nopeminjaman').keyup(function(oe){
		
		var code = $('#nopeminjaman').val();
		var aksi = "loadData";
		$.ajax({
			url  		: 'module/pengembalian/aksipengembalian.php',
			data 		: {code:code, aksi:aksi},
			type 		: 'POST',
			dataType 	: 'json',
			success:function(data){
				$('#codeanggota').val(data.codeanggota);
				$('#nama').val(data.name);
			}
		});
	});


	/* Jquery Event Reset Button Click */
	$('#reset').click(function(){
		resetForm();
	});
});