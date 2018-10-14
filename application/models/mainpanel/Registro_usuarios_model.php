<?php 
	class Registro_usuarios_model extends CI_Model
	{
		function __construct() 
		{
			parent::__construct();
		}

		public function getLista() 
		{
			$query = $this->db->get('registro_usuarios');
			return $query->result();
		}

		public function grabar($data)
		{
			$resultado = $this->db->insert("registro_usuarios", $data);
			return $resultado;
		}

		public function get($id)
		{
			$this->db->where("id", $id);
			$query=$this->db->get("registro_usuarios");
			return $query->row();
		}

		public function update($id, $data) 
		{
			$this->db->where("id", $id);
			$result = $this->db->update("registro_usuarios", $data);
			return $result;
		}

		public function delete($id)
		{
		   $this->db->where('id', $id);
		   $query = $this->db->delete("registro_usuarios");
		   return $query;
		}    


	}
?>