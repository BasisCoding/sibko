<script type="text/javascript">
	$(document).ready(function() {
		data_pelanggaran();
		data_pelanggar();
		function data_pelanggaran() {
			$.ajax({
				url: '<?= base_url('admin/Master/view_pelanggaran') ?>',
				type: 'POST',
				dataType: 'JSON',
				success:function (data) {
					var base_url = ''
		            var html = '';
		            var i;
		            if (data.length > 0) {
		                for (i = 0; i < data.length; i++) {

		                	html += '<tr>'+
					                   '<td>'+data[i].jenis_pelanggaran+'</td>'+
					                   '<td>'+data[i].tingkatan+'</td>'+
					                   '<td>'+data[i].max_langgaran+'</td>'+
					                   '<td><button class="btn btn-danger btn-sm delete-pelanggaran" data-id="'+data[i].id+'">-</button></td>'+
					                '</tr>'
						}
						$('#show_data_pelanggaran').html(html);
		            }else{
						$('#show_data_pelanggaran').html('<tr><td colspan="4" class="text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></td></tr>');
		            }
				}
			});	
		}

		function data_pelanggar() {
			$.ajax({
				url: '<?= base_url('admin/Master/view_pelanggar') ?>',
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
					                '</tr>'
						}
						$('#show_data_pelanggar').html(html);
		            }else{
						$('#show_data_pelanggar').html('<tr><td colspan="6" class="text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></td></tr>');
		            }
				}
			});	
		}

		$('#btn-add-pelanggaran').on('click', function() {
			var jenis_pelanggaran = $('[name="jenis_pelanggaran"]').val();
			var tingkat = $('[name="tingkat"]').val();
			var max_langgaran = $('[name="max_pelanggaran"]').val();

	    	$('.loader').css('display', 'inline-block');
	    	$(this).attr('disabled');
			$.ajax({
				url: '<?= base_url('admin/Master/save_pelanggaran') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {jenis_pelanggaran:jenis_pelanggaran, tingkat:tingkat, max_langgaran:max_langgaran},
				success:function (data) {
					if (data.status == 'success') {

			            $('[name="jenis_pelanggaran"]').val('');
			            $('[name="max_langgaran"]').val(''); 

			            $('#add-modal-pelanggaran').modal('hide');
			            $(this).removeAttr('disabled');
						$('.loader').css('display', 'none');
			            data_pelanggaran();

		        	}else{
			            $('#add-modal-pelanggaran').modal('hide');
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

		$('#show_data_pelanggaran').on('click', '.delete-pelanggaran', function() {
			var id = $(this).attr('data-id');
			
			Swal.fire({
			  title: 'Are you sure ?',
			  text: "Jika Anda Hapus Maka Siswa Yang Mempunyai Masalah ini akan terhapus",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
				if (result.value) {
					$.ajax({
				        url   : '<?= base_url("admin/Master/delete_pelanggaran")?>',
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
						    daftar_kelas();
						  }

				   	});
				}
			});
			
		});
	});
</script>

</body>
</html>