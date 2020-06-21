    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-md">
          <div class="card">
            <!-- Card header -->
            <div class="card-header bg-transparent row align-items-center">
              <h3 class="mb-0 col-md-3">DAFTAR KELAS</h3>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md d-flex my-1 my-md-0">
                    <button class="form-control form-control-sm col-2" id="add-data-jurusan" data-target="#add-modal" data-toggle="modal">New</button>
                  </div>
                  
                 <!--  <div class="col-md-4 text-right">
                    <input type="text" id="search" class="form-control form-control-sm" placeholder="Search ...">
                  </div> -->
                </div>
              </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">NAMA KELAS</th>
                    <th scope="col">JURUSAN</th>
                    <th scope="col">JUMLAH SISWA</th>
                    <th scope="col"></th>
                    
                  </tr>
                </thead>
                <tbody id="show_data_kelas">        
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
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title-default">Tambah Data Kelas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-body">
                  <form id="form-tambah" method="POST">

                        <input type="number" name="tingkat" placeholder="Tingkat" class="form-control form-control-sm mb-1">
                      
                        <select class="form-control form-control-sm select" name="id_jurusan">
                          <option></option>
                        </select>

                    <div class="row my-1">
                      <div class="col-md text-right">
                        <button type="submit" id="btn-add" class="btn btn-sm btn-success"><i class="fa fa-spinner fa-spin loader" style="display: none"></i> Save</button>
                      </div>
                    </div>
                  </form>
                </div>
                
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title-default">Update Data Kelas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <input type="text" name="id" hidden>
                    <input type="number" name="tingkat_update" placeholder="Tingkat" class="form-control form-control-sm mb-1">
                  
                    <select class="form-control form-control-sm select" name="id_jurusan_update">
                    </select>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" id="btn-update" class="btn btn-sm btn-success"><i class="fa fa-spinner fa-spin loader" style="display: none"></i> Save</button>
                </div>
            </div>
        </div>
      </div>

      <div class="modal fade" id="lihat-siswa-modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md">
                      <div class="card">
                        <!-- Card header -->
                        <div class="card-header bg-transparent row align-items-center">
                          <h3 class="mb-0">Siswa Kelas <span class="nama_kelas"></span></h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                          <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">NIS</th>
                                <th scope="col">NAMA SISWA</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody id="show_data_siswa_kelas">        
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-md">
                      <div class="card">
                        <!-- Card header -->
                        <div class="card-header bg-transparent row align-items-center">
                          <h3 class="mb-0">Tambah Data Siswa Ke Kelas</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                          <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">NIS</th>
                                <th scope="col">NAMA SISWA</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <input type="hidden" id="id_kelas">
                            <tbody id="show_data_siswa">        
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

            </div>
        </div>
      </div>