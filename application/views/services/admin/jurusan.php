<script type="text/javascript">
	$(document).ready(function(){ 
		daftar_jurusan();
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
	    	
	    }
	});
</script>

</body>
</html>