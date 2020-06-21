
<script type="text/javascript">
$(document).ready(function(){ 
	$("[name='jenis_kelamin']").select2({
		placeholder: 'Jenik Kelamin'
	}); 
	$("[name='jenis_kelamin_update']").select2({
		placeholder: 'Jenik Kelamin'
	}); 
	$("[name='agama']").select2({
		placeholder: 'Pilih Agama'
	}); 
	$("[name='agama_update']").select2({
		placeholder: 'Pilih Agama'
	});
	$("[name='pendidikan']").select2({
		placeholder: 'Pilih Pendidikan'
	}); 
	$("[name='pendidikan_update']").select2({
		placeholder: 'Pilih Pendidikan'
	});
	$("[name='pekerjaan']").select2({
		placeholder: 'Pilih Pekerjaan'
	}); 
	$("[name='pekerjaan_update']").select2({
		placeholder: 'Pilih Pekerjaan'
	});
	
    daftar_ortu();

    //  -----------------------------------------------------------------------------
    //  |       AMBIL DATA KE DATABASE                                              |
    //  -----------------------------------------------------------------------------

    function daftar_ortu(query){
	    $.ajax({
	        url   : '<?= base_url("admin/Master/view_data_ortu")?>',
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
				                      '<div class="col-lg-3 order-lg-2">' +
				                        '<div class="card-profile-image"><a href="#"><img src="<?= base_url("assets/img/ortu/") ?>'+data[i].foto+'" class="rounded-circle"></a></div>' +
				                      '</div>' +
				                    '</div>' +
				                    '<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">' +
				                      '<div class="d-flex justify-content-between">' +
				                        '<button data-nik="'+data[i].nik+'" data-nama_lengkap="'+data[i].nama_lengkap+'" data-tempat_lahir="'+data[i].tempat_lahir+'" data-tanggal_lahir="'+data[i].tanggal_lahir+'" data-jenis_kelamin="'+data[i].jenis_kelamin+'" data-agama="'+data[i].agama+'" data-alamat="'+data[i].alamat+'" data-pendidikan="'+data[i].pendidikan+'" data-pekerjaan="'+data[i].pekerjaan+'" data-foto="'+data[i].foto+'" data-hp="'+data[i].hp+'" data-email="'+data[i].email+'" class="btn btn-sm btn-info mr-4 update_ortu">Update</button>' +
				                        '<button data-nik="'+data[i].nik+'" class="btn btn-sm btn-danger float-right delete_ortu">Delete</button>' +
				                      '</div>' +
				                    '</div>' +
				                    '<div class="card-body pt-0">' +
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
    //  |       TAMBAH DATA                                                         |
    //  -----------------------------------------------------------------------------

    $('#add-data').on('click', function () {
    	$('#add-modal').modal('show');
    });

   	$('#show_data_ortu').on('click','.update_ortu',function(){
        var nik=$(this).attr('data-nik');
        var nama_lengkap=$(this).attr('data-nama_lengkap');
        var tempat_lahir=$(this).attr('data-tempat_lahir');
        var tanggal_lahir=$(this).attr('data-tanggal_lahir');
        var jenis_kelamin=$(this).attr('data-jenis_kelamin');
        var alamat=$(this).attr('data-alamat');
        var pendidikan=$(this).attr('data-pendidikan');
        var hp=$(this).attr('data-hp');
        var email=$(this).attr('data-email');
        var foto=$(this).attr('data-foto');

        $('[name="nik_update"]').val(nik);
        $('[name="nama_lengkap_update"]').val(nama_lengkap);
        $('[name="tempat_lahir_update"]').val(tempat_lahir);
        $('[name="tanggal_lahir_update"]').val(tanggal_lahir);
        $('[name="jenis_kelamin_update"]').val(jenis_kelamin);
        $('[name="alamat_update"]').val(alamat);
        $('[name="pendidikan_update"]').val(pendidikan);
        $('[name="hp_update"]').val(hp);
        $('[name="email_update"]').val(email);
        $('[name="foto_lama"]').val(foto);

        $('[name="nik_update"]').attr('disabled', true);
        $('#update-modal').modal('show');
    });

    $('#show_data_ortu').on('click','.delete_ortu',function(){
        var nik=$(this).attr('data-nik');

    	Swal.fire({
		  title: 'Are you sure ?',
		  text: "Anda Akan Kehilangan Data ini",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
			        url   : '<?= base_url("admin/Master/delete_ortu")?>',
			        method:"POST",
			        async : false,
			        dataType:'json',
			        data:{nik:nik},
			        success : function(data){
					    Swal.fire(
					      'Terhapus!',
					      'Data Anda Sudah Terhapus.',
					      'success'
					    )
					    daftar_ortu();
					  }

			   	});
			}
		});
    });

    $('#btn-add').on('click', function () {
                
	    if ($('[name="nik"]').val().length == 0){
	        $('[name="nik"]').addClass('border-danger');
	        $('[name="nik"]').focus();
	        return false;
	    }
	    if ($('[name="nama_lengkap"]').val().length == 0){
	        $('[name="nama_lengkap"]').addClass('border-danger');
	        $('[name="nama_lengkap"]').focus();
	        return false;
	    }
	    if ($('[name="tempat_lahir"]').val().length == 0){
	        $('[name="tempat_lahir"]').addClass('border-danger');
	        $('[name="tempat_lahir"]').focus();
	        return false;
	    }
	    if ($('[name="tanggal_lahir"]').val().length == 0){
	        $('[name="tanggal_lahir"]').addClass('border-danger');
	        $('[name="tanggal_lahir"]').focus();
	        return false;
	    }

	    var formData = new FormData();
	    formData.append('nik', $('[name="nik"]').val()); 
	    formData.append('nama_lengkap', $('[name="nama_lengkap"]').val()); 
	    formData.append('tempat_lahir', $('[name="tempat_lahir"]').val()); 
	    formData.append('tanggal_lahir', $('[name="tanggal_lahir"]').val()); 
	    formData.append('jenis_kelamin', $('[name="jenis_kelamin"]').val()); 
	    formData.append('agama', $('[name="agama"]').val()); 
	    formData.append('alamat', $('[name="alamat"]').val()); 
	    formData.append('pendidikan', $('[name="pendidikan"]').val());
	    formData.append('username', $('[name="username"]').val());
	    formData.append('password', $('[name="password"]').val());
	    formData.append('hp', $('[name="hp"]').val()); 
	    formData.append('email', $('[name="email"]').val()); 
	    formData.append('foto', $('[name="foto"]')[0].files[0]);
	   
    	$('.loader').css('display', 'inline-block');
    	$(this).attr('disabled');
	    $.ajax({
	        url: '<?= base_url("admin/Master/save_ortu")?>',
	        type: 'POST',
	        dataType: 'JSON',
	        data: formData,
	        cache: false,
	        processData: false,
	        contentType: false,

	        success: function (data) {
	        	if (data.status == 'success') {

		            $('[name="nik"]').val(''); 
		            $('[name="nama_lengkap"]').val(''); 
		            $('[name="tempat_lahir"]').val(''); 
		            $('[name="tanggal_lahir"]').val(''); 
		            $('[name="agama"]').val(''); 
		            $('[name="alamat"]').val(''); 
		            $('[name="anak_ke"]').val(''); 
		            $('[name="pendidikan"]').val(''); 
		            $('[name="hp"]').val(''); 
		            $('[name="foto"]').val(''); 
		            $('[name="hp"]').val('');
		            $('[name="email"]').val('');
	        		$(this).removeAttr('disabled');
					$('.loader').css('display', 'none');


		            $('#add-modal').modal('hide');
		            daftar_ortu();

	        	}else{
		            $('#add-modal').modal('hide');
	        		$(this).removeAttr('disabled');
					$('.loader').css('display', 'none');
	        	}
	            let timerInterval
	              Swal.fire({
	                title: data.title,
	                html: data.message,
	                timer: 1500,
	                onClose: () => {
	                  clearInterval(timerInterval)
	                }
	            });
	        }
	    });
	    return false;
	});

	$('#btn-update').on('click', function () {
                
	    if ($('[name="nik_update"]').val().length == 0){
	        $('[name="nik_update"]').addClass('border-danger');
	        $('[name="nik_update"]').focus();
	        return false;
	    }
	    if ($('[name="nama_lengkap_update"]').val().length == 0){
	        $('[name="nama_lengkap_update"]').addClass('border-danger');
	        $('[name="nama_lengkap_update"]').focus();
	        return false;
	    }
	    if ($('[name="tempat_lahir_update"]').val().length == 0){
	        $('[name="tempat_lahir_update"]').addClass('border-danger');
	        $('[name="tempat_lahir_update"]').focus();
	        return false;
	    }
	    if ($('[name="tanggal_lahir_update"]').val().length == 0){
	        $('[name="tanggal_lahir_update"]').addClass('border-danger');
	        $('[name="tanggal_lahir_update"]').focus();
	        return false;
	    }

	    var formData = new FormData();

	    formData.append('nik', $('[name="nik_update"]').val()); 
	    formData.append('nama_lengkap', $('[name="nama_lengkap_update"]').val()); 
	    formData.append('tempat_lahir', $('[name="tempat_lahir_update"]').val()); 
	    formData.append('tanggal_lahir', $('[name="tanggal_lahir_update"]').val()); 
	    formData.append('jenis_kelamin', $('[name="jenis_kelamin_update"]').val()); 
	    formData.append('agama', $('[name="agama_update"]').val()); 
	    formData.append('alamat', $('[name="alamat_update"]').val()); 
	    formData.append('pendidikan', $('[name="pendidikan_update"]').val()); 
	    formData.append('hp', $('[name="hp_update"]').val()); 
	    formData.append('email', $('[name="email_update"]').val()); 
	    formData.append('foto_lama', $('[name="foto_lama"]').val()); 
	    formData.append('foto', $('[name="foto_update"]')[0].files[0]);
	   
    	$('.loader').css('display', 'inline-block');
    	$(this).attr('disabled');
	    $.ajax({
	        url: '<?= base_url("admin/Master/update_ortu")?>',
	        type: 'POST',
	        dataType: 'JSON',
	        data: formData,
	        cache: false,
	        processData: false,
	        contentType: false,

	        success: function (data) {
	        	if (data.status == 'success') {

		            $('[name="nik_update"]').val();
			        $('[name="nama_lengkap_update"]').val();
			        $('[name="tempat_lahir_update"]').val();
			        $('[name="tanggal_lahir_update"]').val();
			        $('[name="jenis_kelamin_update"]').val();
			        $('[name="alamat_update"]').val();
			        $('[name="pendidikan_update"]').val();
			        $('[name="hp_update"]').val();
			        $('[name="id_ortu_update"]').val();
			        $('[name="email_update"]').val();
	        		$(this).removeAttr('disabled');
					$('.loader').css('display', 'none');


		            $('#update-modal').modal('hide');
		            daftar_ortu();

	        	}else{
		            $('#update-modal').modal('hide');
	        		$(this).removeAttr('disabled');
					$('.loader').css('display', 'none');
	        	}
	            let timerInterval
	              Swal.fire({
	                title: data.title,
	                html: data.message,
	                timer: 1500,
	                onClose: () => {
	                  clearInterval(timerInterval)
	                }
	            });
	        }
	    });
	    return false;
	});

	
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