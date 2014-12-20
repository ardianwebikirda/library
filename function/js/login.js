function login(){

	/*
	* Membuat variabel dengan mengambil value dari elemen input Username & Password
	*/	
	var username 	= $('input#username').val();
	var password 	= $('input#password').val();

    /*
    * event ketika tombol Cari Di Klik Maka Akan Memanggil function prosesAjax
    */
	$('.btnLogin').click(function(){
		loginAjax();
	});

    /*
    * event ketika tombol Ketika Menekan Tombol Enter Pada Keyboard
    * Maka Akan Memanggil function prosesAjax
    */
	$('form').submit(function(e){
		e.preventDefault();
		loginAjax();
	});

	/*
	* Function loginAjax
	*/
	function loginAjax(){
	    /*
	    * Perintah ajax Dalam JQuery
	    */
		$.ajax({

			/* Letak file PHP yang akan di Asyncronouskan */
			url 		: 'ceklogin.php',

			/* Method Yang Digunakan GET */
			type		: 'get',

			/* Sumber data yang diambil dari elemen-2 HTML */
			dataType 	: 'html',

	        /*
	        * Array data yang dialamnya terdapat variabel name 
	        * yang valuenya mengambil dari variabel username & password
	        */
			data 		: {username : username, password : password},

	        /* 
	        * Hasil dari proses login, jika berhasil akan diarahkan ke halaman Dashboard 
	        * Sedangkan jika gagal akan menampilkan teks gagal login
	        */
			success: function(pesan){
				swal({
					title : pesan,
					timer : 6000
				});
				window.location = 'module/digadmin/dashboard.php';	
			},

			error: function(pesan){
				alert(pesan);
			}
		});
	}
}
