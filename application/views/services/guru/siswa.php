
<script type="text/javascript">
$(document).ready(function(){ 

    daftar_siswa();

    $('[name="id_ortu"]').on('change', function () {
    	if ($(this).val() == 'lainnya') {
    		$('#add-modal-ortu').modal('show');
    	}
    })
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
						var n = tgl.slice(0,10).split('-').reverse().join('-');

	                	html += '<div class="col-lg-3 order-lg-2">' +
				                  '<div class="card card-profile">' +
				                    '<img src="<?= base_url('assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">' +
				                    '<div class="row justify-content-center">' +
				                      '<div class="col-lg-3 order-lg-2 mb-4">' +
				                        '<div class="card-profile-image"><a href="#"><img src="<?= base_url("assets/img/siswa/") ?>'+data[i].foto+'" class="rounded-circle"></a></div>' +
				                      '</div>' +
				                    '</div>' +
				                    
				                    '<div class="card-body pt-5">' +
				                      '<div class="text-center">' +
				                        '<h5 class="h3">'+data[i].nis+'<span class="font-weight-light"></span></h5>' +
				                        '<h5 class="h3">'+data[i].nama_lengkap+'<span class="font-weight-light"></span></h5>' +
				                        '<div class="h5 font-weight-300"><i class="ni location_pin mr-2"></i>'+data[i].tempat_lahir+', '+n+'</div>' +
				                        '<div class="h5 mt-2"><i class="ni business_briefcase-24 mr-2"></i>'+data[i].jenis_kelamin+'</div>' +
				                        '<div class="h5 mt-2"><i class="ni business_briefcase-24 mr-2"></i>'+data[i].nama_jurusan+'</div>' +
				                        '<div><i class="ni education_hat mr-2"></i>'+data[i].tingkat+' '+data[i].kode_jurusan+'</div>' +
				                      '</div>' +
				                    '</div>' +
				                    // '<div class="d-flex justify-content-between mt-1">' +	
				                    //     '<button data-nis="'+data[i].nis+'" data-nama_lengkap="'+data[i].nama_lengkap+'" data-tempat_lahir="'+data[i].tempat_lahir+'" data-tanggal_lahir="'+data[i].tanggal_lahir+'" data-jenis_kelamin="'+data[i].jenis_kelamin+'" data-agama="'+data[i].agama+'" data-alamat="'+data[i].alamat+'" data-anak_ke="'+data[i].anak_ke+'" data-id_ortu="'+data[i].id_ortu+'" data-foto="'+data[i].foto+'" data-hp="'+data[i].hp+'" data-email="'+data[i].email+'" type="button" class="btn btn-sm btn-success"><i class="ni ni-send"></i> Lihat Detail</button>' +
				                    //   '<button type="button" class="btn btn-sm btn-dark"><i class="ni ni-send"></i>Lihat Alamat</button>' +
				                    // '</div>' +
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