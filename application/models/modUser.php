<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class moduser extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	/*
		checkUser(int)
		return 1: existe
		return 0: clave incorrecta
		return -1: no existe
	*/
	public function checkUser($user,$pass)
	{
		$this->db->select('*');
		$this->db->from("usuarios");
		$this->db->where('email',$user);
		$query = $this->db->get();

		if ($query->num_rows()<=0) return -1;

		$this->db->select('idusuario,nombres,apellidos,email,foto,tipo_usuario');
		$this->db->from("usuarios");
		$this->db->where('email',$user);
		$this->db->where('pass',$pass);
		$query = $this->db->get();

		if ($query->num_rows()<=0) return 0;

		$this->session->set_userdata('usuario',$query->row_array());
		return 1;
	}
	public function registrar($data)
	{
		$this->db->trans_start();
			$this->db->insert('usuarios', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE){
		    return 0;
		}else{
		    return 1;
		}
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */