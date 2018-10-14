<?php
class Ajax_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getSubcategorias($id_categoria) {
            $this->db->where('id_categoria', $id_categoria);
            $this->db->order_by('orden');
            $query =  $this->db->get('subcategorias');
            return $query->result();
        }

    public function getProductos($id_subcategoria) {
            $this->db->where('id_subcategoria', $id_subcategoria);
            $this->db->order_by('orden');
            $query =  $this->db->get('productos');
            return $query->result();
        }
    
    public function getListaSubCategorias($id_categoria) {
        $this->db->select('id_subcategoria, nombre');
        $this->db->where('id_categoria', $id_categoria);
        $this->db->order_by('nombre');
        $query =  $this->db->get('subcategorias');
        return $query->result();
    }


    public function getListaProductos($id_subcategoria) {
        $this->db->select('id, nom_producto');
        $this->db->where('id_subcategoria', $id_subcategoria);
        $this->db->order_by('nom_producto');
        $query =  $this->db->get('productos');
        return $query->result();
    }
    
    public function getNombreCategoria($id_categoria) {
        $this->db->select('nombre_categoria');
        $this->db->where('id_categoria', $id_categoria);
        $query =  $this->db->get('categorias');
        return $query->row();
    }
    
    public function getNombreSubCategoria($id_subcategoria) {
        $this->db->select('nombre');
        $this->db->where('id_subcategoria', $id_subcategoria);
        $query =  $this->db->get('subcategorias');
        return $query->row();
    }

   
}
?>