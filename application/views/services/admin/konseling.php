<script type="text/javascript">
	$(document).ready(function() {
		data_pelanggaran();
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
					                   '<td><button class="btn btn-danger btn-sm" data-id="'+data[i].id+'">-</button></td>'+
					                '</tr>'
						}
						$('#show_data_pelanggaran').html(html);
		            }else{
						$('#show_data_pelanggaran').html('<tr><td colspan="4" class="text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></td></tr>');
		            }
				}
			});
			
		}

		$('$btn-add-pelanggaran').submit(function() {
			var jenis_pelanggaran = $('[name="jenis_pelanggaran"]').val();
			var tingkat = $('[name="tingkat"]').val();
			var max_langgaran = $('[name="max_langgaran"]').val();

			$.ajax({
				url: '<?= base_url('admin/Master/save_pelanggaran') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {jenis_pelanggaran:jenis_pelanggaran, tingkat:tingkat, max_langgaran:max_langgaran},
				success:function (data) {
					if (data.status == 'success') {

			            $('[name="jenis_pelanggaran"]').val(''); 
			            $('[name="tingkat"]').val(''); 
			            $('[name="max_langgaran"]').val(''); 

			            $('#add-modal-pelanggaran').modal('hide');
			            data_pelanggaran();

		        	}else{
			            $('#add-modal-pelanggaran').modal('hide');
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
	});
</script>

</body>
</html>