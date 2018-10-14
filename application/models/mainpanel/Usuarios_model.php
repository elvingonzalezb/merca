<?php 
	class Usuarios_model extends CI_Model
	{
		function __construct() 
		{
			parent::__construct();
		}

		public function getLista() 
		{
			$query = $this->db->get('usuarios');
			return $query->result();
		}

		public function grabar($data)
		{
			$resultado = $this->db->insert("usuarios", $data);
			return $resultado;
		}

		public function get($id)
		{
			$this->db->where("id", $id);
			$query=$this->db->get("usuarios");
			return $query->row();
		}

		public function update($id, $data) 
		{
			$this->db->where("id", $id);
			$result = $this->db->update("usuarios", $data);
			return $result;
		}

		public function delete($id)
		{
		   $this->db->where('id', $id);
		   $query = $this->db->delete("usuarios");
		   return $query;
		}    


	}
?>