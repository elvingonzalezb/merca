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


        public function getTextosWeb($seccion) {
           $this->db->where('seccion', $seccion);
           $query = $this->db->get("textos_web");
           return $query->row();
        }

        public function grabarMensaje($data)
        {
            $resultado = $this->db->insert("contactenos", $data);
            $id = $this->db->insert_id();
            return $id;
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