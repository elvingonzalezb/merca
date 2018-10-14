<?php
class Servicios_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getServicios($limite) {
           $this->db->where('state', '1');
           $query = $this->db->get("servicios", $limite, 0);
           return $query->result();
        }

      public function getServiciosU($id) {
            $this->db->where('id', $id);
            $query =  $this->db->get('servicios');
            return $query->row();            
        }
           public function getLastServicios($limite) {
            $this->db->where('state', '1');
            $this->db->order_by("created", "desc");
            $query = $this->db->get("servicios", $limite, 0);
            return $query->result();
       }

       public function getArtServicios($limite) {
            $this->db->where('destacado', '1');
            $this->db->order_by("created", "desc");
            $query = $this->db->get("servicios", $limite, 0);
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