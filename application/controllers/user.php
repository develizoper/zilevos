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
		if ( !isset($_POST['id']) || !isset($_POST['email']) || !isset($_POST['verified']) ) die('-2');
		if ($_POST['verified']!=true) die('-3');

		$user_registrado=$this->moduser->checkFb($_POST['id']);

		if($user_registrado==1)die('1');

		$user_registrado=$this->moduser->checkEmail($_POST['email']);
		if($user_registrado==0){
			$data=array(
				'idfb' => $_POST['id'],
				'nombres' => $_POST['first_name'],
				'apellidos' => $_POST['last_name'],
				'email' => $_POST['email'],
				'foto' => 'https://graph.facebook.com/'.$_POST['id'].'/picture?width=300&height=300',
				'tipo_usuario' => 1
			);
			$this->moduser->registrar($data);
			echo $this->moduser->checkFb($_POST['id']);
		}else{
			if ($user_registrado['tipo_usuario']=='0') {
		    	$data = array(
		    		'tipo_usuario' => 2,
		    		'idfb' => $_POST['id'],
		    		'foto' => 'https://graph.facebook.com/'.$_POST['id'].'/picture?width=300&height=300'
		    	);
		    	$condition = array('email' => $_POST['email']);

		    	$this->moduser->modificar($condition,$data);
		    	echo $this->moduser->checkFb($_POST['id']);
			}else{
				echo 1;
			}
		}
	}
	public function registrar()
	{
		$ajax=(isset($_POST['js']) && $_POST['js']==1)?true:false;

		if (!isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['email']) || !isset($_POST['pass']) )die('-1');

		$data=array(
			'nombres' => $_POST['nombre'],
			'apellidos' => $_POST['apellido'],
			'email' => $_POST['email'],
			'pass' => md5($_POST['pass'])
		);


		$user_registrado=$this->moduser->checkEmail($_POST['email']);

		if($user_registrado==0){
			$isreg=$this->moduser->registrar($data);
			if ($isreg=='1') {
				$this->load->library('email');
				$this->email->set_mailtype("html");
				$this->email->from('info@iuxdev.com', 'ZilevOS Group');
				$this->email->to($_POST['email']); 

				$this->email->subject('Confirmar correo :: ZilevOS');
				$data_mail = array('code' => md5($_POST['email']));
				$contenido=$this->load->view('mailing/confirm_regist', $data_mail, TRUE);
				$this->email->message($contenido);	

				$this->email->send();
			}

			echo $isreg;
		}else{
			switch ($user_registrado['tipo_usuario']) {
			    case '0':
			    	echo 2;
			        break;
			    case '1':
			    	$data = array(
			    		'tipo_usuario' => 2,
			    		'pass' => md5($_POST['pass'])
			    	);
			    	$condition = array('email' => $_POST['email']);

			    	if ($this->moduser->modificar($condition,$data)==0){
			    		echo "Estamos teniendo problemas, vualva a intentarlo mas tarde.";
			    	}else{
			    		echo 3;
			    	}
			        break;
			    case '2':
			        echo 2;
			        break;
			}
		}
	}

	public function anonimous()
	{
		$this->session->set_userdata('usuario',array('id' => rand(100000, 999999), 'tipo' => 'anonimo'));
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */