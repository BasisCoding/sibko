<script>

	$("[name='kajur']").select2({
		placeholder: 'Pilih Kepala Jurusan'
	}); 
	$("[name='kajur_update']").select2({
		placeholder: 'Pilih Kepala Jurusan'
	}); 
	$(document).ready(function(){ 

		daftar_jurusan();
		daftar_guru();

		function daftar_jurusan(query){
		    $.ajax({
		        url   : '<?= base_url("admin/Master/view_data_jurusan")?>',
		        method:"POST",
		        dataType:'json',
		        data:{query:query},
		        success : function(data){

		        	var base_url = ''
		            var html = '';
		            var i;
		            if (data.length > 0) {
		                for (i = 0; i < data.length; i++) {

		                	html += '<tr>'+
					                    '<th scope="row">'+
					                      '<div class="media align-items-center">'+
					                       	'<a href="#" class="avatar rounded-circle mr-3">'+
					                          '<img alt="Image placeholder" src="<?= base_url('assets/img/logo-jurusan/') ?>'+data[i].logo+'">'+
					                       	'</a>'+
					                        '<div class="media-body">'+
					                          '<span class="name mb-0 text-sm">'+data[i].nama_jurusan+'</span>'+
					                        '</div>'+
					                      '</div>'+
					                   '</th>'+
					                   '<td>'+data[i].kode_jurusan+'</td>'+
					                   '<td>'+data[i].semester+'</td>'+
					                   '<td>'+data[i].nama_lengkap+'</td>'+
					                   '<td class="text-right">'+
					                      '<div class="dropdown">'+
					                        '<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
					                          '<i class="fas fa-ellipsis-v"></i>'+
					                        '</a>'+
					                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'+
					                          '<button class="dropdown-item update-jurusan" data-id="'+data[i].id+'" data-kode_jurusan="'+data[i].kode_jurusan+'" data-nama_jurusan="'+data[i].nama_jurusan+'" data-kajur="'+data[i].kepala_jurusan+'" data-nama_kajur="'+data[i].nama_lengkap+'" data-semester="'+data[i].semester+'" data-logo="'+data[i].logo+'">Update</button>'+
					                          '<button class="dropdown-item delete-jurusan" data-id="'+data[i].id+'">Delete</button>'+
					                       ' </div>'+
					                      '</div>'+
					                   '</td>'+
					                '</tr>'
						}
						$('#show_data_jurusan').html(html);
		            }else{
						$('#show_data_jurusan').html('<tr><td colspan="4" class="text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></td></tr>');
		            }
		        }
		    });
	    }

	    function daftar_guru(id, nama_kajur) {
	    	$.ajax ({
				url   : '<?= base_url("admin/Master/select_guru")?>',
		        method:"POST",
		        dataType:'JSON',
		        success : function(data){
		        	var kajur = '';
		        	var i;
		        	for (var i = 0; i < data.length; i++) {
		        		kajur += '<option value="'+data[i].id+'">'+data[i].nama_lengkap+'</option>';
		        	}
	        	$('[name="kajur"]').html('<option></option>'+kajur);	
		        	if (id>0) {
		        		$('[name="kajur_update"]').html('<option value="'+id+'">'+nama_kajur+'</option>'+kajur);
		        	}else {

		        		$('[name="kajur_update"]').html('<option></option>'+kajur);
			        }
	        	}
			});
	    }

	    $('#add-data-jurusan').on('click', function () {
	    	$('#add-modal-jurusan').modal('show');
	    });

	    $('#btn-add-jurusan').on('click', function () {
	                
		    if ($('[name="kode_jurusan"]').val().length == 0){
		        $('[name="kode_jurusan"]').addClass('border-danger');
		        $('[name="kode_jurusan"]').focus();
		        return false;
		    }
		    if ($('[name="nama_jurusan"]').val().length == 0){
		        $('[name="nama_jurusan"]').addClass('border-danger');
		        $('[name="nama_jurusan"]').focus();
		        return false;
		    }
		    if ($('[name="semester"]').val().length == 0){
		        $('[name="semester"]').addClass('border-danger');
		        $('[name="semester"]').focus();
		        return false;
		    }
		    if ($('[name="kajur"]').val().length == 0){
		        $('[name="kajur"]').addClass('border-danger');
		        $('[name="kajur"]').focus();
		        return false;
		    }

		    var formJurusan = new FormData();
		    formJurusan.append('kode_jurusan', $('[name="kode_jurusan"]').val()); 
		    formJurusan.append('nama_jurusan', $('[name="nama_jurusan"]').val()); 
		    formJurusan.append('semester', $('[name="semester"]').val()); 
		    formJurusan.append('kajur', $('[name="kajur"]').val()); 
	    	formJurusan.append('logo', $('[name="logo"]')[0].files[0]);
		   
	    	$('.loader').css('display', 'inline-block');
	    	$(this).attr('disabled');
		    $.ajax({
		        url: '<?= base_url("admin/Master/save_jurusan")?>',
		        type: 'POST',
		        dataType: 'JSON',
		        data: formJurusan,
		        cache: true,
		        processData: false,
		        contentType: false,

		        success: function (data) {

		        	if (data.status == 'success') {

			            $('[name="kode_jurusan"]').val(''); 
			            $('[name="nama_jurusan"]').val(''); 
			            $('[name="semester"]').val(''); 
			            $('[name="kajur"]').val(''); 
			            $('[name="logo"]').val(''); 
		        		$(this).removeAttr('disabled');
						$('.loader').css('display', 'none');

			            $('#add-modal-jurusan').modal('hide');
			            daftar_jurusan();

		        	}else{
			            $('#add-modal-jurusan').modal('hide');
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

	    $('#show_data_jurusan').on('click','.update-jurusan',function(){
	        var id=$(this).attr('data-id');
	        var kode_jurusan=$(this).attr('data-kode_jurusan');
	        var nama_jurusan=$(this).attr('data-nama_jurusan');
	        var kajur=$(this).attr('data-kajur');
	        var nama_kajur=$(this).attr('data-nama_kajur');
	        var semester=$(this).attr('data-semester');
	        var logo=$(this).attr('data-logo');

	        $('[name="id"]').val(id);
	        $('[name="nama_jurusan_update"]').val(nama_jurusan);
	        $('[name="kode_jurusan_update"]').val(kode_jurusan);
	        $('[name="semester_update"]').val(semester);
	        $('[name="logo_lama"]').val(logo);

	        $('#update-modal-jurusan').modal('show');
	        daftar_guru(kajur, nama_kajur);
	    });

	    $('#show_data_jurusan').on('click','.delete-jurusan',function(){
        var id=$(this).attr('data-id');

    	Swal.fire({
		  title: 'Are you sure ?',
		  text: "Jika Anda Menghapus Jurusan Maka Kelas dan Siswa Tidak ada Data Jurusan",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
			        url   : '<?= base_url("admin/Master/delete_jurusan")?>',
			        method:"POST",
			        async : false,
			        dataType:'json',
			        data:{id:id},
			        success : function(data){
					    Swal.fire(
					      'Terhapus!',
					      'Data Anda Sudah Terhapus.',
					      'success'
					    )
					    daftar_jurusan();
					  }

		   		});
		    }
		});
    });

	    $('#btn-update-jurusan').on('click', function () {
                
		    if ($('[name="kode_jurusan_update"]').val().length == 0){
		        $('[name="kode_jurusan_update"]').addClass('border-danger');
		        $('[name="kode_jurusan_update"]').focus();
		        return false;
		    }
		    if ($('[name="nama_jurusan_update"]').val().length == 0){
		        $('[name="nama_jurusan_update"]').addClass('border-danger');
		        $('[name="nama_jurusan_update"]').focus();
		        return false;
		    }
		    if ($('[name="semester_update"]').val().length == 0){
		        $('[name="semester_update"]').addClass('border-danger');
		        $('[name="semester_update"]').focus();
		        return false;
		    }
		    if ($('[name="semester_update"]').val().length == 0){
		        $('[name="semester_update"]').addClass('border-danger');
		        $('[name="semester_update"]').focus();
		        return false;
		    }

		    var formData = new FormData();

		    formData.append('id', $('[name="id"]').val()); 
		    formData.append('kode_jurusan', $('[name="kode_jurusan_update"]').val()); 
		    formData.append('nama_jurusan', $('[name="nama_jurusan_update"]').val()); 
		    formData.append('semester', $('[name="semester_update"]').val()); 
		    formData.append('kajur', $('[name="kajur_update"]').val()); 
		    formData.append('logo_lama', $('[name="logo_lama"]').val()); 
	    	formData.append('logo', $('[name="logo_update"]')[0].files[0]);
		   
	    	$('.loader').css('display', 'inline-block');
	    	$(this).attr('disabled');
		    $.ajax({
		        url: '<?= site_url("admin/Master/update_jurusan")?>',
		        type: 'POST',
		        dataType: 'JSON',
		        data: formData,
		        cache: false,
		        processData: false,
		        contentType: false,

		        success: function (data) {
		        	if (data.status == 'success') {

			            $('[name="kode_jurusan_update"]').val(''); 
			            $('[name="nama_jurusan_update"]').val(''); 
			            $('[name="semester_update"]').val(''); 
			            $('[name="kajur_update"]').val(''); 
			            $('[name="logo_update"]').val(''); 
			            $('[name="logo_lama"]').val(''); 
		        		$(this).removeAttr('disabled');
						$('.loader').css('display', 'none');

			            $('#update-modal-jurusan').modal('hide');
			            daftar_jurusan();
		        	}else{
			            $('#update-modal-jurusan').modal('hide');
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

	    $('#search').keyup(function(){
	        var search = $(this).val();
	        if(search != '') {
	            daftar_jurusan(search);
	        } else {
	            daftar_jurusan();
	        }
	    });
	});
</script>

</body>
</html>