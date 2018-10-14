<?php
    class Productos_model extends CI_Model {
    public function __construct()
        {
                parent::__construct();
        }

    public function getProUltFecha() {
            $this->db->order_by("id", "desc");
            $query = $this->db->get("productos", 1);
            return $query->row();
        }
    public function getProductos($id) {
            $this->db->where('id', $id);
            $query =  $this->db->get('productos');
            return $query->row();
        }

    public function getCategorias($limite) {
            $this->db->where('estado', 'A');
            $query =  $this->db->get("categorias", $limite, 0);
            return $query->result();
        }

    public function getLastProductos($limite) {
            $this->db->where('state', '1');
            $this->db->order_by("nom_producto", "desc");
            $query = $this->db->get("productos", $limite, 0);
            return $query->result();
       }

    public function Productos($limite) {
            $this->db->order_by("nom_producto", "desc");
            $query = $this->db->get("productos", $limite, 0);
            return $query->result();
       }

    public function getProDestacados($limite) {
            $this->db->where('destacado', '1');
            $this->db->order_by("nom_producto", "desc");
            $query = $this->db->get("productos", $limite, 0);
            return $query->result();
       }

        public function getProRelacionados($id_subcategoria, $limite) {
            $this->db->where('id_subcategoria', $id_subcategoria);
            $this->db->order_by("nom_producto", "desc");
            $query = $this->db->get("productos", $limite, 0);
            return $query->result();
       }


    public function getProductosDestacados() {
            $sql = "SELECT a.id as id, a.url as url, a.articulo as articulo,
            a.imagen as imagen, count(*) as cuenta FROM productos
            a INNER JOIN categorias b
            WHERE a.id=b.id_categoria AND a.estado='A'
            GROUP BY b.id_categoria
            ORDER BY cuenta
            DESC LIMIT 8";
            $query =  $this->db->query($sql);
            return $query->result();
        }

    public function numTotalProductos() {
         $this->db->where('state', '1');
        $this->db->order_by('nom_producto');
        $query =  $this->db->get('productos');
        return $query->num_rows();
    }

    public function getProductosxPagina($inicio, $limite) {
        $this->db->where('state', '1');
        $this->db->order_by('nom_producto');
        $this->db->limit($limite, $inicio);
        $query =  $this->db->get('productos');
        return $query->result();
    }
    public function getProdxSubcat($id_subcategoria) {
            $this->db->where('id_subcategoria', $id_subcategoria);
            $this->db->where('state', '1');
            $query =  $this->db->get("productos");
            return $query->result();
    }
    public function getListaFilterSubCat()
        {
            $this->db->where('state', '1');
            $this->db->order_by('nom_producto');
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

    public function getCodigoColor($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('colores');
       return $query->result();
    }

     public function getColorProductos($id_producto) {
             $sql = "SELECT px.id, px.id_producto, px.id_color,c.id as idcolor,c.nombre_color,c.codigo_color FROM productos_x_color px
            INNER JOIN colores c ON px.id_color = c.id
            WHERE px.id_producto=$id_producto";
            $query =  $this->db->query($sql);
            return $query->result();


        }
    //SUBCATEGORIAS////////
    public function getSubcat($id, $limite) {
            $this->db->where('id_categoria', $id);
            $this->db->where('estado', 'A');
            $query =  $this->db->get("subcategorias", $limite, 0);
            return $query->result();
    }  

    public function getNombreCategoria($id_categoria) {
      $this->db->select('nom_cat');
      $this->db->where('id_categoria', $id_categoria);
      $query =  $this->db->get('categorias');
     return $query->row();
  }


       }
?>
