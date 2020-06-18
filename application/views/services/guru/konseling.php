<script type="text/javascript">
	$(document).ready(function() {

		$("[name='id_siswa']").select2({
			placeholder: 'Pilih Siswa'
		}); 
		$("[name='id_pelanggaran']").select2({
			placeholder: 'Pilih Pelanggaran'
		}); 

		data_pelanggar();
		daftar_pelanggaran();
		daftar_siswa();

		let current_datetime = new Date();
		let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate()

		function data_pelanggar() {
			$.ajax({
				url: '<?= base_url('guru/Master/view_pelanggar') ?>',
				type: 'POST',
				dataType: 'JSON',
				success:function (data) {
					var base_url = ''
		            var html = '';
		            var i;
		            if (data.length > 0) {
		                for (i = 0; i < data.length; i++) {
		                	var tgl = data[i].tanggal;
							var d = new Date(tgl);
							var n = d.toJSON().slice(0,10).split('-').reverse().join('-');

		                	html += '<tr>'+
					                   '<td>'+data[i].nis+'</td>'+
					                   '<td>'+data[i].nama_lengkap+'</td>'+
					                   '<td>'+data[i].jenis_pelanggaran+'</td>'+
					                   '<td>'+n+'</td>'+
					                   '<td>'+data[i].keterangan+'</td>'+
					                   '<td><button class="btn btn-danger btn-sm delete-pelanggar" data-id="'+data[i].id+'">-</button></td>'+
					                '</tr>'
						}
						$('#show_data_pelanggar').html(html);
		            }else{
						$('#show_data_pelanggar').html('<tr><td colspan="4" class="text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></td></tr>');
		            }
				}
			});	
		}

		function daftar_siswa() {
	    	$.ajax({
	    		url: '<?= base_url('guru/Master/select_siswa') ?>',
	    		type: 'POST',
	    		dataType: 'JSON',
	    		success:function (data) {
	    			var siswa = '';
		        	var i;
		        	for (var i = 0; i < data.length; i++) {
		        		siswa += '<option value="'+data[i].id+'">'+data[i].nama_lengkap+'</option>';
		        	}
		        	$('[name="id_siswa"]').html('<option></option>'+siswa);	
	    		}
	    	}); 	
	    }

	    function daftar_pelanggaran() {
	    	$.ajax({
	    		url: '<?= base_url('guru/Master/select_pelanggaran') ?>',
	    		type: 'POST',
	    		dataType: 'JSON',
	    		success:function (data) {
	    			var pelanggaran = '';
		        	var i;
		        	for (var i = 0; i < data.length; i++) {
		        		pelanggaran += '<option value="'+data[i].id+'">'+data[i].jenis_pelanggaran+'</option>';
		        	}
		        	$('[name="id_pelanggaran"]').html('<option></option>'+pelanggaran);	
	    		}
	    	}); 	
	    }

		$('#btn-add-pelanggar').on('click', function() {
			var id_siswa = $('[name="id_siswa"]').val();
			var id_pelanggaran = $('[name="id_pelanggaran"]').val();
			var tanggal = $('[name="tanggal"]').val();
			var keterangan = $('[name="keterangan"]').val();

	    	$('.loader').css('display', 'inline-block');
	    	$(this).attr('disabled');
			$.ajax({
				url: '<?= base_url('guru/Master/tambah_pelanggar') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {id_siswa:id_siswa, id_pelanggaran:id_pelanggaran, tanggal:tanggal, keterangan:keterangan},
				success:function (data) {
					if (data.status == 'success') {

			            $('[name="id_siswa"]').val('');
						$('[name="id_pelanggaran"]').val('');
						$('[name="tanggal"]').val('');
						$('[name="keterangan"]').val('');

			            $('#add-modal-pelanggar').modal('hide');
			            $(this).removeAttr('disabled');
						$('.loader').css('display', 'none');
			            data_pelangga();

		        	}else{
			            $('#add-modal-pelanggar').modal('hide');
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
		});

		$('#show_data_pelanggar').on('click', '.delete-pelanggar', function() {
			var id = $(this).attr('data-id');
			
			Swal.fire({
			  title: 'Are you sure ?',
			  text: "Jangan Hapus Jika Siswa Masih Bermasalah !!!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
				$.ajax({
			        url   : '<?= base_url("guru/Master/delete_pelanggar")?>',
			        method:"POST",
			        async : false,
			        dataType:'json',
			        data:{id:id},
			        success : function(data){
					  if (result.value) {
					    Swal.fire(
					      'Terhapus!',
					      'Data Anda Sudah Terhapus.',
					      'success'
					    )
					    daftar_pelanggar();
					  }
			        }

			   	});
			});
		});
	});
</script>

</body>
</html>