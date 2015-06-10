<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		

		$data = array(
		    'title' => 'Sistema Operativo.',
		    'style' => array('vendor/login/css/style.css'),
		);

		if($this->session->userdata('logged_in')){
			$data['body']=array(
				$this->load->view('desktop', '', true)
		    );
		}else{
			$data['body']=array(
				$this->load->view('access', '', true)
		    );
		}

		$this->load->view('template/index', $data);
	}
	public function login()
	{
		$access= array(
			'load'=>'login'
		);
		$data = array(
		    'title' => 'Inicia Sesion.',
		    'style' => array('vendor/login/css/style.css'),
		    'body' => array(
		    	$this->load->view('access', $access, true)
		    )
		);
		$this->load->view('template/index', $data);
	}
	public function register()
	{
		$access= array(
			'load'=>'register'
		);

		$data = array(
		    'title' => '¡Registrate ya!.',
		    'style' => array('vendor/login/css/style.css'),
		    'body' => array(
		    	$this->load->view('access', $access, true)
		    )
		);
		$this->load->view('template/index', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */