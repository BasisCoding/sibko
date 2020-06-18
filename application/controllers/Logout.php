
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		$link = $this->session->userdata('link');
		$this->session->sess_destroy();
		redirect(base_url($link.'/login'));
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */
 ?>