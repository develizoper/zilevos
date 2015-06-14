<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('usuario')){
			$view='desktop';
			$style=array();
		}else{
			$view='access';
			$style=array('vendor/login/css/style.css');
		}

		if (isset($_POST['ajax'])) {
			$access['ajax']=true;

			$this->load->view($view,$access);
		}else{
			$data = array(
			    'title' => 'Sistema Operativo',
			    'style' => $style,
			    'script' => array()
			);

			$data['body']=array(
				$this->load->view($view, '', true)
		    );

			$this->load->view('template/index', $data);
		}
	}
	public function login()
	{
		if($this->session->userdata('usuario')){
			$title='Sistema Operativo';
			$style=array();
			$view='desktop';
		}else{
			$title='Inicia Sesion';
			$style=array('vendor/login/css/style.css');
			$view='access';
			$access['load']='login';
		}
		

		if (isset($_POST['ajax'])) {
			$access['ajax']=true;
			$this->load->view($view, $access);
		}else{
			$data = array(
			    'title' => $title,
			    'style' => $style,
			    'script' => array(),
			    'body' => array(
			    	$this->load->view($view, $access, true)
			    )
			);
			$this->load->view('template/index', $data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	public function registrar()
	{
		if($this->session->userdata('usuario')){
			$title='Sistema Operativo';
			$style=array();
			$view='desktop';
		}else{
			$title='¡Registrate ya!';
			$style=array('vendor/login/css/style.css');
			$view='access';
			$access['load']='registrar';
		}

		if (isset($_POST['ajax'])) {
			$access['ajax']=true;
			$this->load->view($view, $access);
		}else{
			$data = array(
			    'title' => $title,
			    'style' => $style,
			    'script' => array(),
			    'body' => array(
			    	$this->load->view($view, $access, true)
			    )
			);
			$this->load->view('template/index', $data);
		}
	}

	function confirm($code='')
	{
		if ($code=='') {
			echo 'ingrese codigo';
		}else{
			$this->load->model('moduser');
			if ($this->moduser->confirmEmail($code)==1) {
				echo "Correo confirmado. <a href=\"http://zilevos.iuxdev.com/login\">Inicie sesion</a>";
			}else if ($this->moduser->confirmEmail($code)==0) {
				echo "ocurrio un error al validar su correo.";
			}else{
				echo "este codigo no esta asosiado con ningun usuario.";
			}
		}
	}
	public function prueba()
	{
		echo md5($_POST['mail']);
		//$this->load->view('mailing/confirm_regist',array('code' => $code ));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */