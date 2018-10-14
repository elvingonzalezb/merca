<?php
class Stock_model extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }
    public function getListado() {
        $query =  $this->db->get('stock');
        return $query->result();
    }
    public function grabar($data) {
        $resultado = $this->db->insert('stock', $data);
        return $resultado;
    }
    
    public function get($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('stock');
        return $query->row();
    } 

    public function update($id, $data) 
        {
            $this->db->where('id', $id);
            $result = $this->db->update("stock", $data);
            return $result;
    }   

    public function getColDel($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('stock');
        return $query->row();
    }  

    public function delete($id)
        {
           $this->db->where('id', $id);
           $query = $this->db->delete("stock");
           return $query;
        }
  }
?>
