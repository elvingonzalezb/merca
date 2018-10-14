<?php
class Ingresar_model extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }

    public function getUser($usuario, $password)
    {
        $this->db->where('email', $usuario);
        $this->db->where('clave', $password);
        $query =  $this->db->get('registro_usuarios');
        return $query->row();
    }

	public function validaUser($usuario, $password)
	{
        $this->db->where('email', $usuario);
        $this->db->where('clave', $password);
        $this->db->where('estado', 'A');
        $query =  $this->db->get('registro_usuarios');
        return $query->row();
	}

    public function verificaEstado($usuario, $password)
    {
        $this->db->where('email', $usuario);
        $this->db->where('clave', $password);
        $this->db->where('estado', 'I');
        $query =  $this->db->get('registro_usuarios');
        return $query->row();
     
    } 

        
    public function verificaUser($username) {
        $this->db->where('email', $username);
        $query =  $this->db->get('registro_usuarios');
        return $query->row();
    }   
 
    public function getUsuario($correo) {
             $this->db->where('email', $correo);
            $query =  $this->db->get('registro_usuarios');
            return $query->row();            
        }
    public function update($correo, $data) 
        {
             $this->db->where('email', $correo);
            $result = $this->db->update("registro_usuarios", $data);
            return $result;
        }

            

}