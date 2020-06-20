<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	function data_login($field1, $field2, $table)
	{		
		$this->db->select($table.'.nama_lengkap,'. $table.'.id,'. $table.'.level,'. $table.'.foto,'. $table.'.email, user_group.nama_akses, user_group.link,'. $table.'.status');
		$this->db->from($table);
		$this->db->join('user_group', 'user_group.id = '.$table.'.level', 'left');
		$this->db->where($field1);
		$this->db->where($field2);
		$this->db->where($table.'.status', 'Aktif');
		$this->db->limit(1);
		$q = $this->db->get();
		if ($q->num_rows() == 0) {
			return FALSE;
		}else {
			return $q->result();
		}
	}

}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */