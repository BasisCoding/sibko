<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('LoginModel');
		}

		public function index()
		{
			$this->load->view('guru/login');
		}

		public function ceklogin()
		{
			$username = $this->input->post('username'); 
			$password = hash('sha512', $this->input->post('password') . config_item('encryption_key'));
			$table = 'guru';

			$cek = $this->LoginModel->data_login(
					array('username' => $username),
					array('password' => $password),
					$table
				);
			if ($cek != FALSE) {
				foreach ($cek as $ck) {
					$data_session = array(
					'username'		=> $username,
					'nama_lengkap' 	=> $ck->nama_lengkap,
					'id'			=> $ck->id,
					'level'			=> $ck->level,
					'foto'			=> $ck->foto,
					'email'			=> $ck->email,
					'nama_akses'	=> $ck->nama_akses,
					'link'			=> $ck->link,
					'status' 		=> "login"
					);
				
					$this->session->set_userdata($data_session);
				}
					$response = array(
						'status' => 'sukses',
						'message' => 'Anda Berhasil Login',
						'redirect' => base_url($this->session->userdata('link').'/Dashboard'),
						);
			}else{
				$response = array(
					'status' => 'gagal',
					'message' => 'Username Atau Password yang anda masukan salah !',
					'redirect' => base_url('guru/login')
					);
			}

			echo json_encode($response);
		}

	}
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
 ?>