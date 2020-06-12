
<script type="text/javascript">
$(document).ready(function(){ 
	$(".select").select2({
		placeholder: 'Pilih Salah Satu'
	}); 
	let current_datetime = new Date()
	let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate()

    daftar_siswa();
    daftar_ortu();

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
		            $("#alert-success-text").html('Data Berhasil di Tambahkan');
		            $("#alert-success").fadeIn().delay(2000).fadeOut();
		            daftar_siswa();

	        	}else{
		            $('#add-modal').modal('hide');
	        		$(this).removeAttr('disabled');
					$('.loader').css('display', 'none');
	        	}
	            let timerInterval
	              Swal.fire({
	                title: data.status,
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
	    formData.append('nama_lengkap_ortu', $('[name="nama_lengkap_ortu"]').val()); 
	    formData.append('jenis_kelamin_ortu', $('[name="jenis_kelamin_ortu"]').val()); 
	    formData.append('hp_ortu', $('[name="hp_ortu"]').val()); 
	    formData.append('email_ortu', $('[name="email_ortu"]').val()); 
	    formData.append('username', $('[name="username"]').val()); 
	    formData.append('password', $('[name="password"]').val()); 
	   
	    $.ajax({
	        url: '<?= base_url("admin/Master/save_ortu")?>',
	        type: 'POST',
	        dataType: 'JSON',
	        data: formData,
	        cache: false,
	        processData: false,
	        contentType: false,

	        success: function (data) {
		        $('#add-modal-ortu').modal('hide');
		        daftar_ortu();
	        }
	    });
	    return false;
	});

	function daftar_ortu() {
		$.ajax ({
			url   : '<?= base_url("admin/Master/daftar_ortu")?>',
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