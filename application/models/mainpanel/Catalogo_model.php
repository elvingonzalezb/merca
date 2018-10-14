<?php
class Catalogo_model extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }

    ////////////////////BEGIN CATEGORIAS///////////////
    ////////////////////BEGIN CATEGORIAS///////////////
   ////////////////////BEGIN CATEGORIAS/////////////// 
    public function categorias() {
            $this->db->order_by('nom_cat');
            $query = $this->db->get('categorias');
            return $query->result();
        } 

    public function getListaCategorias() {
        $this->db->select('id_categoria, nom_cat');
        $this->db->order_by('orden');
        $query =  $this->db->get('categorias');
        return $query->result();
    }

    public function getListadoCategorias() {
            $this->db->order_by('id_categoria');
            $query =  $this->db->get('categorias');
            $resultado = $query->result();
            $cats = array();
            foreach ($resultado as $value) {
                $temp = array();
                $temp['id_categoria'] = $value->id_categoria;
                $temp['imagen'] = $value->imagen;
                $temp['nom_cat'] = $value->nom_cat;
                $temp['numSubCategorias'] = $this->numSubCategorias($value->id_categoria);
                $temp['orden'] = $value->orden;
                $temp['estado'] = $value->estado;
                $cats[] = $temp;
            }
            return $cats;
        }

    public function numProductos($id_categoria) {
            $this->db->where('id_categoria', $id_categoria);
            $query =  $this->db->get('productos');
            return $query->num_rows();
        }
    public function numProductosSubCat($id_subcategoria) {
            $this->db->where('id_subcategoria', $id_subcategoria);
            $query =  $this->db->get('productos');
            return $query->num_rows();
        }    

    public function numSubCategorias($id_categoria) {
            $this->db->where('id_categoria', $id_categoria);
            $query =  $this->db->get('subcategorias');
            return $query->num_rows();
        }    

    public function getCategoria($id_categoria) {
        $this->db->where('id_categoria', $id_categoria);
        $query =  $this->db->get('categorias');
        return $query->row();
    }   
    
    public function grabarCategoria($data) {
        $resultado = $this->db->insert('categorias', $data);
        return $resultado;
    }

    public function updateCategoria($id_categoria, $data) 
        {
             $this->db->where('id_categoria', $id_categoria);
            $result = $this->db->update("categorias", $data);
            return $result;
        }

    public function getCatDel($id_categoria) {
        $this->db->where('id_categoria', $id_categoria);
        $query =  $this->db->get('categorias');
        return $query->row();
    }  

    public function deleteCategoria($id_categoria)
        {
           $this->db->where('id_categoria', $id_categoria);
           $query = $this->db->delete("categorias");
           return $query;
        }

    public function getNombreCategoria($id_categoria) {
        $this->db->select('nom_cat');
        $this->db->where('id_categoria', $id_categoria);
        $query =  $this->db->get('categorias');
        return $query->row();
    }
 
    //////////////////////////BEGIN SUBCATEGORIAS /////////////////////////
    //////////////////////////BEGIN SUBCATEGORIAS /////////////////////////
    //////////////////////////BEGIN SUBCATEGORIAS /////////////////////////
    public function getSubId($id)
        {
            $this->db->where("id_subcategoria", $id);
            $query=$this->db->get("subcategorias");
            return $query->row();
        }

    public function Subcategorias() {
            $this->db->order_by('orden');
            $query =  $this->db->get('subcategorias');
            return $query->result();
        } 
    public function getSubCategoria($id_subcategoria) {
        $this->db->where('id_subcategoria', $id_subcategoria);
        $query =  $this->db->get('subcategorias');
        return $query->row();
    } 

    public function getListaSubCategorias() {
            $this->db->order_by('id_subcategoria');
            $query =  $this->db->get('subcategorias');
            $resultado = $query->result();
            $cats = array();
            foreach ($resultado as $value) {
                $temp = array();
                $temp['id_subcategoria'] = $value->id_subcategoria;
                $temp['id_categoria'] = $value->id_categoria;
                $temp['nombre'] = $value->nombre;
                $temp['imagen'] = $value->imagen;
                $temp['num_productos'] = $this->numProductosSubCat($value->id_subcategoria);
                $temp['orden'] = $value->orden;
                $temp['estado'] = $value->estado;
                $cats[] = $temp;
            }
            return $cats;
        }

    public function getListaSubCategoriasFilter($id_categoriafilter) {
            $this->db->order_by('id_subcategoria');
            $this->db->where('id_categoria', $id_categoriafilter);
            $query =  $this->db->get('subcategorias');
            $resultado = $query->result();
            $cats = array();
            foreach ($resultado as $value) {
                $temp = array();
                $temp['id_subcategoria'] = $value->id_subcategoria;
                $temp['id_categoria'] = $value->id_categoria;
                $temp['nombre'] = $value->nombre;
                $temp['imagen'] = $value->imagen;
                $temp['num_productos'] = $this->numProductosSubCat($value->id_subcategoria);
                $temp['orden'] = $value->orden;
                $temp['estado'] = $value->estado;
                $cats[] = $temp;
            }
            return $cats;
        }    

    public function grabarSubCategoria($data) {
        $resultado = $this->db->insert('subcategorias', $data);
        return $resultado;
    }

    public function updateSubCategoria($id_subcategoria, $data) 
        {
            $this->db->where("id_subcategoria", $id_subcategoria);
            $result = $this->db->update("subcategorias", $data);
            return $result;
        }

    public function getSubCatDel($id_subcategoria) {
        $this->db->where('id_subcategoria', $id_subcategoria);
        $query =  $this->db->get('subcategorias');
        return $query->row();
    }  

    public function deleteSubCategoria($id_subcategoria)
        {
           $this->db->where('id_subcategoria', $id_subcategoria);
           $query = $this->db->delete("subcategorias");
           return $query;
        }

  //////////////////////////BEGIN PRODUCTOS /////////////////////////
  //////////////////////////BEGIN PRODUCTOS /////////////////////////
  //////////////////////////BEGIN PRODUCTOS /////////////////////////
      
    public function getFotos() 
        {
            $sql = "SELECT id, imagen FROM productos";
            $query = $this->db->query($sql);
            return $query->result();
        }


    public function getLista() 
        {
            $this->db->order_by('orden', 'desc');
            $query = $this->db->get('productos');
            return $query->result();
        }

    public function getListaFilterCat($id_filter) 
        {
            $this->db->where('id_categoria', $id_filter);
            $query = $this->db->get('productos');
            return $query->result();
        }

    public function getListaFilterSubCat($id_filter) 
        {
            $this->db->where('id_subcategoria', $id_filter);
            $query = $this->db->get('productos');
            return $query->result();
        }

    public function getProductoColor($id) {
        $this->db->where('id_producto', $id);
        $query =  $this->db->get('productos_x_color');
        return $query->result();
    } 
    
    public function getColor($id_color) {
        $this->db->where('id', $id_color);
        $query =  $this->db->get('colores');
       return $query->row();
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

 
    public function getProductos($id_producto) {
        $this->db->where('id', $id_producto);
        $query =  $this->db->get('productos');
        return $query->row();
    }  

    public function update($id, $data) 
        {
            $this->db->where("id", $id);
            $result = $this->db->update("productos", $data);
            return $result;
        }

    public function getProDel($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('productos');
        return $query->row();
    }  

    public function delete($id)
        {
           $this->db->where('id', $id);
           $query = $this->db->delete("productos");
           return $query;
        }
  //////////////////////////BEGIN VARIEDAD DE COLORES /////////////////////////
  //////////////////////////BEGIN VARIEDAD DE COLORES /////////////////////////
  //////////////////////////BEGIN VARIEDAD DE COLORES /////////////////////////
      
    public function colores() {
            $query =  $this->db->get('colores');
            return $query->result();
        }

    public function getListaColor() 
        {
            $query = $this->db->get('productos_x_color');
            return $query->result();
        }

    public function getListaFilterCol($id_filter) 
        {
            $this->db->where('id_categoria', $id_filter);
            $query = $this->db->get('productos_x_color');
            return $query->result();
        }

    
    public function grabarColor($data)
        {
        $resultado = $this->db->insert('productos_x_color', $data);
        return $resultado;
        }


    public function ultimoColor() 
        {
            $this->db->select_max("orden");
            $query=$this->db->get("productos_x_color");
            return $query->row_array(); 
        }

 
    public function getColores($id_producto) {
        $this->db->where('id', $id_producto);
        $query =  $this->db->get('productos_x_color');
        return $query->row();
    }  

    public function updateColores($id, $data) 
        {
            $this->db->where("id", $id);
            $result = $this->db->update("productos_x_color", $data);
            return $result;
        }

    public function getidProd($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('productos_x_color');
        return $query->row();
    }  

    public function deleteColor($id_prodxcolor)
        {
           $this->db->where('id', $id_prodxcolor);
           $query = $this->db->delete("productos_x_color");
           return $query;
        }

  public function subCategoriasFilter($id_categoria) {
        $this->db->select('id_subcategoria, nombre');
        $this->db->where('id_categoria', $id_categoria);
        $this->db->order_by('nombre');
        $query =  $this->db->get('subcategorias');
        return $query->result();
    }


    public function productosFilter($id_subcategoria) {
        $this->db->select('id, nom_producto');
        $this->db->where('id_subcategoria', $id_subcategoria);
        $this->db->order_by('nom_producto');
        $query =  $this->db->get('productos');
        return $query->result();
    }
     


    }
?>