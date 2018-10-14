<?php 
	class Servicios_model extends CI_Model
	{
		function __construct() 
		{
			parent::__construct();
		}
		public function getFotos() 
		{
			$sql = "SELECT id, imagen FROM servicios";
			$query = $this->db->query($sql);
			return $query->result();
		}

        public function getLista() 
        {
            $this->db->order_by('created', 'desc');
            $query = $this->db->get('servicios');
            return $query->result();
        }

		public function grabar($data)
		{
			$resultado = $this->db->insert("servicios", $data);
			$id = $this->db->insert_id();
            return $id;
		}

        public function get($id)
		{
			$this->db->where("id", $id);
			$query=$this->db->get("servicios");
			return $query->row();
		}

		public function update($id, $data) 
		{
			$this->db->where("id", $id);
			$result = $this->db->update("servicios", $data);
			return $result;
		}

		public function delete($id)
		{
		   $this->db->where('id', $id);
		   $query = $this->db->delete("servicios");
		   return $query;
		}
}
?>