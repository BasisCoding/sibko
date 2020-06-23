
<script type="text/javascript">
$(document).ready(function(){ 
	
    daftar_ortu();

    //  -----------------------------------------------------------------------------
    //  |       AMBIL DATA KE DATABASE                                              |
    //  -----------------------------------------------------------------------------

    function daftar_ortu(query){
	    $.ajax({
	        url   : '<?= base_url("guru/Master/view_data_ortu")?>',
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
	                	if (data[i].status == 'Aktif') {
	                		status ='<span class="badge badge-success">'+data[i].status+'</span>';
	                	}else{
	                		status ='<span class="badge badge-danger">Tidak Aktif</span>';
	                	}
	                	var tgl = data[i].tanggal_lahir;
						var n = tgl.slice(0,10).split('-').reverse().join('-');

	                	html += '<div class="col-lg-3 order-lg-2">' +
				                  '<div class="card card-profile">' +
				                    '<img src="<?= base_url('assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">' +
				                    '<div class="row justify-content-center">' +
				                      '<div class="col-lg-3 order-lg-2 mb-4">' +
				                        '<div class="card-profile-image"><a href="#"><img src="<?= base_url("assets/img/ortu/") ?>'+data[i].foto+'" class="rounded-circle"></a></div>' +
				                      '</div>' +
				                    '</div>' +
				                    
				                    '<div class="card-body pt-5">' +
				                      '<div class="text-center">' +
				                        '<h5 class="h3">'+data[i].nik+'<span class="font-weight-light"></span></h5>' +
				                        '<h5 class="h3">'+data[i].nama_lengkap+'<span class="font-weight-light"></span></h5>' +
				                        '<div class="h5 font-weight-300"><i class="ni location_pin mr-2"></i>'+data[i].tempat_lahir+', '+n+'</div>' +
				                        '<div class="h5 mt-2"><i class="ni business_briefcase-24 mr-2"></i>'+data[i].jenis_kelamin+'</div>' +
				                        
				                        '<div class="h5 mt-2"><i class="ni business_briefcase-24 mr-2"></i>'+status+'</div>' +
				                        
				                      '</div>' +
				                    '</div>' +
				                    // '<div class="d-flex justify-content-between mt-1">' +
				                    //   '<button type="button" class="btn btn-sm btn-success"><i class="ni ni-send"></i> Lihat Alamat</button>' +
				                    //   '<button type="button" class="btn btn-sm btn-dark"><i class="ni ni-send"></i>Lihat Detail</button>' +
				                    // '</div>' +
				                  '</div>' +
				                '</div>'
					}
					$('#show_data_ortu').html(html);
	            }else{
					$('#show_data_ortu').html('<div class="col-12 text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></div>');
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
            daftar_ortu(search);
        } else {
            daftar_ortu();
        }
    });

});
</script>

</body>
    
</html>