<?php 
	class Nosotros_model extends CI_Model
	{
		function __construct() 
		{
			parent::__construct();
		}
	     public function getLista() 
        {
        	$this->db->where("state", '2');
            $query = $this->db->get('textos_web');
            return $query->result();
        }

        public function get($id)
		{
			$this->db->where("id", $id);
			$query=$this->db->get("textos_web");
			return $query->row();
		}

}
?>