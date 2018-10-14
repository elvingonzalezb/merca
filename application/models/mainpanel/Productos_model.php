<?php 
	class Productos_model extends CI_Model
	{
		function __construct() 
		{
			parent::__construct();
		}
		public function getFotos() 
		{
			$sql = "SELECT id, imagen FROM productos";
			$query = $this->db->query($sql);
			return $query->result();
		}

        public function getLista() 
        {
            $this->db->order_by('created', 'desc');
            $query = $this->db->get('productos');
            return $query->result();
        }

		public function grabar($data)
		{
			$resultado = $this->db->insert("productos", $data);
			$id = $this->db->insert_id();
            return $id;
		}

    	public function ultimo() 
		{
			$this->db->select_max("orden");
			$query=$this->db->get("productos");
			return $query->row_array();	
		}

		public function get($id)
		{
			$this->db->where("id", $id);
			$query=$this->db->get("productos");
			return $query->row();
		}

		public function update($id, $data) 
		{
			$this->db->where("id", $id);
			$result = $this->db->update("productos", $data);
			return $result;
		}

		public function delete($id)
		{
		   $this->db->where('id', $id);
		   $query = $this->db->delete("productos");
		   return $query;
		}


      

    
      

     
     

    

    

       

	}
?>