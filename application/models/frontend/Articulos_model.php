<?php
    class Articulos_model extends CI_Model {
       public function __construct()
        {
                parent::__construct();
        }

        public function getArtUltFecha() {
            $this->db->order_by("id", "desc");
            $query = $this->db->get("articulos", 1);
            return $query->row();          
        }
        public function getArticulos($id) {
            $this->db->where('id', $id);
            $query =  $this->db->get('articulos');
            return $query->row();            
        }
        
       public function getCategorias($limite) {
            $this->db->where('estado', 'A');
            $query =  $this->db->get("categorias_articulos", $limite, 0);
            return $query->result();
        }
        
       public function getLastArticulos($limite) {
            $this->db->where('state', '1');
            $this->db->order_by("created", "desc");
            $query = $this->db->get("articulos", $limite, 0);
            return $query->result();
       }

       public function getArtDestacados($limite) {
            $this->db->where('destacado', '1');
            $this->db->order_by("created", "desc");
            $query = $this->db->get("articulos", $limite, 0);
            return $query->result();
       }

     public function getArticulosDestacados() {
            $sql = "SELECT a.id as id, a.url as url, a.articulo as articulo, 
            a.imagen as imagen, count(*) as cuenta FROM articulos 
            a INNER JOIN categorias b 
            WHERE a.id=b.id_categoria AND a.estado='A' 
            GROUP BY b.id_categoria 
            ORDER BY cuenta 
            DESC LIMIT 8";
            $query =  $this->db->query($sql);
            return $query->result();
        }

      public function numTotalArticulos() {
         $this->db->where('state', '1');
        $this->db->order_by('created');
        $query =  $this->db->get('articulos');
        return $query->num_rows();
    }

    public function getArticulosxPagina($inicio, $limite) {
        $this->db->where('state', '1');
        $this->db->order_by('created');
        $this->db->limit($limite, $inicio);
        $query =  $this->db->get('articulos');
        return $query->result();
    }

         

 
       }
?>