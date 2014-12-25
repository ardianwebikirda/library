	$(document).ready(function() {

		/* Fungsi Mereset Form */
		function resetForm() {
			$('#save').removeAttr('disabled');
			$('#update, #delete, #reset, #cd-update').attr('disabled','disabled');
			$('label, #judul, #penulis, #tgl_datang, #publisher, #poy').removeAttr('disabled');
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

		/* Function Pertama Yang Akan DiLoad */
		resetForm();
		$('#cd-update').hide();
		
		/* JQuery DataGrid Function */
		$('#tablebuku').DataTable({
			jQueryUI: true
		});

		/* JQuery Save Function */
		$('#save').click(function(){
			var aksi 		= "save";
			var judul 		= $('#judul').val();
			var penulis 	= $('#penulis').val();
			var tgl_datang 	= $('#tgl_datang').val();
			var publisher 	= $('#publisher').val();
			var poy 		= $('#poy').val();

			if( judul==null || penulis==null || tgl_datang==null || publisher==null || poy==null ){
				/* Jquery Bootstrap Validation */
				$("input, select, textarea").not("[type=submit]").jqBootstrapValidation();

			} else {
				/* Request Ajax */
				$.ajax({
					type 	: 'POST',
					data 	: {
						aksi 		: aksi,
						judul 		: judul,
						penulis 	: penulis,
						tgl_datang 	: tgl_datang,
						publisher 	: publisher,
						poy 		: poy
					},
					dataType 	: 'json',
					url 		: 'module/buku/aksibuku.php',
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
			var aksi 		= "update";
			var code 		= $('#cd-update').val();
			var judul 		= $('#judul').val();
			var penulis 	= $('#penulis').val();
			var tgl_datang 	= $('#tgl_datang').val();
			var publisher 	= $('#publisher').val();
			var poy 		= $('#poy').val();
			console.log(aksi,code,penulis, judul, poy, tgl_datang);

			/* Request Ajax */
			$.ajax({
			type 	: 'POST',
			data 	: {
				aksi 		: aksi,
				code 		: code,
				judul 		: judul,
				penulis 	: penulis,
				tgl_datang 	: tgl_datang,
				publisher 	: publisher,
				poy 		: poy
			},
		 	dataType 	: 'json',
		 	url 		: 'module/buku/aksibuku.php',
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
				url 		: 'module/buku/aksibuku.php',
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
			$('label, #judul, #penulis, #tgl_datang, #publisher, #poy').attr('disabled', 'disabled');
			dockingForm();
		});

		/* JQuery Get Code Buku Function */
		$('#cd-update').autocomplete({
			source : 'module/buku/aksibuku.php',
		});

		/* JQuery Load Data to Form Function */
		$('#cd-update').keyup(function(oe){
			
			var code = $('#cd-update').val();
			var aksi = "load";
			$.ajax({
				url  		: 'module/buku/aksibuku.php',
				data 		: {code:code, aksi:aksi},
				type 		: 'POST',
				dataType 	: 'json',
				success:function(data){
					$('#judul').val(data.judul);
					$('#penulis').val(data.penulis);
					$('#tgl_datang').val(data.tgl_datang);
					$('#publisher').val(data.publisher);
					$('#poy').val(data.poy);
				}
			});
			$('label, #judul, #penulis, #tgl_datang, #publisher, #poy').removeAttr('disabled');
		});

		/* JQuery Get Author */
		$('#penulis').autocomplete({
			source : 'lib/cariPenulis.php'
		});

		/* Jquery Date Picker */
		$('#tgl_datang').datepicker({
			dateFormat: 'yy-mm-dd'
		});

		/* Jquery Date Picker Get Year*/
		$('#poy').datepicker({
			dateFormat	: 'yy',
			changeYear 	: true
		});

		/* Jquery Event Reset Button Click */
		$('#reset').click(function(){
			resetForm();
		});
	});