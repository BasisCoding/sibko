<script type="text/javascript">
	$(document).ready(function() {

		data_pelanggar();

		function data_pelanggar() {
			$.ajax({
				url: '<?= base_url('ortu/Data_Anak/data_konseling') ?>',
				type: 'POST',
				dataType: 'JSON',
				success:function (data) {
					var base_url = ''
		            var html = '';
		            var i;
		            if (data.length > 0) {
		                for (i = 0; i < data.length; i++) {
		                	var tgl = data[i].tanggal_lahir;
							var n = tgl.slice(0,10).split('-').reverse().join('-');

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
						$('#show_data_pelanggar').html('<tr><td colspan="5" class="text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></td></tr>');
		            }
				}
			});	
		}

	});
</script>

</body>
</html>