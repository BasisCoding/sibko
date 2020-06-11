
<script type="text/javascript">
$(document).ready(function(){ 
	$(".select").select2({
		placeholder: 'Pilih Salah Satu'
	}); 
	let current_datetime = new Date()
	let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate()

    daftar_siswa();

    //  -----------------------------------------------------------------------------
    //  |       AMBIL DATA KE DATABASE                                              |
    //  -----------------------------------------------------------------------------

    function daftar_siswa(query){
	    $.ajax({
	        url   : '<?= base_url("admin/Master/view_data_siswa")?>',
	        method:"POST",
	        async : false,
	        dataType:'json',
	        data:{query:query},
	        success : function(data){

	        	var base_url = ''
	            var html = '';
	            var i;
	            if (data.length > 0) {
	                for (i = 0; i < data.length; i++) {
	                	var tgl = data[i].tanggal_lahir;
						var d = new Date(tgl);
						var n = d.toJSON().slice(0,10).split('-').reverse().join('-');

	                	html += '<div class="col-lg-3 order-lg-2">' +
				                  '<div class="card card-profile">' +
				                    '<img src="<?= base_url('assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">' +
				                    '<div class="row justify-content-center">' +
				                      '<div class="col-lg-3 order-lg-2">' +
				                        '<div class="card-profile-image"><a href="#"><img src="<?= base_url("assets/img/siswa/") ?>'+data[i].foto+'" class="rounded-circle"></a></div>' +
				                      '</div>' +
				                    '</div>' +
				                    '<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">' +
				                      '<div class="d-flex justify-content-between">' +
				                        '<a href="#" class="btn btn-sm btn-info mr-4 ">Update</a>' +
				                        '<a href="#" class="btn btn-sm btn-danger float-right">Delete</a>' +
				                      '</div>' +
				                    '</div>' +
				                    '<div class="card-body pt-0">' +
				                      '<div class="text-center">' +
				                        '<h5 class="h3">'+data[i].nis+'<span class="font-weight-light"></span></h5>' +
				                        '<h5 class="h3">'+data[i].nama_lengkap+'<span class="font-weight-light"></span></h5>' +
				                        '<div class="h5 font-weight-300"><i class="ni location_pin mr-2"></i>'+data[i].tempat_lahir+', '+n+'</div>' +
				                        '<div class="h5 mt-2"><i class="ni business_briefcase-24 mr-2"></i>'+data[i].jenis_kelamin+'</div>' +
				                        '<div><i class="ni education_hat mr-2"></i>'+data[i].nama_ortu+'</div>' +
				                      '</div>' +
				                    '</div>' +
				                    '<div class="d-flex justify-content-between mt-2">' +
				                      '<button type="button" class="btn btn-sm btn-success"><i class="ni ni-send"></i> Lihat Alamat</button>' +
				                      '<button type="button" class="btn btn-sm btn-dark"><i class="ni ni-send"></i>Lihat Detail</button>' +
				                    '</div>' +
				                  '</div>' +
				                '</div>'
					}
					$('#show_data_siswa').html(html);
	            }else{
					$('#show_data_siswa').html('<div class="col-12 text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></div>');
	            }
	        }

	    });
    }


    //  -----------------------------------------------------------------------------
    //  |       TAMBAH DATA                                                         |
    //  -----------------------------------------------------------------------------

    $('#add-data').on('click', function () {
    	$('#add-modal').modal('show');
    })

    
    //  -----------------------------------------------------------------------------
    //  |       PENCARIAN DATA                                                      |
    //  -----------------------------------------------------------------------------

    $('#search').keyup(function(){
        var search = $(this).val();
        if(search != '') {
            daftar_siswa(search);
        } else {
            daftar_siswa();
        }
    });

});
</script>

</body>
    
</html>