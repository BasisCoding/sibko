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
			$q = '';
			$data['pelanggar'] = $this->MasterModel->get_chart();
			$data['siswa'] = $this->MasterModel->data_siswa($q)[0]->total_siswa;
			$data['kelas'] = $this->MasterModel->data_kelas($q)[0]->total_kelas;
			$data['ortu'] = $this->MasterModel->data_ortu($q)[0]->total_ortu;
			$data['guru'] = $this->MasterModel->data_guru($q)[0]->total_guru;
			$data['siswa_pelanggar'] = $this->MasterModel->view_pelanggar($q)[0]->total_pelanggar;
			echo json_encode($data);
		}
	}

	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
 ?>