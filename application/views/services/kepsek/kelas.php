<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		daftar_kelas();

		$('#table-kelas').DataTable({
			dom: 'Bfrt<"py-2"p>',
		    pagingType:'numbers',
	        buttons: [
	            {
	                extend:    'excel',
	                className: 'btn btn-sm',
	            },
	            {
	                extend:    'pdf',
	                className: 'btn btn-sm',

	            },
	            {
	                extend:    'print',
	                className: 'btn btn-sm',

	            }
	        ],

		});
		function daftar_kelas(query){
		    $.ajax({
		    	type:'ajax',
		        url   : '<?= base_url("admin/Master/view_data_kelas")?>',
		        dataType:'json',
		        async:false,
		        success : function(data){
		            var html = '';
	            	var i;
	                for (i = 0; i < data.length; i++) {

	                	html += '<tr>'+
				                   '<th scope="row">'+data[i].tingkat+' '+data[i].kode_jurusan+'</th>'+
				                   '<td>'+data[i].nama_jurusan+'</td>'+
				                   '<td>'+data[i].jumlah_siswa+'</td>'+
				                '</tr>'
					}
					$('#show_data_kelas').html(html);
		            
		        }
		    });
	    }

	});
</script>

</body>
</html>