<!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/js-cookie/js.cookie.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
  <!-- Argon JS -->
  <script src="<?= base_url('assets/js/argon.js?v=1.2.0') ?>"></script>

  <script type="text/javascript">
    get_notifikasi();
    function get_notifikasi() {
      $.ajax({
        url: '<?= base_url('admin/Dashboard/get_notifikasi') ?>',
        type: 'POST',
        dataType: 'JSON',
        success:function (data) {
          
            var base_url = '<?= base_url('assets/img/siswa/') ?>'
            var html = '';
            var i;
            if (data.length > 0) {
                for (i = 0; i < data.length; i++) {
                  var tgl = data[i].tanggal;
                  var n = tgl.slice(0,10).split('-').reverse().join('-');
                  html += '<a href="" class="list-group-item list-group-item-action">'+
                            '<div class="row align-items-center">'+
                              '<div class="col-auto"><img alt="Image placeholder" src="'+base_url+data[i].foto+'" class="avatar rounded-circle"></div>'+
                              '<div class="col ml--2">'+
                                '<div class="d-flex justify-content-between align-items-center">'+
                                  '<div><h4 class="mb-0 text-sm">'+data[i].nama_lengkap+'</h4></div>'+
                                  '<div class="text-right text-muted"><small>'+n+'</small></div>'+
                                '</div>'+
                                '<p class="text-sm mb-0">'+data[i].keterangan+'</p>'+
                              '</div>'+
                            '</div>'+
                          '</a>'
                }
                $('#notifikasi').html(html);
          }else{
                $('#notifikasi').html('<a href="" class="list-group-item list-group-item-action"><div class="row align-items-center">Data Tidak Ada</div></a>');
          }
        }
      });
    }

      $('#logout').click(function() {
        Swal.fire({
          title: 'Are you sure ?',
          text: "Apakah Anda Ingin Logout",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Logout!'
        }).then((result) => {
          if (result.value) {
            window.location.href = '<?= base_url('logout') ?>';
            Swal.fire(
              'Sukses!',
              'Anda Telah Logout',
              'success'
            )
          } 
        });
      });
    
  </script>