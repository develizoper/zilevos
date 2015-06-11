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

	public function loginfb()
	{
		var_dump($_POST);
	}
	public function registrar()
	{
		$ajax=(isset($_POST['js']) && $_POST['js']==1)?true:false;

		if (!isset($_POST['nombre']) ||
			!isset($_POST['apellido']) ||
			!isset($_POST['email']) ||
			!isset($_POST['pass'])) die('-1');

		$data=array(
			'nombres' => $_POST['nombre'],
			'apellidos' => $_POST['apellido'],
			'email' => $_POST['email'],
			'pass' => $_POST['pass'],
		);

		echo $this->moduser->registrar($data);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */