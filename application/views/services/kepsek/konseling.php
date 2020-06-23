<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>


<script type="text/javascript">

$(document).ready(function(){ 

    daftar_konseling();
    $('#table-konseling').DataTable({
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
    //  -----------------------------------------------------------------------------
    //  |       AMBIL DATA KE DATABASE                                              |
    //  -----------------------------------------------------------------------------

    function daftar_konseling(){
	    $.ajax({
	    	type: 'ajax',
	        url   : '<?= base_url("kepsek/Master/view_pelanggar")?>',
	        async : false,
	        dataType:'json',
	        success : function(data){

	            var html = '';
	            var i;
                for (i = 0; i < data.length; i++) {
                	var tgl = data[i].tanggal;
                    var n = tgl.slice(0,10).split('-').reverse().join('-');

                	html += '<tr>'+
	                			'<td scope="row">'+data[i].nis+'</td>'+
			                	'<td scope="row">'+data[i].nama_lengkap+'</td>'+
			                	'<td scope="row">'+data[i].jenis_pelanggaran+'</td>'+
			                	'<td scope="row">'+n+'</td>'+
			                	'<td scope="row">'+data[i].keterangan+'</td>'+
			                	'<td scope="row">'+data[i].nama_guru+'</td>'+
			                	'<td scope="row">'+data[i].nama_ortu+'</td>'+
			                '</tr>';
				}
				$('#show_data_pelanggar').html(html);
	        }
	    });
    }

});
</script>

</body>
    
</html>