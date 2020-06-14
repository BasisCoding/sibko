<script type="text/javascript">
	$(document).ready(function() {
		daftar_kelas();
		daftar_jurusan();

		$("[name='id_jurusan']").select2({
			placeholder: 'Pilih Jurusan'
		}); 
		$("[name='id_jurusan_update']").select2({
			placeholder: 'Pilih Jurusan'
		});
		function daftar_kelas(query){
		    $.ajax({
		        url   : '<?= base_url("admin/Master/view_data_kelas")?>',
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
					                   '<th scope="row">'+data[i].tingkat+' '+data[i].kode_jurusan+'</th>'+
					                   '<td>'+data[i].nama_jurusan+'</td>'+
					                  
					                   '<td class="text-right">'+
					                      '<div class="dropdown">'+
					                        '<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
					                          '<i class="fas fa-ellipsis-v"></i>'+
					                        '</a>'+
					                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'+
					                          '<button class="dropdown-item update-kelas" data-id="'+data[i].id+'" data-tingkat="'+data[i].tingkat+'" data-jurusan="'+data[i].id_jurusan+'">Update</button>'+
					                          '<button class="dropdown-item delete-kelas">Delete</button>'+
					                       ' </div>' +
					                      '</div>'+
					                   '</td>'+
					                '</tr>'
						}
						$('#show_data_kelas').html(html);
		            }else{
						$('#show_data_kelas').html('<tr><td colspan="3" class="text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></td></tr>');
		            }
		        }
		    });
	    }

	    function daftar_jurusan() {
	    	$.ajax({
	    		url: '<?= base_url('admin/Master/select_jurusan') ?>',
	    		type: 'POST',
	    		dataType: 'JSON',
	    		success:function (data) {
	    			var kode_jurusan = '';
		        	var i;
		        	for (var i = 0; i < data.length; i++) {
		        		kode_jurusan += '<option value="'+data[i].id+'">'+data[i].nama_jurusan+'</option>';
		        	}
		        	$('[name="id_jurusan"]').html('<option></option>'+kode_jurusan);	
		        	$('[name="id_jurusan_update"]').html('<option></option>'+kode_jurusan);	
	    		}
	    	}); 	
	    }

	    $('#btn-add').on('click', function() {
	    	var tingkat = $('[name="tingkat"]').val();
	    	var id_jurusan = $('[name="id_jurusan"]').val();

	    	$.ajax({
	    		url: '<?= base_url('admin/Master/save_kelas') ?>',
	    		type: 'POST',
	    		dataType: 'JSON',
	    		data:{tingkat:tingkat, id_jurusan:id_jurusan},
	    		success:function (data) {
	    			if (data.status == 'success') {

			            $('[name="id_jurusan"]').val(''); 
			            $('[name="tingkat"]').val(''); 

			            $('#add-modal').modal('hide');
			            daftar_kelas();

		        	}else{
			            $('#add-modal').modal('hide');
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
	    });

	    $('#btn-update').on('click', function() {
	    	var id = $('[name="id"]').val();
	    	var tingkat = $('[name="tingkat_update"]').val();
	    	var id_jurusan = $('[name="id_jurusan_update"]').val();

	    	$.ajax({
	    		url: '<?= site_url('admin/Master/update_kelas') ?>',
	    		type: 'POST',
	    		dataType: 'JSON',
	    		data:{id:id, tingkat:tingkat, id_jurusan:id_jurusan},
	    		success:function (data) {
	    			if (data.status == 'success') {

			            $('[name="id"]').val(''); 
			            $('[name="id_jurusan_update"]').val(''); 
			            $('[name="tingkat_update"]').val(''); 

			            $('#update-modal').modal('hide');
			            daftar_kelas();

		        	}else{
			            $('#update-modal').modal('hide');
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
	    });

	    $('#show_data_kelas').on('click', '.update-kelas', function() {
	    	var id = $(this).attr('data-id');
	    	var tingkat = $(this).attr('data-tingkat');
	    	var kode_jurusan = $(this).attr('data-jurusan');

	    	$('[name="id"]').val(id);
	    	$('[name="tingkat_update"]').val(tingkat);

	    	$('#update-modal').modal('show');
	    });

	    $('#search').keyup(function(){
	        var search = $(this).val();
	        if(search != '') {
	            daftar_kelas(search);
	        } else {
	            daftar_kelas();
	        }
	    });
	});
</script>

</body>
</html>