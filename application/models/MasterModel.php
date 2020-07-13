<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterModel extends CI_Model {
		
		function total_siswa()
		{
			$this->db->select('COUNT(id) as total_siswa');
			return $this->db->get('siswa')->row()->total_siswa;
		}
		function total_kelas()
		{
			$this->db->select('COUNT(id) as total_kelas');
			return $this->db->get('kelas')->row()->total_kelas;
		}
		function total_guru()
		{
			$this->db->select('COUNT(id) as total_guru');
			return $this->db->get('guru')->row()->total_guru;
		}
		function total_pelanggar()
		{
			$this->db->select('COUNT(id) as total_pelanggar');
			return $this->db->get('konseling')->row()->total_pelanggar;
		}


	// Model Data Siswa
		function data_siswa($query)
		{
			$this->db->select('siswa.*, ortu.nama_lengkap as nama_ortu, kelas.tingkat, jurusan.nama_jurusan, jurusan.semester, jurusan.kode_jurusan');
			$this->db->from('siswa');
			$this->db->join('ortu', 'ortu.id = siswa.id_ortu', 'left');
			$this->db->join('kelas', 'kelas.id = siswa.id_kelas', 'left');
			$this->db->join('jurusan', 'jurusan.id = kelas.id_jurusan', 'left');
			if ($query != '') {
				$this->db->group_start();
			 		$this->db->or_like('siswa.nama_lengkap', $query);
			 		$this->db->or_like('siswa.nis', $query);
			 		$this->db->or_like('ortu.nama_lengkap', $query);
			 		$this->db->or_like('siswa.tempat_lahir', $query);
			 		$this->db->or_like('jurusan.nama_jurusan', $query);
			 	$this->db->group_end();
			}
			return $this->db->get()->result();
		}

		function tambah_siswa($data)
		{
			$this->db->insert('siswa', $data);
		}

		function ubah_siswa($nis, $data)
		{
			$this->db->update('siswa', $data, array('nis' => $nis));
		}

		function hapus_siswa($nis)
		{
			$this->db->delete('siswa', array('nis' => $nis));
		}

		function select_siswa()
		{
			$this->db->select('siswa.nis, siswa.nama_lengkap, siswa.jenis_kelamin, siswa.id');
			$this->db->from('siswa');
			$this->db->where('id_kelas', NULL);
			return $this->db->get()->result();
		}

		function tambah_siswa_kelas($id, $data)
		{
			$this->db->update('siswa', $data, array('id' => $id));
		}

		function view_data_anak($id)
		{
			$this->db->select('siswa.*, ortu.nama_lengkap as nama_ortu, kelas.tingkat, jurusan.nama_jurusan, jurusan.semester, jurusan.kode_jurusan, ortu.hp');
			$this->db->from('siswa');
			$this->db->join('ortu', 'ortu.id = siswa.id_ortu', 'left');
			$this->db->join('kelas', 'kelas.id = siswa.id_kelas', 'left');
			$this->db->join('jurusan', 'jurusan.id = kelas.id_jurusan', 'left');
			$this->db->where('id_ortu', $id);
			
			return $this->db->get();
		}
	// Model Data Siswa

	// Model Data Jurusan

		function data_jurusan($query)
		{
			$this->db->select('jurusan.*, guru.nama_lengkap');
			$this->db->from('jurusan');
			$this->db->join('guru', 'guru.id = jurusan.kepala_jurusan', 'left');
			if ($query != '') {
				$this->db->group_start();
			 		$this->db->or_like('kode_jurusan', $query);
			 		$this->db->or_like('nama_jurusan', $query);
			 	$this->db->group_end();
			}
			return $this->db->get()->result();
		}

		function tambah_jurusan($data)
		{
			$this->db->insert('jurusan', $data);
		}

		function ubah_jurusan($id, $data)
		{
			$this->db->update('jurusan', $data, array('id' => $id));
		}

		function hapus_jurusan($id)
		{
			$this->db->delete('jurusan', array('id' => $id));
			$this->db->update('kelas', array('id_jurusan' => NULL) , array('id_jurusan' => $id));
		}

		function select_jurusan()
		{
			$this->db->select('jurusan.id, jurusan.nama_jurusan, jurusan.kode_jurusan');
			$this->db->from('jurusan');
			return $this->db->get()->result();
		}
	// Model Data Jurusan

	// Model Data Kelas

		function data_kelas($query)
		{

			$this->db->select('kelas.*, jurusan.nama_jurusan, jurusan.kode_jurusan, COUNT(siswa.id_kelas) as jumlah_siswa');

			$this->db->from('kelas');
			$this->db->join('jurusan', 'jurusan.id = kelas.id_jurusan', 'left');
			$this->db->join('siswa', 'siswa.id_kelas = kelas.id', 'left');
			if ($query != '') {
				$this->db->group_start();
			 		$this->db->or_like('nama_kelas', $query);
			 		$this->db->or_like('nama_jurusan', $query);
			 	$this->db->group_end();
			}
			$this->db->group_by('id');
			return $this->db->get()->result();
		}

		function tambah_kelas($data)
		{
			$this->db->insert('kelas', $data);
		}

		function ubah_kelas($id, $data)
		{
			$this->db->update('kelas', $data, array('id' => $id));
		}

		function hapus_kelas($id)
		{
			$this->db->delete('kelas', array('id' => $id));
			$this->db->update('siswa', array('id_kelas' => NULL), array('id_kelas' => $id));
		}

		function siswa_kelas($id_kelas)
		{
			$this->db->select('siswa.nis, siswa.nama_lengkap, siswa.jenis_kelamin, siswa.id');
			$this->db->from('siswa');
			$this->db->where('id_kelas', $id_kelas);
			return $this->db->get()->result();
		}
	// Model Data Kelas

	// Mode Data Orang Tua
		function get_ortu($id_siswa)
		{
			$this->db->select('siswa.nama_lengkap, ortu.nama_lengkap, ortu.hp');
			$this->db->from('siswa');
			$this->db->join('ortu', 'ortu.id = siswa.id_ortu', 'left');
			$this->db->where('siswa.id', $id_siswa);
			return $this->db->get();
		}

		function data_ortu($query)
		{
			$this->db->select('nik,nama_lengkap,pendidikan,pekerjaan,jenis_kelamin,status,username,email,id,tanggal_lahir,tempat_lahir,alamat,hp,agama,foto');
			$this->db->from('ortu');
			
			if ($query != '') {
				$this->db->group_start();
			 		$this->db->or_like('nama_lengkap', $query);
			 		$this->db->or_like('pendidikan', $query);
			 		$this->db->or_like('username', $query);
			 		$this->db->or_like('jenis_kelamin', $query);
			 		$this->db->or_like('pendidikan', $query);
			 		$this->db->or_like('status', $query);
			 	$this->db->group_end();
			}
			return $this->db->get()->result();
		}

		function tambah_ortu($data)
		{
			$this->db->insert('ortu', $data);
		}

		function select_data_ortu()
		{
			$this->db->select('ortu.nama_lengkap, ortu.id');
			$this->db->from('ortu');
			return $this->db->get()->result();
		}
		
		function select_data_guru()
		{
			$this->db->select('guru.id, guru.nama_lengkap');
			$this->db->from('guru');
			return $this->db->get()->result();
		}

		function ubah_ortu($nik, $data)
		{
			$this->db->update('ortu', $data, array('nik' => $nik));
		}

		function hapus_ortu($nik)
		{
			$this->db->delete('ortu', array('nik' => $nik));
		}
	// Model Data Orang Tua

	// Model Data Guru

		function data_guru($query)
		{
			$this->db->select('nik,nama_lengkap,pendidikan,jenis_kelamin,status,username,email,id,tanggal_lahir,tempat_lahir,alamat,hp,agama,foto');
			$this->db->from('guru');
			
			if ($query != '') {
				$this->db->group_start();
			 		$this->db->or_like('nama_lengkap', $query);
			 		$this->db->or_like('pendidikan', $query);
			 		$this->db->or_like('username', $query);
			 		$this->db->or_like('jenis_kelamin', $query);
			 		$this->db->or_like('status', $query);
			 	$this->db->group_end();
			}
			return $this->db->get()->result();
		}

		function tambah_guru($data)
		{
			$this->db->insert('guru', $data);
		}

		function ubah_guru($nik, $data)
		{
			$this->db->update('guru', $data, array('nik' => $nik));
		}

		function hapus_guru($nik)
		{
			$this->db->delete('guru', array('nik' => $nik));
		}
	// Model Data Guru

	// Model Data Pelanggaran
		function view_pelanggaran()
		{
			$this->db->select('*');
			$this->db->select('
				CASE 
				WHEN tingkat = 1 THEN "Sederhana" 
				WHEN tingkat = 2 THEN "Buruk" 
				WHEN tingkat = 3 THEN "Sangat Buruk" 
				END as tingkatan', false);
			$this->db->from('pelanggaran');
			return $this->db->get()->result();
		}

		function tambah_pelanggaran($data)
		{
			$this->db->insert('pelanggaran', $data);
		}

		function hapus_pelanggaran($id)
		{
			$this->db->delete('pelanggaran', array('id' => $id));
			$this->db->delete('konseling', array('id_pelanggaran' => $id));
		}

		function view_pelanggar($sesi_guru)
		{

			$this->db->select('konseling.*,siswa.nis, siswa.nama_lengkap, siswa.foto, kelas.tingkat, jurusan.nama_jurusan, ortu.nama_lengkap as nama_ortu, guru.nama_lengkap as nama_guru, pelanggaran.jenis_pelanggaran,pelanggaran.tingkat');
			$this->db->select('

				CASE 
				WHEN kelas.tingkat = 1 THEN "Sederhana" 
				WHEN kelas.tingkat = 2 THEN "Buruk" 
				WHEN kelas.tingkat = 3 THEN "Sangat Buruk" 
				END as tingkatan', false);

			$this->db->from('konseling');
			$this->db->join('pelanggaran', 'pelanggaran.id = konseling.id_pelanggaran', 'left');
			$this->db->join('siswa', 'siswa.id = konseling.id_siswa', 'left');
			$this->db->join('guru', 'guru.id = konseling.id_guru', 'left');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id', 'left');
			$this->db->join('ortu', 'ortu.id = siswa.id_ortu', 'left');
			$this->db->join('jurusan', 'jurusan.id = kelas.id_jurusan', 'left');
			if ($sesi_guru != '') {
				$this->db->where('konseling.id_guru', $sesi_guru);
			}
			return $this->db->get()->result();
		}

		function pilih_pelanggaran()
		{
			$this->db->select('pelanggaran.id, pelanggaran.jenis_pelanggaran');
			$this->db->from('pelanggaran');
			return $this->db->get()->result();
		}

		function pilih_siswa()
		{
			$this->db->select('siswa.nis, siswa.nama_lengkap, siswa.jenis_kelamin, siswa.id');
			$this->db->from('siswa');
			$this->db->where('id_kelas !=', NULL);
			return $this->db->get()->result();
		}

		function tambah_pelanggar($data)
		{
			$this->db->insert('konseling', $data);
		}

		function hapus_pelanggar($id)
		{
			$this->db->delete('konseling',array('id' => $id));
		}

		function view_data_konseling($id)
		{
			$this->db->select('konseling.*,siswa.nis, siswa.nama_lengkap, kelas.tingkat, jurusan.nama_jurusan, ortu.nama_lengkap as nama_ortu, guru.nama_lengkap as nama_guru, pelanggaran.jenis_pelanggaran,pelanggaran.tingkat');
			$this->db->select('

				CASE 
				WHEN kelas.tingkat = 1 THEN "Sederhana" 
				WHEN kelas.tingkat = 2 THEN "Buruk" 
				WHEN kelas.tingkat = 3 THEN "Sangat Buruk" 
				END as tingkatan', false);

			$this->db->from('konseling');
			$this->db->join('pelanggaran', 'pelanggaran.id = konseling.id_pelanggaran', 'left');
			$this->db->join('siswa', 'siswa.id = konseling.id_siswa', 'left');
			$this->db->join('guru', 'guru.id = konseling.id_guru', 'left');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id', 'left');
			$this->db->join('ortu', 'ortu.id = siswa.id_ortu', 'left');
			$this->db->join('jurusan', 'jurusan.id = kelas.id_jurusan', 'left');
			$this->db->where('id_ortu', $id);
			return $this->db->get()->result();
		}
	// Model Data Pelanggaran


	// Moda Dashboard
		function get_chart()
		{
			$this->db->select('COUNT(id_siswa) as total_pelanggar, MONTH(tanggal) as daftar_bulan,');
			$this->db->from('konseling');
			$this->db->where('YEAR(tanggal)', date('Y'));
			$this->db->group_by('daftar_bulan');
			return $this->db->get()->result();
		}
	// Moda Dashboard
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>