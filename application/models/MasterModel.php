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
	
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>