<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('modUser');
	}

	public function index()
	{
		
	}

	public function login()
	{
		$data= array(
			'tipo' => 'form',
			'form' => 'login'
		);
		$this->load->view('acceso', $data);
		/*echo $_GET['user']."<br>";
		echo $_GET['pass']."<br>";

		var_dump($this->modUser->checkUser($_GET['user'],$_GET['pass']));*/
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */