<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	

	class Master extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}

		public function data_siswa()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('admin/siswa');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/siswa');
		}

		public function view_data_siswa()
		{
			$query = '';

			if($this->input->post('query'))
		  	{
		   		$query = $this->input->post('query');
		  	}
			$data = $this->MasterModel->data_siswa($query);
			echo json_encode($data);
		}

		public function data_jurusan()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('admin/jurusan');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/jurusan');
		}

		public function data_kelas()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('admin/kelas');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/kelas');
		}	

		public function data_ortu()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('admin/ortu');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/ortu');
		}

		public function data_pelanggaran()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('admin/pelanggaran');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/pelanggaran');
		}


		public function data_konseling()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('admin/konseling');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/konseling');
		}

		public function data_users()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('admin/users');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/users');
		}

		public function data_guru()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('admin/guru');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/admin/guru');
		}
	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
 ?>