<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class moduser extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	/*
		checkUser(int)
		return 1: usuario valido
		return 0: clave incorrecta
		return -1: usuario no existe
	*/
	public function checkUser($user,$pass)
	{
		$this->db->select('*');
		$this->db->from("usuarios");
		$this->db->where('email',$user);
		$this->db->where('confirm',1);
		$query = $this->db->get();

		if ($query->num_rows()<=0) return -1;

		$this->db->select('idusuario,idfb,nombres,apellidos,email,foto,tipo_usuario');
		$this->db->from("usuarios");
		$this->db->where('email',$user);
		$this->db->where('pass',md5($pass));
		$this->db->where('confirm',1);
		$query = $this->db->get();

		if ($query->num_rows()<=0) return 0;

		$this->session->set_userdata('usuario',$query->row_array());
		return 1;
	}

	public function checkFb($idfb)
	{
		$this->db->select('idusuario,idfb,nombres,apellidos,email,foto,tipo_usuario');
		$this->db->from("usuarios");
		$this->db->where('idfb',$idfb);
		$query = $this->db->get();

		if ($query->num_rows()<=0) return 0;
		
		$this->session->set_userdata('usuario',$query->row_array());
		return 1;
	}

	/*
		registrar(int)
		return 1: no logro registrar
		return 0: registro exitoso
	*/
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

	/*
		registrar(int)
		return 1: no logro modificar
		return 0: modificacion exitosa
	*/
	public function modificar($condition,$data)
	{
		$this->db->trans_start();
			$this->db->update('usuarios', $data, $condition);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE){
		    return 0;
		}else{
		    return 1;
		}
	}

	/*
		checkEmail(int)
		return 0: correo  no existe 
		return array(): datos del usuario con ese correo
	*/
	public function checkEmail($email)
	{
		$this->db->select('*');
		$this->db->from("usuarios");
		$this->db->where('email',$email);
		$query = $this->db->get();

		if ($query->num_rows()<=0) return 0;
		return $query->row_array();
	}
	

	/*
		checkEmail(int)
		return 1: codigo valido
		return 0: codigo valido  pero  no se pudo  validar correctamente
		return -1: codigo invalido
	*/
	public function confirmEmail($code)
	{
		$this->db->select('*');
		$this->db->from("usuarios");
		$this->db->where('md5(email)',$code);
		$query = $this->db->get();

		if ($query->num_rows()<=0) return -1;

		$this->db->trans_start();
			$this->db->update('usuarios', array('confirm' => 1), array('md5(email)' => $code));
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