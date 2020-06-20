<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Master extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}

	// Controller Data Siswa
		public function data_siswa()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('kepsek/siswa');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/kepsek/siswa');
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

		public function view_kelas_siswa()
		{
			$id_kelas = $this->input->post('id');
			$data = $this->MasterModel->siswa_kelas($id_kelas);
			echo json_encode($data);
		}

		public function select_siswa()
		{
			$data = $this->MasterModel->pilih_siswa();
			echo json_encode($data);
		}

	// Controller Data Siswa

	// Controller Data Jurusan

		public function data_jurusan()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('kepsek/jurusan');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/kepsek/jurusan');
		}

		public function view_data_jurusan()
		{
			$query = '';

			if($this->input->post('query'))
		  	{
		   		$query = $this->input->post('query');
		  	}
			$data = $this->MasterModel->data_jurusan($query);
			echo json_encode($data);
		}

	// Controller Data Jurusan

	// Controller Data Kelas
		public function data_kelas()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('kepsek/kelas');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/kepsek/kelas');
		}

		public function view_data_kelas()
		{
			$query = '';

			if($this->input->post('query'))
		  	{
		   		$query = $this->input->post('query');
		  	}
			$data = $this->MasterModel->data_kelas($query);
			echo json_encode($data);
		}

	// Controller Data Kelas

	// Controller Data Orang Tua

		public function data_ortu()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('kepsek/ortu');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/kepsek/ortu');
		}

		public function view_data_ortu()
		{
			$query = '';

			if($this->input->post('query'))
		  	{
		   		$query = $this->input->post('query');
		  	}
			$data = $this->MasterModel->data_ortu($query);
			echo json_encode($data);
		}

	// Controller Data Orang Tua

	// Controller Data Pelanggaran

		public function data_konseling()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('kepsek/konseling');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/kepsek/konseling');
		}

		public function view_pelanggaran()
		{
			$data = $this->MasterModel->view_pelanggaran();
			echo json_encode($data);
		}

		public function view_pelanggar()
		{
			$sesi_kepsek = '';
			$data = $this->MasterModel->view_pelanggar($sesi_kepsek);
			echo json_encode($data);
		}

		public function select_pelanggaran()
		{
			$data = $this->MasterModel->pilih_pelanggaran();
			echo json_encode($data);
		}

		public function tambah_pelanggar()
		{
			$data['id_siswa'] = $this->input->post('id_siswa');
			$data['id_pelanggaran'] = $this->input->post('id_pelanggaran');
			$data['tanggal'] = $this->input->post('tanggal');
			$data['keterangan'] = $this->input->post('keterangan');
			$data['id_kepsek'] = $this->session->userdata('id');

			$this->MasterModel->tambah_pelanggar($data);
			$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Siswa Bermasalah Sudah Di tambah',
				 );
			echo json_encode($respond);
		}

		public function delete_pelanggar()
		{
			$id = $this->input->post('id');
			$this->MasterModel->hapus_pelanggar($id);
			$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Sudah dihapus',
				 );
			echo json_encode($respond);
		}

	// Controller Data Pelanggaran
		public function data_users()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('kepsek/users');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/kepsek/users');
		}
	// Controller Data kepsek
		public function data_kepsek()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/navbar');
			$this->load->view('_partials/header');
			$this->load->view('kepsek/kepsek');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugin');
			$this->load->view('services/kepsek/kepsek');
		}

		public function view_data_kepsek()
		{
			$query = '';

			if($this->input->post('query'))
		  	{
		   		$query = $this->input->post('query');
		  	}
			$data = $this->MasterModel->data_kepsek($query);
			echo json_encode($data);
		}

		public function save_kepsek()
		{
			$cek = $this->db->get_where('kepsek', array(
				'nik' => $this->input->post('nik'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
			));
			if ($cek->num_rows() > 0) {
				$respond = array(
					'status' => 'error',
					'title' => 'GAGAL !!!',
					'message' => 'Data Sudah Ada',
				 );
			}else{
				$config['upload_path'] = './assets/img/kepsek/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg';
		        $config['max_size'] = '1024';
		        $config['file_name'] = $this->input->post('nik');
		        $this->load->library('upload', $config);

		        if($this->upload->do_upload("foto")){
					$foto = $this->upload->file_name;
				} else {
					$foto = '';
				}

				$data = array(
		 			'nik' 				=> $this->input->post('nik'),
		 			'nama_lengkap' 		=> $this->input->post('nama_lengkap'),
		 			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
		 			'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
		 			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
		 			'agama' 			=> $this->input->post('agama'),
		 			'alamat' 			=> $this->input->post('alamat'),
		 			'pendidikan'		=> $this->input->post('pendidikan'),
		 			'hp' 				=> $this->input->post('hp'),
		 			'email' 			=> $this->input->post('email'),
		 			'username' 			=> $this->input->post('username'),
		 			'password' 			=> $this->input->post('password'),
		 			
		 			'created_at' 		=> date('Y-m-d H:i:s'),
		 			'created_by' 		=> $this->session->userdata('id'),
		 			'foto' 				=> $foto
					 );

				$this->MasterModel->tambah_kepsek($data);
				$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Berhasil DiSimpan',
				 );
			}
			echo json_encode($respond);
		}

		public function update_kepsek()
		{
			$nik = $this->input->post('nik');
			$config['upload_path'] = './assets/img/kepsek/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('kepsek');
	        $this->load->library('upload', $config);

	         if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
				@unlink("./assets/img/kepsek/".$this->input->post('foto_lama'));
			} else {
				$foto = $this->input->post('foto_lama');
			} 
			
			$data = array(
	 			'nik' 				=> $this->input->post('nik'),
	 			'nama_lengkap' 		=> $this->input->post('nama_lengkap'),
	 			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
	 			'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
	 			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
	 			'agama' 			=> $this->input->post('agama'),
	 			'alamat' 			=> $this->input->post('alamat'),
	 			'pendidikan'		=> $this->input->post('pendidikan'),
	 			'hp' 				=> $this->input->post('hp'),
	 			'email' 			=> $this->input->post('email'),
	 			
	 			'created_at' 		=> date('Y-m-d H:i:s'),
	 			'created_by' 		=> $this->session->userdata('id'),
	 			'foto' 				=> $foto
			);

			$this->MasterModel->ubah_kepsek($nik, $data);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil DiSimpan',
			 );

			
			echo json_encode($respond);
		}

		public function delete_kepsek()
		{
			$nik = $this->input->post('nik');
			$query = $this->db->get_where('kepsek', array('nik' => $nik ))->row();
	    	if ($query) {
				@unlink("./assets/img/kepsek/$query->foto");
			}
			$this->MasterModel->hapus_kepsek($nik);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil Di Hapus'
			 );

			
			echo json_encode($respond);
		}
	// Controller End Data kepsek
		public function select_kepsek()
		{
			$data = $this->MasterModel->select_data_kepsek();
			echo json_encode($data);
		}
	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
 ?>