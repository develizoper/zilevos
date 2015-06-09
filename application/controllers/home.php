<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('home');
	}
	public function desktop()
	{
		$this->load->view('desktop');
	}
	public function access()
	{
		$this->load->view('access');
	}
	public function login()
	{
		$this->load->view('frmlogin');
	}
	public function register()
	{
		$this->load->view('frmregister');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */