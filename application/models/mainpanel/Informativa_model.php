<?php 
    class Informativa_model extends CI_Model
    {
        function __construct() 
        {
            parent::__construct();
        }
        public function getFotos() 
        {
            $sql = "SELECT id, imagen FROM textos_web";
            $query = $this->db->query($sql);
            return $query->result();
        }

        public function getLista() 
        {
            $this->db->where("state", '3');
            $query = $this->db->get('textos_web');
            return $query->result();
        }

        public function grabar($data)
        {
            $resultado = $this->db->insert("textos_web", $data);
            $id = $this->db->insert_id();
            return $id;
        }

        public function get($id)
        {
            $this->db->where("id", $id);
            $query=$this->db->get("textos_web");
            return $query->row();
        }

         public function getTextos($id_seccion)
        {
            $this->db->where("id", $id_seccion);
            $query=$this->db->get("textos_web");
            return $query->row();
        }
        
    
        public function update($id_seccion, $data) 
        {
            $this->db->where("id", $id_seccion);
            $result = $this->db->update("textos_web", $data);
            return $result;
        }

        public function delete($id)
        {
           $this->db->where('id', $id);
           $query = $this->db->delete("textos_web");
           return $query;
        }
}
?>