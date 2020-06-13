<script type="text/javascript">
	$(document).ready(function(){ 
		$("[name='kajur']").select2({
			placeholder: 'Pilih Kepala Jurusan'
		}); 
		daftar_jurusan();
		daftar_guru();

		function daftar_jurusan(query){
		    $.ajax({
		        url   : '<?= base_url("admin/Master/view_data_jurusan")?>',
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

		                	html += '<tr>'+
					                    '<th scope="row">'+
					                      '<div class="media align-items-center">'+
					                       ' <a href="#" class="avatar rounded-circle mr-3">'+
					                          '<img alt="Image placeholder" src="<?= base_url('assets/img/logo-jurusan/') ?>'+data[i].logo+'">'+
					                       ' </a>'+
					                        '<div class="media-body">'+
					                          '<span class="name mb-0 text-sm">'+data[i].nama_jurusan+'</span>'+
					                        '</div>'+
					                      '</div>'+
					                   '</th>'+
					                   '<td>'+data[i].kode_jurusan+'</td>'+
					                   '<td>'+data[i].semester+'</td>'+
					                   '<td class="text-right">'+
					                      '<div class="dropdown">'+
					                        '<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
					                          '<i class="fas fa-ellipsis-v"></i>'+
					                        '</a>'+
					                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'+
					                          '<a class="dropdown-item" href="#">Update</a>'+
					                          '<a class="dropdown-item" href="#">Delete</a>'+
					                       ' </div>'+
					                      '</div>'+
					                    '</td>'+
					                  '</tr>'
						}
						$('#show_data_jurusan').html(html);
		            }else{
						$('#show_data_jurusan').html('<div class="col-12 text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></div>');
		            }
		        }
		    });
	    }

	    function daftar_guru() {
	    	$.ajax ({
				url   : '<?= base_url("admin/Master/select_guru")?>',
		        method:"POST",
		        async : false,
		        dataType:'json',
		        success : function(data){
		        	var kajur = '';
		        	var i;
		        	for (var i = 0; i < data.length; i++) {
		        		kajur += '<option value="'+data[i].id+'">'+data[i].nama_lengkap+'</option>';
		        	}
	        	$('[name="kajur"]').html('<option></option>'+kajur+'<option value="lainnya">Lainnya</option>');	
		        }
			});
	    }

	    $('#btn-add').on('click', function () {
	                
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

		    var formData = new FormData();
		    formData.append('kode_jurusan', $('[name="kode_jurusan"]').val()); 
		    formData.append('nama_jurusan', $('[name="nama_jurusan"]').val()); 
		    formData.append('semester', $('[name="semester"]').val()); 
		    formData.append('kajur', $('[name="kajur"]').val()); 
	    	formData.append('foto', $('[name="foto"]')[0].files[0]);
		   
	    	$('.loader').css('display', 'inline-block');
	    	$(this).attr('disabled');
		    $.ajax({
		        url: '<?= base_url("admin/Master/save_jurusan")?>',
		        type: 'POST',
		        dataType: 'JSON',
		        data: formData,
		        cache: false,
		        processData: false,
		        contentType: false,

		        success: function (data) {
		        	if (data.status == 'success') {

			            $('[name="kode_jurusan"]').val(''); 
			            $('[name="nama_jurusan"]').val(''); 
			            $('[name="semester"]').val(''); 
			            $('[name="kajur"]').val(''); 
			            $('[name="foto"]').val(''); 
		        		$(this).removeAttr('disabled');
						$('.loader').css('display', 'none');


			            $('#add-modal').modal('hide');
			            daftar_jurusan();

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
	});
</script>

</body>
</html>