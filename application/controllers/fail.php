<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('fail');
	}

}

/* End of file fail */
/* Location: ./application/controllers/fail */