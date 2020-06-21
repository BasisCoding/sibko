    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-md">
          <div class="card">
            <!-- Card header -->
            <div class="card-header bg-transparent row align-items-center">
              <h3 class="mb-0 col-md-9">DAFTAR KELAS</h3>
              <div class="col-md-3 text-right">
                <input type="text" id="search" class="form-control form-control-sm" placeholder="Search ...">
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
