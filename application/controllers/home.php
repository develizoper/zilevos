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
			    'script' => array(
					'js/jquery.form.js',
					'js/jquery.validate.js',
					'js/jquery.validate.messages_es.js',
					'js/jquery.validate.date.js',
					'js/jquery.validate.alphanumeric.js',
			    ),
			    'body' => array(
			    	$this->load->view($view, $access, true)
			    )
			);
			$this->load->view('template/index', $data);
		}
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
			    'script' => array(
					'js/jquery.form.js',
					'js/jquery.validate.js',
					'js/jquery.validate.messages_es.js',
					'js/jquery.validate.date.js',
					'js/jquery.validate.alphanumeric.js'
			    ),
			    'body' => array(
			    	$this->load->view($view, $access, true)
			    )
			);
			$this->load->view('template/index', $data);
		}
	}

	public function prueba()
	{
		echo isset($_POST['ajax']);
		$this->load->view('inicio/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */