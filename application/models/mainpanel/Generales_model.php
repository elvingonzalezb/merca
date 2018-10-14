<?php
    class Generales_model extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getSeccion($seccion) {
            $this->db->where('seccion', $seccion);
            $query =  $this->db->get('textos_secciones');
            return $query->row();
        }

        public function update($seccion, $data) {
            $this->db->where('seccion', $seccion);
            $result = $this->db->update('textos_secciones', $data);
            return $result;
        }


        public function get($id)
        {
            $this->db->where("id", $id);
            $query=$this->db->get("textos_web");
            return $query->row();
        }

         public function getTextos($current_section)
        {
            $this->db->where("seccion", $current_section);
            $query=$this->db->get("textos_web");
            return $query->row();
        }
        
    
        public function updateTexto($id_seccion, $data) 
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