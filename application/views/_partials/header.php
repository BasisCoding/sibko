<!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <!-- <li class="nav-item dropdown"> -->
              <div>
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img title="<?= $this->session->userdata('nama_lengkap'); ?>" alt="<?= base_url('assets/img/'.$this->session->userdata('link').'/'.$this->session->userdata("foto")) ?>" src="<?= base_url('assets/img/'.$this->session->userdata('link').'/'.$this->session->userdata("foto")) ?>">
                  </span>
                  <!-- <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $this->session->userdata('nama_lengkap'); ?></span>
                  </div> -->
                </div>
              </a>
            </div>
              <div>
              <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" title="Notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">Pemberitahuan Siswa Bermasalah</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush" id="notifikasi">
                </div>
              </div>
            </li>
          </div>
            <li>
              <a class="nav-link" role="button" id="logout" title="Logout" style="cursor: pointer">
                  <i class="ni ni-user-run"></i>
              </a>
            </li>
              
              

            <!-- </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">
                <?php 
                  $link = '';
                  if ($this->uri->segment(2) != '') {
                    $link = $this->uri->segment(2);
                  }if ($this->uri->segment(3) != '') {
                    $link = $this->uri->segment(3);
                  }
                  echo ucfirst(str_replace('_', ' ', $link));
                ?>
              </h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links p-1 breadcrumb-dark">
                  <?php 
                    if ($this->uri->segment(2) != '') {
                      echo '<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>';
                    }if ($this->uri->segment(3) != '') {
                      echo '<li class="breadcrumb-item"><a href="#">'.ucfirst(str_replace('_', ' ', $this->uri->segment(3))).'</a></li>';
                    }if ($this->uri->segment(4) != '') {
                      echo '<li class="breadcrumb-item"><a href="#">'.ucfirst(str_replace('_', ' ', $this->uri->segment(4))).'</a></li>';
                    }
                  ?>
                </ol>
              </nav>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Page content -->