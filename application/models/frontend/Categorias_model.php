<?php
    class Categorias_model extends CI_Model {
       public function __construct()
        {
                parent::__construct();
        }

       public function getBanners() {
            $query =  $this->db->get('banners');
            return $query->result();
        }
        
  
        
       public function getLastArticulos($limite) {
            $this->db->where('state', '1');
            $this->db->order_by("created", "desc");
            $query = $this->db->get("articulos", $limite, 0);
            return $query->result();
       }

       public function getServicios($limite) {
           $this->db->where('state', '1');
           $query = $this->db->get("servicios", $limite, 0);
           return $query->result();
        }
       
        public function getClientes($limite) {
           $this->db->where('state', '1');
           $query = $this->db->get("clientes", $limite, 0);
           return $query->result();
        }
        
        public function getTextosGenerales($seccion) {
           $this->db->where('seccion', $seccion);
           $query = $this->db->get("textos_web");
           return $query->row();
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

       public function getUltimasTransportes($cant) {
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
       }
?>