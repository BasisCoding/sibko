<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	

	class Dashboard extends CI_Controller {
	
		public function __construct()
  	{
  		parent::__construct();
  		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('ortu/login'));
		}
  	}


		public function index()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('admin/dashboard');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/dashboard');
		}	
	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
 ?>