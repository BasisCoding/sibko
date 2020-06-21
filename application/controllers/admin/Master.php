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

		public function save_siswa()
		{
			$cek = $this->db->get_where('siswa', array('nis' => $this->input->post('nis')));
			if ($cek->num_rows() > 0) {
				$respond = array(
					'status' => 'error',
					'title' => 'GAGAL !!!',
					'message' => 'Data Sudah Ada',
				 );
			}else{
				$config['upload_path'] = './assets/img/siswa/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg';
		        $config['max_size'] = '1024';
		        $config['file_name'] = $this->input->post('nis');
		        $this->load->library('upload', $config);

		        if($this->upload->do_upload("foto")){
					$foto = $this->upload->file_name;
				} else {
					$foto = '';
				}

				$data = array(
		 			'nis' 				=> $this->input->post('nis'),
		 			'nama_lengkap' 		=> $this->input->post('nama_lengkap'),
		 			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
		 			'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
		 			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
		 			'agama' 			=> $this->input->post('agama'),
		 			'alamat' 			=> $this->input->post('alamat'),
		 			'anak_ke' 			=> $this->input->post('anak_ke'),
		 			'id_ortu'			=> $this->input->post('id_ortu'),
		 			'hp' 				=> $this->input->post('hp'),
		 			'email' 			=> $this->input->post('email'),
		 			'minat_bakat' 		=> $this->input->post('minat_bakat'),
		 			
		 			'created_at' 		=> date('Y-m-d H:i:s'),
		 			'created_by' 		=> $this->session->userdata('id'),
		 			'foto' 				=> $foto
					 );

				$this->MasterModel->tambah_siswa($data);
				$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Berhasil DiSimpan',
				 );
			}
			echo json_encode($respond);
		}

		public function update_siswa()
		{
			$nis = $this->input->post('nis');
			$config['upload_path'] = './assets/img/siswa/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('nis');
	        $this->load->library('upload', $config);

	         if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
				@unlink("./assets/img/siswa/".$this->input->post('foto_lama'));
			} else {
				$foto = $this->input->post('foto_lama');
			} 
			
			$data = array(
	 			'nis' 				=> $this->input->post('nis'),
	 			'nama_lengkap' 		=> $this->input->post('nama_lengkap'),
	 			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
	 			'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
	 			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
	 			'agama' 			=> $this->input->post('agama'),
	 			'alamat' 			=> $this->input->post('alamat'),
	 			'anak_ke' 			=> $this->input->post('anak_ke'),
	 			'id_ortu'			=> $this->input->post('id_ortu'),
	 			'hp' 				=> $this->input->post('hp'),
	 			'email' 			=> $this->input->post('email'),
	 			'minat_bakat' 		=> $this->input->post('minat_bakat'),
	 			
	 			'created_at' 		=> date('Y-m-d H:i:s'),
	 			'created_by' 		=> $this->session->userdata('id'),
	 			'foto' 				=> $foto
				 );

			$this->MasterModel->ubah_siswa($nis, $data);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil DiSimpan',
			 );

			
			echo json_encode($respond);
		}

		public function delete_siswa()
		{
			$nis = $this->input->post('nis');
			$query = $this->db->get_where('siswa', array('nis' => $nis ))->row();
	    	if ($query) {
				@unlink("./assets/img/siswa/$query->foto");
			}
			$this->MasterModel->hapus_siswa($nis);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil Di Hapus'
			 );

			
			echo json_encode($respond);
		}

		public function view_kelas_siswa()
		{
			$id_kelas = $this->input->post('id');
			$data = $this->MasterModel->siswa_kelas($id_kelas);
			echo json_encode($data);
		}

		public function select_siswa()
		{
			$data = $this->MasterModel->select_siswa();
			echo json_encode($data);
		}
	// Controller Data Siswa

	// Controller Data Jurusan

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

		public function save_jurusan()
		{
			$cek = $this->db->get_where('jurusan', array('kode_jurusan' => $this->input->post('kode_jurusan')));
			if ($cek->num_rows() > 0) {
				$respond = array(
					'status' => 'error',
					'title' => 'GAGAL !!!',
					'message' => 'Data Sudah Ada',
				 );
			}else{
				$config['upload_path'] = './assets/img/logo-jurusan/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg';
		        $config['max_size'] = '1024';
		        $config['file_name'] = $this->input->post('kode_jurusan');
		        $this->load->library('upload', $config);

		        if($this->upload->do_upload("logo")){
					$logo = $this->upload->file_name;
				} else {
					$logo = '';
				}

				$data = array(
		 			'kode_jurusan' 			=> $this->input->post('kode_jurusan'),
		 			'nama_jurusan' 			=> $this->input->post('nama_jurusan'),
		 			'semester' 				=> $this->input->post('semester'),
		 			'kepala_jurusan' 		=> $this->input->post('kajur'),
		 			
		 			'logo' 					=> $logo
					 );

				$this->MasterModel->tambah_jurusan($data);
				$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Berhasil DiSimpan',
				 );
			}
			echo json_encode($respond);
		}

		public function update_jurusan()
		{
			$id = $this->input->post('id');
			$config['upload_path'] = './assets/img/logo-jurusan/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('kode_jurusan');
	        $this->load->library('upload', $config);

	         if($this->upload->do_upload("logo")){
				$logo = $this->upload->file_name;
				@unlink("./assets/img/logo-jurusan/".$this->input->post('logo_lama'));
			} else {
				$logo = $this->input->post('logo_lama');
			} 
			
			$data = array(
	 			'kode_jurusan' 				=> $this->input->post('kode_jurusan'),
	 			'nama_jurusan' 		=> $this->input->post('nama_jurusan'),
	 			'semester' 		=> $this->input->post('semester'),
	 			'kepala_jurusan' 	=> $this->input->post('kajur'),
	 			
	 			'logo' 				=> $logo
				 );

			$this->MasterModel->ubah_jurusan($id, $data);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil DiSimpan',
			 );

			
			echo json_encode($respond);
		}

		public function delete_jurusan()
		{
			$id = $this->input->post('id');
			$query = $this->db->get_where('jurusan', array('id' => $id ))->row();
	    	if ($query) {
				@unlink("./assets/img/logo-jurusan/$query->logo");
			}
			$this->MasterModel->hapus_jurusan($id);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil Di Hapus'
			 );

			
			echo json_encode($respond);
		}

		public function select_jurusan()
		{
			$data = $this->MasterModel->select_jurusan();
			echo json_encode($data);
		}
	// Controller Data Jurusan

	// Controller Data Kelas
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

		public function save_kelas()
		{	
			$data['id_jurusan'] = $this->input->post('id_jurusan');
			$data['tingkat'] = $this->input->post('tingkat');

			$cek = $this->db->get_where('kelas', array(
				'id_jurusan' 	=> $this->input->post('id_jurusan'), 
				'tingkat'		=> $this->input->post('tingkat')
			));

			if ($cek->num_rows() > 0) {
				$respond = array(
					'status' => 'error',
					'title' => 'GAGAL !!!',
					'message' => 'Data Sudah Ada',
				 );
			}else{
				$query = $this->MasterModel->tambah_kelas($data);
				$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Sudah Disimpan',
				 );
			}
			echo json_encode($respond);
		}

		public function update_kelas()
		{
			$id = $this->input->post('id');
			$data['tingkat'] = $this->input->post('tingkat');
			$data['id_jurusan'] = $this->input->post('id_jurusan');

			$this->MasterModel->ubah_kelas($id, $data);
			$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Berhasil Disimpan',
				 );
			echo json_encode($respond);
		}

		public function delete_kelas()
		{
			$id = $this->input->post('id');
			
			$this->MasterModel->hapus_kelas($id);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil Di Hapus'
			 );

			
			echo json_encode($respond);
		}

		public function tarik_siswa()
		{
			$data['id_kelas'] = $this->input->post('id_kelas');
			$id = $this->input->post('id');

			$this->MasterModel->tambah_siswa_kelas($id, $data);
			$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Berhasil Disimpan',
				 );
			echo json_encode($respond);
		}
	// Controller Data Kelas

	// Controller Data Orang Tua

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

		public function select_ortu()
		{
			$data = $this->MasterModel->select_data_ortu();
			echo json_encode($data);
		}

		public function save_ortu_siswa()
		{
			$cek = $this->db->get_where('ortu', array('nik' => $this->input->post('nik')));
			if ($cek->num_rows() > 0) {
				$respond = array(
					'status' => 'error',
					'title' => 'GAGAL !!!',
					'message' => 'Data Orang Tua Sudah Ada',
				 );
			}else{
				$data = array(
		 			'nik' 					=> $this->input->post('nik_orangtua'),
		 			'username' 				=> $this->input->post('username'),
		 			'nama_lengkap' 			=> $this->input->post('nama_lengkap_ortu'),
		 			'jenis_kelamin' 		=> $this->input->post('jenis_kelamin_ortu'),
		 			'hp' 					=> $this->input->post('hp_ortu'),
		 			'email' 				=> $this->input->post('email_ortu'),
		 			'status' 				=> 'Aktif',
		 			'level' 				=> 2,
		 			'password' 				=> hash('sha512', $this->input->post('password') . config_item('encryption_key')),
		 			
		 			'created_at' 			=> date('Y-m-d H:i:s'),
		 			'created_by' 			=> $this->session->userdata('id'),
					 );

				$data = $this->MasterModel->tambah_ortu($data);
				$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Berhasil Di Simpan',
				 );
			}
			echo json_encode($respond);
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

		public function save_ortu()
		{
			$cek = $this->db->get_where('ortu', array(
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
				$config['upload_path'] = './assets/img/ortu/';
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
		 			'password' 			=> hash('sha512', $this->input->post('password') . config_item('encryption_key')),
		 			'status' 			=> 'Aktif',
		 			'level' 			=> 2,
		 			'created_at' 		=> date('Y-m-d H:i:s'),
		 			'created_by' 		=> $this->session->userdata('id'),
		 			'foto' 				=> $foto
					 );

				$this->MasterModel->tambah_ortu($data);
				$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Berhasil DiSimpan',
				 );
			}
			echo json_encode($respond);
		}

		public function update_ortu()
		{
			$nik = $this->input->post('nik');
			$config['upload_path'] = './assets/img/ortu/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('ortu');
	        $this->load->library('upload', $config);

	         if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
				@unlink("./assets/img/ortu/".$this->input->post('foto_lama'));
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

			$this->MasterModel->ubah_ortu($nik, $data);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil DiSimpan',
			 );

			
			echo json_encode($respond);
		}

		public function delete_ortu()
		{
			$nik = $this->input->post('nik');
			$query = $this->db->get_where('ortu', array('nik' => $nik ))->row();
	    	if ($query) {
				@unlink("./assets/img/ortu/$query->foto");
			}
			$this->MasterModel->hapus_ortu($nik);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil Di Hapus'
			 );

			
			echo json_encode($respond);
		}
	// Controller Data Orang Tua

	// Controller Data Pelanggaran
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

		public function view_pelanggaran()
		{
			$data = $this->MasterModel->view_pelanggaran();
			echo json_encode($data);
		}

		public function view_pelanggar()
		{
			$sesi_guru = '';
			$data = $this->MasterModel->view_pelanggar($sesi_guru);
			echo json_encode($data);
		}

		public function save_pelanggaran()
		{
			$data['jenis_pelanggaran'] = $this->input->post('jenis_pelanggaran');
			$data['tingkat'] = $this->input->post('tingkat');
			$data['max_langgaran'] = $this->input->post('max_langgaran');

			$query = $this->MasterModel->tambah_pelanggaran($data);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Sudah Disimpan',
			);
			echo json_encode($respond);
		}

		public function delete_pelanggaran()
		{
			$id = $this->input->post('id');
			$this->MasterModel->hapus_pelanggaran($id);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Sudah Disimpan',
			);
			echo json_encode($respond);
		}
	// Controller Data Pelanggaran

	// Controller Data Konseling
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
	// Controller Data Konseling
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
	// Controller Data Guru
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

		public function view_data_guru()
		{
			$query = '';

			if($this->input->post('query'))
		  	{
		   		$query = $this->input->post('query');
		  	}
			$data = $this->MasterModel->data_guru($query);
			echo json_encode($data);
		}

		public function save_guru()
		{
			$cek = $this->db->get_where('guru', array(
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
				$config['upload_path'] = './assets/img/guru/';
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
		 			'password' 			=> hash('sha512', $this->input->post('password') . config_item('encryption_key')),
		 			'status' 			=> 'Aktif',
		 			'level' 			=> 3,
		 			'created_at' 		=> date('Y-m-d H:i:s'),
		 			'created_by' 		=> $this->session->userdata('id'),
		 			'foto' 				=> $foto
					 );

				$this->MasterModel->tambah_guru($data);
				$respond = array(
					'status' => 'success',
					'title' => 'SUKSES !!!',
					'message' => 'Data Berhasil DiSimpan',
				 );
			}
			echo json_encode($respond);
		}

		public function update_guru()
		{
			$nik = $this->input->post('nik');
			$config['upload_path'] = './assets/img/guru/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['file_name'] = $this->input->post('guru');
	        $this->load->library('upload', $config);

	         if($this->upload->do_upload("foto")){
				$foto = $this->upload->file_name;
				@unlink("./assets/img/guru/".$this->input->post('foto_lama'));
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

			$this->MasterModel->ubah_guru($nik, $data);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil DiSimpan',
			 );

			
			echo json_encode($respond);
		}

		public function delete_guru()
		{
			$nik = $this->input->post('nik');
			$query = $this->db->get_where('guru', array('nik' => $nik ))->row();
	    	if ($query) {
				@unlink("./assets/img/guru/$query->foto");
			}
			$this->MasterModel->hapus_guru($nik);
			$respond = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil Di Hapus'
			 );

			
			echo json_encode($respond);
		}
	// Controller End Data Guru
		public function select_guru()
		{
			$data = $this->MasterModel->select_data_guru();
			echo json_encode($data);
		}
	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
 ?>