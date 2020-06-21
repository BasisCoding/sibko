<script type="text/javascript">
	$(document).ready(function() {
		daftar_kelas();
		daftar_jurusan();
		daftar_siswa();

		$("[name='id_jurusan']").select2({
			placeholder: 'Pilih Jurusan'
		}); 
		$("[name='id_jurusan_update']").select2({
			placeholder: 'Pilih Jurusan'
		});
		$("[name='siswa[]']").select2({
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
					                   '<td>'+data[i].jumlah_siswa+'</td>'+
					                '</tr>'
						}
						$('#show_data_kelas').html(html);
		            }else{
						$('#show_data_kelas').html('<tr><td colspan="3" class="text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></td></tr>');
		            }
		        }
		    });
	    }

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