<div class="container-fluid">
    <h3>PENCARIAN BUKU</h3><hr>
	<form class="navbar-form navbar-right" method="get" role="search">
        <div class="form-group">

            <!-- Element Input HTML dengan id="name" -->
    	   <input type="text" id="name" name="name"  class="form-control" placeholder="Masukan Judul Buku">
    
        </div>
        
        <!-- Element Submit HTML dengan id="cari" -->
        <button type="submit" id="cari" name="cari" class="btn btn-default btnCari">Cari </button>
	</form>
</div>

<!-- Element Tabel HTML dengan id="databuku" -->
<table id="databuku" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    	<th width="4%">No</th>
    	<th width="10%">Kode</th>
    	<th>Judul</th>
    	<th width="16%">Penerbit</th>
    	<th width="10%">Status</th>
    </thead>
    <tbody>
        <!-- Hasil Pencarian Akan Ditampilkan Disini -->
    </tbody>
</table>
<script type="text/javascript">

    /*
    * event ketika tombol Cari Di Klik Maka Akan Memanggil function prosesAjax
    */
	$(document).ready(function($) {
		$('.btnCari').click(function(){
			prosesAjax();
		});

        /*
        * event ketika tombol Ketika Menekan Tombol Enter Pada Keyboard
        * Maka Akan Memanggil function prosesAjax
        */
        $('form').submit(function(e){
            e.preventDefault();
            prosesAjax();
            return false;
        });

        /*
        * Function prosesAjax
        */
        function prosesAjax() {
            /*
            * Perintah ajax Dalam JQuery
            */
            $.ajax({

                /* Letak file PHP yang akan di Asyncronouskan */
                url: 'module/searching.php',
                
                /*Method Yang Digunakan GET*/
                type: 'get',

                /*
                * Array data yang dialamnya terdapat variabel name 
                * yang valuenya mengambil dari element input html dengan id="name"
                */
                data: {
                    name: $('input#name').val()
                },

                /* 
                * Hasil dari proses pencarian akan ditampilkan pada tabel HTML 
                * dengan id="databuku" yang memiliki element tbody 
                */
                success: function(response) {
                    $('table#databuku tbody').html(response);
                }
            });
        }
	});
</script>
