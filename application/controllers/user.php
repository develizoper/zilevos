<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('moduser');
	}

	public function index()
	{
		
	}

	public function login()
	{
		$ajax=(isset($_POST['js']) && $_POST['js']==1)?true:false;

		if ( !isset($_POST['email']) || !isset($_POST['pass']) ) die('-2');

		$email=$_POST['email'];
		$pass=$_POST['pass'];
		echo $this->moduser->checkUser($email,$pass);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */