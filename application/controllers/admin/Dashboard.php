<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	

	class Dashboard extends CI_Controller {
	
		public function __construct()
	  	{
	  		parent::__construct();
	  		if ($this->session->userdata('status') != 'login') {
				redirect(base_url('admin/login'));
			}

			$this->load->model('MasterModel');
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

		public function get_jumlah()
		{
			$data['pelanggar'] = $this->MasterModel->get_chart();
			$data['siswa'] = $this->MasterModel->total_data()[0]->total_siswa;
			$data['kelas'] = $this->MasterModel->total_data()[0]->total_kelas;
			$data['guru'] = $this->MasterModel->total_data()[0]->total_guru;
			$data['siswa_pelanggar'] = $this->MasterModel->total_data()[0]->total_pelanggar;
			echo json_encode($data);
		}
	}

	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
 ?>