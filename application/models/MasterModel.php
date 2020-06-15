<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterModel extends CI_Model {
	
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
	// Model Data Siswa

	// Model Data Jurusan

		function data_jurusan($query)
		{
			$this->db->select('*');
			$this->db->from('jurusan');
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
			$this->db->select('kelas.*, jurusan.nama_jurusan, jurusan.kode_jurusan');
			$this->db->from('kelas');
			$this->db->join('jurusan', 'jurusan.id = kelas.id_jurusan', 'left');
			if ($query != '') {
				$this->db->group_start();
			 		$this->db->or_like('nama_kelas', $query);
			 		$this->db->or_like('nama_jurusan', $query);
			 	$this->db->group_end();
			}
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
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>