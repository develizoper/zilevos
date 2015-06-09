<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modUser extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	/*
		checkUser(int)
		return array(): existe
		return 0: clave incorrecta
		return -1: no existe
	*/
	public function checkUser($user,$pass)
	{
		$this->db->select('*');
		$this->db->from("usuarios");
		$this->db->where('user',$user);
		$query = $this->db->get();

		if ($query->num_rows()<=0) return -1;

		$this->db->select('*');
		$this->db->from("usuarios");
		$this->db->where('user',$user);
		$this->db->where('pass',$pass);
		$query = $this->db->get();

		if ($query->num_rows()<=0) return 0;

		$row=$query->row_array();
		return $row;
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */