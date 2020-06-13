<div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">DAFTAR JURUSAN</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">NAMA JURUSAN</th>
                    <th scope="col">KODE JURUSAN</th>
                    <th scope="col">SEMESTER</th>
                    <th scope="col"></th>
                    
                  </tr>
                </thead>
                <tbody id="show_data_jurusan">
                                    
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title-default">Tambah Data Jurusan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-body">
                  <form id="form-tambah" method="POST">
                    
                    <div class="row my-1">
                      <div class="col-md">
                        <input type="text" name="kode_jurusan" placeholder="Kode Jurusan" class="form-control form-control-sm mb-1">
                      </div>
                      <div class="col-md">
                        <input type="text" name="nama_jurusan" placeholder="Nama Jurusan" class="form-control form-control-sm mb-1">
                      </div>
                    </div>

                    <div class="row my-1">
                      <div class="col-md">
                        <input type="text" name="semester" placeholder="Semester" class="form-control form-control-sm mb-1">
                      </div>
                      <div class="col-md mb-1">
                        <select class="form-control form-control-sm select" name="kepala_jurusan">

                        </select>
                      </div>
                    </div>
      
                </div>
                
                <div class="modal-footer">
                    <button type="submit" id="btn-add" class="btn btn-sm btn-success"><i class="fa fa-spinner fa-spin loader" style="display: none"></i> Save</button>
                </div>
                  </form>
                
            </div>
        </div>
      </div>