<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterModel extends CI_Model {
	
		function data_siswa($query)
		{
			$this->db->select('siswa.*, ortu.nama_lengkap as nama_ortu');
			$this->db->from('siswa');
			$this->db->join('ortu', 'ortu.id = siswa.id_ortu', 'left');
			if ($query != '') {
				$this->db->group_start();
			 		$this->db->or_like('siswa.nama_lengkap', $query);
			 		$this->db->or_like('siswa.nis', $query);
			 		$this->db->or_like('ortu.nama_lengkap', $query);
			 		$this->db->or_like('siswa.tempat_lahir', $query);
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

		function tambah_ortu($data)
		{
			$this->db->insert('ortu', $data);
		}

		function data_ortu()
		{
			$this->db->select('ortu.nama_lengkap, ortu.id, ortu.alamat, ortu.hp, ortu.pekerjaan, ortu.pendidikan, ortu.agama, ortu.jenis_kelamin, ortu.foto, ortu.status');
			$this->db->from('ortu');
			return $this->db->get()->result();
		}
	
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>