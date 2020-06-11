<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?= base_url('assets/img/logoo.png') ?>" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <?php
              // data main menu
                $main_menu = $this->db->get_where('menus', 
                                          array('sub_menu' => 0, 'level' => $this->session->userdata('level')));
                foreach ($main_menu->result() as $main) {
                    // Query untuk mencari data sub menu
                    $sub_menu = $this->db->get_where('menus', 
                                          array('sub_menu' => $main->id, 'level' => $this->session->userdata('level')));
                    // periksa apakah ada sub menu
                  if ($sub_menu->num_rows() > 0) {?>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <i class=" text-primary"></i>
                        <span class="nav-link-text">Dashboard</span>
                      </a>
                      <ul aria-expanded="false" class="collapse first-level base-level-line">
                          
                          <?php foreach ($sub_menu->result() as $sub) {?>
                            <li class="sidebar-item">
                              <a href="<?= base_url($this->session->userdata('link')) ?>/<?= $sub->link ?>" class="sidebar-link">
                                <span class="hide-menu"> <?= $sub->nama_menu ?></span>
                              </a>
                            </li>
                          <?php } ?>
                          
                      </ul>
                    </li>
                  <?php } else { ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= base_url($this->session->userdata('link').'/'.$main->link) ?>">
                        <i class="<?= $main->icon .' '. $main->warna ?>"></i>
                        <span class="nav-link-text <?= $main->warna ?>"><?= $main->nama_menu ?></span>
                      </a>
                    </li> 
                  <?php }
                } ?>
            
          </ul>
          
        </div>
      </div>
    </div>
  </nav>