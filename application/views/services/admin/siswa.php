
<script type="text/javascript">
$(document).ready(function(){ 
	$("[name='jenis_kelamin']").select2({
		placeholder: 'Jenis Kelamin'
	}); 
	$("[name='jenis_kelamin_update']").select2({
		placeholder: 'Jenis Kelamin'
	}); 
	$("[name='agama']").select2({
		placeholder: 'Pilih Agama'
	}); 
	$("[name='agama_update']").select2({
		placeholder: 'Pilih Agama'
	}); 
	$("[name='id_ortu']").select2({
		placeholder: 'Pilih Orang Tua'
	}); 
	$("[name='id_ortu_update']").select2({
		placeholder: 'Pilih Orang Tua'
	}); 
	$("[name='jenis_kelamin_ortu']").select2({
		placeholder: 'Jenis Kelamin'
	}); 

    daftar_siswa();
    daftar_ortu();

    $('[name="id_ortu"]').on('change', function () {
    	if ($(this).val() == 'lainnya') {
    		$('#add-modal-ortu').modal('show');
    	}
    });
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
				                      '<div class="col-lg-3 order-lg-2">' +
				                        '<div class="card-profile-image"><a href="#"><img src="<?= base_url("assets/img/siswa/") ?>'+data[i].foto+'" class="rounded-circle"></a></div>' +
				                      '</div>' +
				                    '</div>' +
				                    '<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">' +
				                      '<div class="d-flex justify-content-between">' +
				                        '<button data-nis="'+data[i].nis+'" data-nama_lengkap="'+data[i].nama_lengkap+'" data-tempat_lahir="'+data[i].tempat_lahir+'" data-tanggal_lahir="'+data[i].tanggal_lahir+'" data-jenis_kelamin="'+data[i].jenis_kelamin+'" data-agama="'+data[i].agama+'" data-alamat="'+data[i].alamat+'" data-anak_ke="'+data[i].anak_ke+'" data-minat_bakat="'+data[i].minat_bakat+'" data-id_ortu="'+data[i].id_ortu+'" data-foto="'+data[i].foto+'" data-hp="'+data[i].hp+'" data-email="'+data[i].email+'" class="btn btn-sm btn-info mr-4 update_siswa">Update</button>' +
				                        '<button data-nis="'+data[i].nis+'" class="btn btn-sm btn-danger float-right delete_siswa">Delete</button>' +
				                      '</div>' +
				                    '</div>' +
				                    '<div class="card-body pt-0">' +
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
    });

   	$('#show_data_siswa').on('click','.update_siswa',function(){
        var nis=$(this).attr('data-nis');
        var nama_lengkap=$(this).attr('data-nama_lengkap');
        var tempat_lahir=$(this).attr('data-tempat_lahir');
        var tanggal_lahir=$(this).attr('data-tanggal_lahir');
        var jenis_kelamin=$(this).attr('data-jenis_kelamin');
        var alamat=$(this).attr('data-alamat');
        var anak_ke=$(this).attr('data-anak_ke');
        var minat_bakat=$(this).attr('data-minat_bakat');
        var hp=$(this).attr('data-hp');
        var id_ortu=$(this).attr('data-id_ortu');
        var email=$(this).attr('data-email');
        var foto=$(this).attr('data-foto');

        $('[name="nis_update"]').val(nis);
        $('[name="nama_lengkap_update"]').val(nama_lengkap);
        $('[name="tempat_lahir_update"]').val(tempat_lahir);
        $('[name="tanggal_lahir_update"]').val(tanggal_lahir);
        $('[name="jenis_kelamin_update"]').val(jenis_kelamin);
        $('[name="alamat_update"]').val(alamat);
        $('[name="minat_bakat_update"]').val(minat_bakat);
        $('[name="anak_ke_update"]').val(anak_ke);
        $('[name="hp_update"]').val(hp);
        $('[name="id_ortu_update"]').val(id_ortu);
        $('[name="email_update"]').val(email);
        $('[name="foto_lama"]').val(foto);

        $('[name="nis_update"]').attr('disabled', true);
        $('#update-modal').modal('show');
    });

    $('#show_data_siswa').on('click','.delete_siswa',function(){
        var nis=$(this).attr('data-nis');

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
			        url   : '<?= base_url("admin/Master/delete_siswa")?>',
			        method:"POST",
			        async : false,
			        dataType:'json',
			        data:{nis:nis},
			        success : function(data){
					    Swal.fire(
					      'Terhapus!',
					      'Data Anda Sudah Terhapus.',
					      'success'
					    );
					    daftar_siswa();
					  }

			   	});
			}
		});
    });

    $('#btn-add').on('click', function () {
                
	    if ($('[name="nis"]').val().length == 0){
	        $('[name="nis"]').addClass('border-danger');
	        $('[name="nis"]').focus();
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
	    formData.append('nis', $('[name="nis"]').val()); 
	    formData.append('nama_lengkap', $('[name="nama_lengkap"]').val()); 
	    formData.append('tempat_lahir', $('[name="tempat_lahir"]').val()); 
	    formData.append('tanggal_lahir', $('[name="tanggal_lahir"]').val()); 
	    formData.append('jenis_kelamin', $('[name="jenis_kelamin"]').val()); 
	    formData.append('agama', $('[name="agama"]').val()); 
	    formData.append('alamat', $('[name="alamat"]').val()); 
	    formData.append('anak_ke', $('[name="anak_ke"]').val()); 
	    formData.append('id_ortu', $('[name="id_ortu"]').val()); 
	    formData.append('hp', $('[name="hp"]').val()); 
	    formData.append('minat_bakat', $('[name="minat_bakat"]').val()); 
	    formData.append('email', $('[name="email"]').val()); 
	    formData.append('foto', $('[name="foto"]')[0].files[0]);
	   
    	$('.loader').css('display', 'inline-block');
    	$(this).attr('disabled');
	    $.ajax({
	        url: '<?= base_url("admin/Master/save_siswa")?>',
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
		            $('[name="id_ortu"]').val(''); 
		            $('[name="hp"]').val(''); 
		            $('[name="foto"]').val(''); 
		            $('[name="hp"]').val('');
		            $('[name="email"]').val('');
	        		$(this).removeAttr('disabled');
					$('.loader').css('display', 'none');


		            $('#add-modal').modal('hide');
		            daftar_siswa();

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
                
	    if ($('[name="nis_update"]').val().length == 0){
	        $('[name="nis_update"]').addClass('border-danger');
	        $('[name="nis_update"]').focus();
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

	    formData.append('nis', $('[name="nis_update"]').val()); 
	    formData.append('nama_lengkap', $('[name="nama_lengkap_update"]').val()); 
	    formData.append('tempat_lahir', $('[name="tempat_lahir_update"]').val()); 
	    formData.append('tanggal_lahir', $('[name="tanggal_lahir_update"]').val()); 
	    formData.append('jenis_kelamin', $('[name="jenis_kelamin_update"]').val()); 
	    formData.append('agama', $('[name="agama_update"]').val()); 
	    formData.append('alamat', $('[name="alamat_update"]').val()); 
	    formData.append('anak_ke', $('[name="anak_ke_update"]').val()); 
	    formData.append('id_ortu', $('[name="id_ortu_update"]').val()); 
	    formData.append('hp', $('[name="hp_update"]').val()); 
	    formData.append('minat_bakat', $('[name="minat_bakat_update"]').val()); 
	    formData.append('email', $('[name="email_update"]').val()); 
	    formData.append('foto_lama', $('[name="foto_lama"]').val()); 
	    formData.append('foto', $('[name="foto_update"]')[0].files[0]);
	   
    	$('.loader').css('display', 'inline-block');
    	$(this).attr('disabled');
	    $.ajax({
	        url: '<?= base_url("admin/Master/update_siswa")?>',
	        type: 'POST',
	        dataType: 'JSON',
	        data: formData,
	        cache: false,
	        processData: false,
	        contentType: false,

	        success: function (data) {
	        	if (data.status == 'success') {

		            $('[name="nis_update"]').val();
			        $('[name="nama_lengkap_update"]').val();
			        $('[name="tempat_lahir_update"]').val();
			        $('[name="tanggal_lahir_update"]').val();
			        $('[name="jenis_kelamin_update"]').val();
			        $('[name="alamat_update"]').val();
			        $('[name="minat_bakat_update"]').val();
			        $('[name="anak_ke_update"]').val();
			        $('[name="hp_update"]').val();
			        $('[name="id_ortu_update"]').val();
			        $('[name="email_update"]').val();
	        		$(this).removeAttr('disabled');
					$('.loader').css('display', 'none');


		            $('#update-modal').modal('hide');
		            daftar_siswa();

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

	$('#btn-add-ortu').on('click', function () {
                
	    if ($('[name="nama_lengkap_ortu"]').val().length == 0){
	        $('[name="nama_lengkap_ortu"]').addClass('border-danger');
	        $('[name="nama_lengkap_ortu"]').focus();
	        return false;
	    }
	    if ($('[name="nik_orangtua"]').val().length == 0){
	        $('[name="nik_orangtua"]').addClass('border-danger');
	        $('[name="nik_orangtua"]').focus();
	        return false;
	    }
	    if ($('[name="username"]').val().length == 0){
	        $('[name="username"]').addClass('border-danger');
	        $('[name="username"]').focus();
	        return false;
	    }
	    if ($('[name="password"]').val().length == 0){
	        $('[name="password"]').addClass('border-danger');
	        $('[name="password"]').focus();
	        return false;
	    }

	    var formData = new FormData();
	    formData.append('nik_orangtua', $('[name="nik_orangtua"]').val()); 
	    formData.append('nama_lengkap_ortu', $('[name="nama_lengkap_ortu"]').val()); 
	    formData.append('jenis_kelamin_ortu', $('[name="jenis_kelamin_ortu"]').val()); 
	    formData.append('hp_ortu', $('[name="hp_ortu"]').val()); 
	    formData.append('email_ortu', $('[name="email_ortu"]').val()); 
	    formData.append('username', $('[name="username"]').val()); 
	    formData.append('password', $('[name="password"]').val()); 
	   
	    $.ajax({
	        url: '<?= base_url("admin/Master/save_ortu_siswa")?>',
	        type: 'POST',
	        dataType: 'JSON',
	        data: formData,
	        cache: false,
	        processData: false,
	        contentType: false,

	        success: function (data) {
	        	if (data.status == 'success') {
			        $('#add-modal-ortu').modal('hide');
			        daftar_ortu();
	        	}else{
	        		$('#add-modal-ortu').modal('hide');
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

	function daftar_ortu() {
		$.ajax ({
			url   : '<?= base_url("admin/Master/select_ortu")?>',
	        method:"POST",
	        async : false,
	        dataType:'json',
	        success : function(data){
	        	var ortu = '';
	        	var i;
	        	for (var i = 0; i < data.length; i++) {
	        		ortu += '<option value="'+data[i].id+'">'+data[i].nama_lengkap+'</option>';
	        	}
	        $('[name="id_ortu"]').html('<option></option>'+ortu+'<option value="lainnya">Lainnya</option>');	
	        $('[name="id_ortu_update"]').html('<option></option>'+ortu+'<option value="lainnya">Lainnya</option>');	
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