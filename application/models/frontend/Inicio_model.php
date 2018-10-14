<?php
    class Inicio_model extends CI_Model {
       public function __construct()
        {
                parent::__construct();
        }

   public function getBanners(){

    $query = $this->db->select("id_banner,titulo, subtitulo, sumilla, boton, enlace,  imagen")

          ->from('banners')

          ->where('estado','A')

          ->order_by('orden')

          ->get()

          ->result();

    return $query;

  }
    public function getBannersLateral(){

    $query = $this->db->select("id_banner,titulo, orden, enlace, target, imagen")

          ->from('bannerslateral')

          ->where('estado','A')

          ->order_by('orden')

          ->get()

          ->result();

    return $query;

  }


      public function getLast_Art($limite) {
            $this->db->where('state', '1');
            $this->db->order_by("created", "desc");
            $query = $this->db->get("articulos", $limite, 0);
            return $query->result();
       }



      public function getTextosGenerales($seccion) {
           $this->db->where('seccion', $seccion);
           $query = $this->db->get("textos_web");
           return $query->row();
        }



      public function getProDestacados($limite) {
            $this->db->where('destacado', '1');
            $this->db->order_by("nom_producto", "desc");
            $query = $this->db->get("productos", $limite, 0);
            return $query->result();
       }

       public function getRubrosDestacados() {
            $sql = "SELECT a.id as id, a.url as url, a.rubro as rubro, a.imagen as imagen, count(*) as cuenta FROM rubros a INNER JOIN empresas b WHERE a.id=b.id_rubro AND a.estado='A' GROUP BY b.id_rubro ORDER BY cuenta DESC LIMIT 8";
            $query =  $this->db->query($sql);
            return $query->result();
        }
       public function getUltimasEmpresas($cant) {
            $sql = "SELECT a.id, a.nombre, a.url, a.logo, b.banner FROM empresas a
            INNER JOIN banners b
            WHERE a.id=b.id_empresa
                AND b.banner!=''
                AND b.banner!='no_banner.jpg'
            GROUP BY a.id
            ORDER BY a.fecha_ingreso
            DESC LIMIT $cant";
            $query = $this->db->query($sql);
            return $query->result();
        }


       public function getFechaFormateada($fecha) {
            $aux = explode(" ", $fecha);
            $aux2 = substr($fecha, 0, 10);
            $fecha = $aux2[0];
            $numeroDia = date('d', strtotime($fecha));
            $dia = date('l', strtotime($fecha));
            $mes = date('F', strtotime($fecha));
            $anio = date('Y', strtotime($fecha));
            $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
            $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
            $nombredia = str_replace($dias_EN, $dias_ES, $dia);
            $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
            $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
            return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
        }
        public function getCategoriasnoo() {
            $this->db->where('estado', 'A');
             $query = $this->db->get("categorias");
             return $query->result();
          }

        public function getCategorias() {
                 $this->db->where('estado', 'A');
                  $query = $this->db->get("categorias");
                  $result = $query->result();
                  $categorias = array();
                  foreach($result as $value)
                  {
                     $temp = array();
                     $temp['id'] = $value->id_categoria;
                     $temp['nom_cat'] = $value->nom_cat;
                     $temp['url'] = $value->url;
                     $temp['imagen'] = $value->imagen;
                     $temp['title'] = $value->title;
                     $temp['num_categorias'] = $this->numCategorias($value->id_categoria);
                     $temp['num_productos'] = $this->numProductos($value->id_categoria);
                     $categorias[] = $temp;
                  }
                  return $categorias;
               }

             public function numCategorias($id) {
                  $this->db->where('id_categoria', $id);
                  $query = $this->db->get("subcategorias");
                  return $query->num_rows();
             }

             public function numProductos($id) {
                  $this->db->where('id_categoria', $id);
                  $query = $this->db->get("productos");
                  return $query->num_rows();
             }


      }//END MODEL
?>
