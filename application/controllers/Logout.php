
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{

		if ($this->session->userdata('link') == 'admin') {
			$this->session->sess_destroy();
			redirect(base_url('admin/login'));
		}
		if ($this->session->userdata('link') == 'guru') {
			$this->session->sess_destroy();
			redirect(base_url('guru/login'));
		}
		if ($this->session->userdata('link') == 'ortu') {
			$this->session->sess_destroy();
			redirect(base_url('login'));
		}
		if ($this->session->userdata('link') == 'kepsek') {
			$this->session->sess_destroy();
			redirect(base_url('kepsek/login'));
		}


	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */
 ?>