<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-md">
      <div class="card">
        <!-- Card header -->
        <div class="card-header bg-transparent row align-items-center">
          <h3 class="mb-0 col-md">SISWA YANG MELANGGAR</h3>
          <button class="form-control form-control-sm col-1" data-target="#add-modal-pelanggar" data-toggle="modal">New</button>
          <div class="col-md-3 text-right">
            
            <input type="text" id="search" class="form-control form-control-sm" placeholder="Search ...">
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">NIS</th>
                <th scope="col">NAMA SISWA</th>
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
  
  <div class="modal fade" id="add-modal-pelanggar" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Tambah Data Pelanggar</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
              <form id="form-tambah-pelanggar" method="POST">
                
                <div class="row mb-1">
                  <div class="col">
                    <select class="form-control form-control-sm" name="id_siswa">
                    </select>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col"> 
                    <select class="form-control form-control-sm mb-1" name="id_pelanggaran">
                    </select>
                  </div>
                </div>


                <input type="date" name="tanggal" class="form-control form-control-sm mb-1">

                <textarea class="form-control mb-2" name="keterangan" placeholder="Keterangan"></textarea>


                <div class="row">
                  <div class="col-md text-right">
                    <button type="button" id="btn-add-pelanggar" class="btn btn-sm btn-success"><i class="fa fa-spinner fa-spin loader" style="display: none"></i> Save</button>
                  </div>
                </div>
              </form>
            </div>
            
            
        </div>
    </div>
  </div>
