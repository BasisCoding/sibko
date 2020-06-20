<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <!-- Card header -->
        <div class="card-header bg-transparent row align-items-center">
          <h3 class="mb-0 col-md">DAFTAR PELANGGARAN</h3>
          <button class="form-control form-control-sm col-2" id="add-data-jurusan" data-target="#add-modal-pelanggaran" data-toggle="modal">New</button>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-sm table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">JENIS PELANGGARAN</th>
                <th scope="col">TINGKAT</th>
                <th scope="col">MAKSIMAL</th>
                <th></th>
                
              </tr>
            </thead>
            <tbody id="show_data_pelanggaran">
            </tbody>
          </table>
        </div>
        
      </div>
    </div>

    <div class="col-md-7">
      <div class="card">
        <!-- Card header -->
        <div class="card-header bg-transparent row align-items-center">
          <h3 class="mb-0 col-md">SISWA YANG MELANGGAR</h3>
          
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">NIS</th>
                <th scope="col">NAMA LENGKAP</th>
                <th scope="col">JENIS PELANGGARAN</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col"></th>
                
              </tr>
            </thead>
            <tbody id="show_data_pelanggar">
            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="add-modal-pelanggaran" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Tambah Data Pelanggaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
              <form id="form-tambah-pelanggaran" method="POST">
                
                <div class="row my-1">
                    <input type="text" name="jenis_pelanggaran" placeholder="Jenis Pelanggaran" class="form-control form-control-sm mb-1">
                    <select class="form-control form-control-sm mb-1" name="tingkat">
                      <option value="0">Tingkat Pelanggaran</option>
                      <option value="1">Sederhana</option>
                      <option value="2">Buruk</option>
                      <option value="3">Sangat Buruk</option>
                    </select>
                    <input type="number" name="max_pelanggaran" placeholder="Maksimal Siswa Melanggar" class="form-control form-control-sm mb-1">
                </div>

                <div class="row">
                  <div class="col-md text-right">
                    <button type="button" id="btn-add-pelanggaran" class="btn btn-sm btn-success"><i class="fa fa-spinner fa-spin loader" style="display: none"></i> Save</button>
                  </div>
                </div>
              </form>
            </div>
            
            
        </div>
    </div>
  </div>
