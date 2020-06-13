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
		                	var tgl = data[i].tanggal_lahir;
							var d = new Date(tgl);
							var n = d.toJSON().slice(0,10).split('-').reverse().join('-');

		                	html += '<div class="col-lg-3 order-lg-2">' +
					                  '<div class="card card-profile">' +
					                    '<img src="<?= base_url('assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">' +
					                    '<div class="row justify-content-center">' +
					                      '<div class="col-lg-3 order-lg-2">' +
					                        '<div class="card-profile-image"><a href="#"><img src="<?= base_url("assets/img/siswa/") ?>'+data[i].foto+'" class="rounded-circle"></a></div>' +
					                      '</div>' +
					                    '</div>' +
					                    '<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">' +
					                      '<div class="d-flex justify-content-between">' +
					                        '<button data-nis="'+data[i].nis+'" data-nama_lengkap="'+data[i].nama_lengkap+'" data-tempat_lahir="'+data[i].tempat_lahir+'" data-tanggal_lahir="'+data[i].tanggal_lahir+'" data-jenis_kelamin="'+data[i].jenis_kelamin+'" data-agama="'+data[i].agama+'" data-alamat="'+data[i].alamat+'" data-anak_ke="'+data[i].anak_ke+'" data-id_ortu="'+data[i].id_ortu+'" data-foto="'+data[i].foto+'" data-hp="'+data[i].hp+'" data-email="'+data[i].email+'" class="btn btn-sm btn-info mr-4 update_siswa">Update</button>' +
					                        '<button data-nis="'+data[i].nis+'" class="btn btn-sm btn-danger float-right delete_siswa">Delete</button>' +
					                      '</div>' +
					                    '</div>' +
					                    '<div class="card-body pt-0">' +
					                      '<div class="text-center">' +
					                        '<h5 class="h3">'+data[i].nis+'<span class="font-weight-light"></span></h5>' +
					                        '<h5 class="h3">'+data[i].nama_lengkap+'<span class="font-weight-light"></span></h5>' +
					                        '<div class="h5 font-weight-300"><i class="ni location_pin mr-2"></i>'+data[i].tempat_lahir+', '+n+'</div>' +
					                        '<div class="h5 mt-2"><i class="ni business_briefcase-24 mr-2"></i>'+data[i].jenis_kelamin+'</div>' +
					                        '<div><i class="ni education_hat mr-2"></i>'+data[i].nama_ortu+'</div>' +
					                      '</div>' +
					                    '</div>' +
					                    '<div class="d-flex justify-content-between mt-2">' +
					                      '<button type="button" class="btn btn-sm btn-success"><i class="ni ni-send"></i> Lihat Alamat</button>' +
					                      '<button type="button" class="btn btn-sm btn-dark"><i class="ni ni-send"></i>Lihat Detail</button>' +
					                    '</div>' +
					                  '</div>' +
					                '</div>'
						}
						$('#show_data_siswa').html(html);
		            }else{
						$('#show_data_siswa').html('<div class="col-12 text-center"><span class="badge badge-pill badge-lg badge-success">Data Tidak Di Temukan</span></div>');
		            }
		        }

		    });
	    }
	}
</script>

</body>
</html>