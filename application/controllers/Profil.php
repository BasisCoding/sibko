<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  


  class Profil extends CI_Controller {
  
    public function index()
    {
      $this->load->view('_partials/head');
      $this->load->view('_partials/navbar');
      $this->load->view('_partials/header');
      $this->load->view('profil');
      $this->load->view('_partials/footer');
      $this->load->view('_partials/plugin');
      $this->load->view('services/profil');
    } 
  }
  
  /* End of file Login.php */
  /* Location: ./application/controllers/Login.php */
 ?>