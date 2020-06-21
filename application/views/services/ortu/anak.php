
<script type="text/javascript">
$(document).ready(function(){ 

    daftar_anak();
    //  -----------------------------------------------------------------------------
    //  |       AMBIL DATA KE DATABASE                                              |
    //  -----------------------------------------------------------------------------

    function daftar_anak(){
	    $.ajax({
	        url   : '<?= base_url("ortu/Data_Anak/view_data_anak")?>',
	        method:"POST",
	        async : false,
	        dataType:'json',
	        success : function(data){

	        	var base_url = ''
	            var html = '';
	            var i;
	            if (data.length > 0) {
	                for (i = 0; i < data.length; i++) {
	                	var tgl = data[i].tanggal_lahir;
						var n = tgl.slice(0,10).split('-').reverse().join('-');

	                	html += '<div class="col-lg-5 order-lg-3">' +
				                  '<div class="card card-profile">' +
				                    '<img src="<?= base_url('assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">' +
				                    '<div class="row justify-content-center">' +
				                      '<div class="col-lg-3 order-lg-2 mb-4">' +
				                        '<div class="card-profile-image"><a href="#"><img src="<?= base_url("assets/img/anak/") ?>'+data[i].foto+'" class="rounded-circle"></a></div>' +
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
				                  '</div>' +
				                '</div>'
					}
					$('#show_data_anak').html(html);
	            }else{
					$('#show_data_anak').html('<div class="col-12 text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></div>');
	            }
	        }
	    });
    }
    

});
</script>

</body>
    
</html>