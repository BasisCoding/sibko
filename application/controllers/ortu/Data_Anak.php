<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_Anak extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}

	// Controller Data Siswa
		public function index()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('ortu/anak');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/ortu/anak');
		}

		public function view_data_anak()
		{
			$id = $this->session->userdata('id');
			$data = $this->MasterModel->get_ortu($id)->result();
			echo json_encode($data);
		}

		public function konseling()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('ortu/konseling');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/ortu/konseling');
		}

		public function data_konseling()
		{
			$id = $this->session->userdata('id');
			$data = $this->MasterModel->view_data_konseling($id);
			echo json_encode($data);
		}
	
	}
	
	/* End of file Data_Anak.php */
	/* Location: ./application/controllers/ortu/Data_Anak.php */
 ?>