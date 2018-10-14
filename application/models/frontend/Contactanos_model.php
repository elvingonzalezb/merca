<?php
class Contactanos_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function grabarMensaje($data)
    {
        $resultado = $this->db->insert("contactenos", $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function sendMensaje($datos){
        $resultado = $this->db->insert('contactenos', $datos);
        return $resultado;
    }

 
      public function getMapa() {
            $this->db->order_by("id_mapa", "desc");
            $query = $this->db->get("mapa", 1);
            return $query->row_array();          
        }

}