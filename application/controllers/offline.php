<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offline extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('offline');
	}

}

/* End of file offline.php */
/* Location: ./application/controllers/offline.php */