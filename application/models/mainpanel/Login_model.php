<?php
class Login_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function valida_usuario($usuario, $password)
	{
            $this->db->where('usuario', $usuario);
            $this->db->where('password', $password);
            $this->db->where('estado', '1');
            $query =  $this->db->get('usuarios');
            return $query->row();
	}

    public function userPass($usuario, $password)
    {
        $this->db->where('usuario', $usuario);
        $this->db->where('password', $password);
        $query =  $this->db->get('usuarios');
        $hallados = $query->num_rows();
        if($hallados==0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }    
        
    public function userCorrecto($username) {
        $this->db->where('usuario', $username);
        $query =  $this->db->get('usuarios');
        $hallados = $query->num_rows();
        if($hallados==0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}
?>