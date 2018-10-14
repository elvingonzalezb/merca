<?php
class Colores_model extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }
    public function getListado() {
        $this->db->order_by('orden');
        $query =  $this->db->get('colores');
        return $query->result();
    }
    

    /* public function getListadoColores() {
            $this->db->order_by('orden');
            $query =  $this->db->get('colores');
            $resultado = $query->result();
            $cols = array();
            foreach ($resultado as $value) {
                $temp = array();
                $temp['id_color'] = $value->id_color;
                $temp['nombre_color'] = $value->nombre_color;
                $temp['codigo_color'] = $value->codigo_color;
                $temp['num_productos'] = $this->numProductos($value->id_color);
                $temp['orden'] = $value->orden;
                $temp['estado'] = $value->estado;
                $cols[] = $temp;
            }
            return $cols;
        }*/
    public function grabar($data) {
        $resultado = $this->db->insert('colores', $data);
        return $resultado;
    }

    public function numProductos($id) {
            $this->db->where('id', $id);
            $query =  $this->db->get('colores');
            return $query->num_rows();
        }

    public function getColor($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('colores');
        return $query->row();
    } 

    public function update($id, $data) 
        {
            $this->db->where('id', $id);
            $result = $this->db->update("colores", $data);
            return $result;
    }   

    public function getColDel($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('colores');
        return $query->row();
    }  

    public function delete($id)
        {
           $this->db->where('id', $id);
           $query = $this->db->delete("colores");
           return $query;
        }

    public function getNombreColor($id) {
        $this->db->select('nombre_color');
        $this->db->where('id', $id);
        $query =  $this->db->get('colores');
        return $query->row();
    }
  

}
?>
