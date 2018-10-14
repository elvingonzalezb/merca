<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('getConfig'))
{
	function getConfig($llave) {
		$ci =& get_instance();
		$ci->db->select('valor');
		$ci->db->where('llave', $llave);
		$query = $ci->db->get('configuracion');
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->valor;
		}
		return 0;
	}
}

if ( ! function_exists('getCountPedido'))
{
    function getCountPedido($id_usuario) {
        $ci =& get_instance();
        $ci->db->select('COUNT(id_usuario) as total');
        $ci->db->where('id_usuario', $id_usuario);
        $query = $ci->db->get('pedidos');
        if ($query->num_rows() > 0){
            $row = $query->row();
            return $row->valor;
        }
        return 0;
    }
}

    function getBanners() {
		$ci =& get_instance();
        $ci->db->where('estado', 'A');
        $ci->db->order_by('orden');
        $query = $ci->db->get('banners');
		return $query->result_array();
	}



    function getBannerLateral() {
        $ci =& get_instance();
        $ci->db->where('estado', 'A');
        $ci->db->order_by('orden');
        $query = $ci->db->get('bannerslateral');
        return $query->result();

}

if ( ! function_exists('articulosFooter'))
{
    function articulosFooter() {
        $ci =& get_instance();
        $ci->db->where('state', '1');
        $ci->db->order_by('created');
        $ci->db->limit('3');
        $query = $ci->db->get('articulos');
        return $query->result();
        }
}

if ( ! function_exists('serviciosFooter'))
{
    function serviciosFooter() {
        $ci =& get_instance();
       $ci->db->where('state', '1');
        $ci->db->order_by('created');
        $ci->db->limit('9');
        $query = $ci->db->get('servicios');
        return $query->result();
        }
}

if ( ! function_exists('getCountCarrito')) {

    function getCountCarrito(){
        $data = array();
        $CI =& get_instance();
        $items = $CI->session->userdata('carrito_items');
        return count($items);
    }

}

if ( ! function_exists('getItemsCarrito'))

{

    function getItemsCarrito(){
        $data = array();
        $CI =& get_instance();
        $items = $CI->session->userdata('carrito_items');
        $itemsCar = getCountCarrito();
        //return count($items);
       $html = '';
        $html .= '<ul class="scrollbar" id="scroll-custom">';
           /* $html .= '<li><div class="backgroung-color-shopping">
                        <a href="cotizacion" class="" data-toggle="">
                            <div class="total-price-basket">
                                <div class="info-icons col-xs-4">
                                    <i class="fa fa-shopping-bag fa-3" aria-hidden="true"></i>
                                    <span class="count icono-carrito">'.$itemsCar.'</span>
                                </div>
                                <div class="col-xs-8">
                                    <span class="lbl item-color-shopping">Mi Pedido</span><br>
                                    <span>'.$itemsCar.' item(s)</span>
                                </div>
                            </div>
                        </a>
                    </div><div class="clearfix"></div></li>';*/
        if ($items) {
            $total = 0 ;
            foreach ($items as $key => $item) {
                $html .=    '<li>';
                $html .=    '<span class="item">';
                $html .=        '<span class="item-left">';
                $html .=            '<img alt="'.$item['item_nombre'].'" src="'.base_url('files/productos/thumbs/').$item['item_imagen'].'" class="img-responsive" width="50"/>';
                $html .=        '</span>';
                $html .=        '<span class="item-right">';
                $html .=            '<span class="item-info">';
                $html .=                '<span>'.ucwords(strtolower($item['item_nombre'])).'</span>';
                $html .=                '<span></span>';
                $html .=            '</span>';
                $html .=            '<a class="btn-carrito" onclick="javascript:deleteItem(\''.$item['item_carroID'].'\')">Eliminar</a>';
                $html .=        '</span>';
                $html .=    '</span>';
                $html .=    '</li>';
            }
            $html .= '<li class="divider"></li><li><a class="text-center" href="cotizacion">Ver Carrito</a></li>';
            $html .= '</ul>';
        }
        $html .= '</ul>';
        return $html;
    }
}

function formateaCadena($cadena) {
    $cadena = str_replace("á", "a", $cadena);
    $cadena = str_replace("é", "e", $cadena);
    $cadena = str_replace("í", "i", $cadena);
    $cadena = str_replace("ó", "o", $cadena);
    $cadena = str_replace("ú", "u", $cadena);
    $cadena = str_replace("Á", "A", $cadena);
    $cadena = str_replace("É", "E", $cadena);
    $cadena = str_replace("Í", "I", $cadena);
    $cadena = str_replace("Ó", "O", $cadena);
    $cadena = str_replace("Ú", "U", $cadena);
    $cadena = str_replace("ñ", "n", $cadena);
    $cadena = str_replace("Ñ", "N", $cadena);   
    $cadena = str_replace('"', "", $cadena);
    $cadena = str_replace("-", "", $cadena);
    $cadena = str_replace("¿", "", $cadena);
    $cadena = str_replace(",", "", $cadena);
    $cadena = str_replace("?", "", $cadena);
    $cadena = str_replace(" ", "-", $cadena);
    $cadena = str_replace("/", "-", $cadena);
    $cadena = str_replace(":", "-", $cadena);
    $cadena = str_replace("#", "N", $cadena);
    $cadena = str_replace("%", "", $cadena);
    $cadena = str_replace("'", "", $cadena);
    $cadena = str_replace("&", "", $cadena);                
    $cadena = str_replace("(", "", $cadena);
    $cadena = str_replace(")", "", $cadena);                
    $cadena = str_replace(",", "", $cadena);
    $cadena = str_replace(";", "", $cadena);                
    $cadena = strtolower($cadena);
    return $cadena;
}

function fixUrl($cadena) {
    $cadena = str_replace("á", "a", $cadena);
    $cadena = str_replace("é", "e", $cadena);
    $cadena = str_replace("í", "i", $cadena);
    $cadena = str_replace("ó", "o", $cadena);
    $cadena = str_replace("ú", "u", $cadena);
    $cadena = str_replace("Á", "A", $cadena);
    $cadena = str_replace("É", "E", $cadena);
    $cadena = str_replace("Í", "I", $cadena);
    $cadena = str_replace("Ó", "O", $cadena);
    $cadena = str_replace("Ú", "U", $cadena);
    $cadena = str_replace("ñ", "n", $cadena);
    $cadena = str_replace("Ñ", "N", $cadena);   
    $cadena = str_replace('"', "", $cadena);
    $cadena = str_replace("¿", "", $cadena);
    $cadena = str_replace(",", "", $cadena);
    $cadena = str_replace("?", "", $cadena);
    $cadena = str_replace(" ", "-", $cadena);
    $cadena = str_replace("/", "-", $cadena);
    $cadena = str_replace(":", "-", $cadena);
    $cadena = str_replace("#", "N", $cadena);
    $cadena = str_replace("%", "", $cadena);
    $cadena = str_replace("'", "", $cadena);
    $cadena = str_replace("&", "", $cadena);                
    $cadena = str_replace("(", "", $cadena);
    $cadena = str_replace(")", "", $cadena);                
    $cadena = str_replace(",", "", $cadena);
    $cadena = str_replace(";", "", $cadena);                
    $cadena = strtolower($cadena);
    return $cadena;
}

if ( ! function_exists('quitaAcentos'))
{
    function quitaAcentos($cadena) {
        $cadena = str_replace("á", "a", $cadena);
        $cadena = str_replace("é", "e", $cadena);
        $cadena = str_replace("í", "i", $cadena);
        $cadena = str_replace("ó", "o", $cadena);
        $cadena = str_replace("ú", "u", $cadena);
        $cadena = str_replace("Á", "A", $cadena);
        $cadena = str_replace("É", "E", $cadena);
        $cadena = str_replace("Í", "I", $cadena);
        $cadena = str_replace("Ó", "O", $cadena);
        $cadena = str_replace("Ú", "U", $cadena);
        return $cadena;
    }
}

if ( ! function_exists('fechaNumero'))
{
	function fechaNumero($fecha) {
		$aux = explode("-", $fecha);
		$agno = $aux[0];
		$mes = $aux[1];
		$dia = $aux[2];
		$formateada = $dia;
		return $formateada;
	}
}

if ( ! function_exists('fechaDiaLetras'))
{

  function fechaDiaLetras($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}
}

if ( ! function_exists('fechaMesLetras'))
{
function fechaMesLetras($fecha){
   $mes = array('ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $mes;
}
}

 function Ymd_2_dmY($fecha) {
        $aux = explode("-", $fecha);
        $agno = $aux[0];
        $mes = $aux[1];
        $dia = $aux[2];
        $formateada = $dia."-".$mes."-".$agno;
        return $formateada;
    }

    function dmYHora_2_Ymd($fecha) {
        $aux_0 = explode(" ", $fecha);
        $aux = explode("-", $aux_0[0]);
        $agno = $aux[2];
        $mes = $aux[1];
        $dia = $aux[0];
        $formateada = $agno."-".$mes."-".$dia;
        return $formateada;
    }

    function Ymd_2_dmYHora($fecha) {
        $aux_0 = explode(" ", $fecha);
        $aux = explode("-", $aux_0[0]);
        $agno = $aux[0];
        $mes = $aux[1];
        $dia = $aux[2];
        $formateada = $agno."-".$mes."-".$dia;
        return $formateada;
    }

    function YmdHora_2_dmY($fecha) {
            $aux_0 = explode(" ", $fecha);
            $aux = explode("-", $aux_0[0]);
            $agno = $aux[0];
            $mes = $aux[1];
            $dia = $aux[2];
            $formateada = $dia."-".$mes."-".$agno." ".$aux_0[1];
            return $formateada;
    }

    function YmdHora_2_dmYHora($fecha) {
        $aux_0 = explode(" ", $fecha);
        $aux = explode("-", $aux_0[0]);
        $agno = $aux[0];
        $mes = $aux[1];
        $dia = $aux[2];
        $formateada = $dia."-".$mes."-".$agno." ".$aux_0[1];
        return $formateada;
    }

    function conversorSegundosHoras($tiempo_en_segundos) {
        $horas = floor($tiempo_en_segundos / 3600);
        $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
        $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
        //return $horas . ':' . $minutos . ":" . $segundos;
        if($horas>48)
        {
            return '<span class="label label-success">'.$horas . ' h y ' . $minutos.' min.</span>';
        }
        else if( ($horas<48) && ($horas>24) )
        {
            return '<span class="label label-alerta">'.$horas . ' h y ' . $minutos.' min.</span>';
        }
        else
        {
            return '<span class="label label-peligro">'.$horas . ' h y ' . $minutos.' min.</span>';
        }
    }

    function dmY_2_Ymd($fecha) {
            $aux = explode("-", $fecha);
            $agno = $aux[2];
            $mes = $aux[1];
            $dia = $aux[0];
            $formateada = $agno."-".$mes."-".$dia;
            return $formateada;
    }

    function fecha_hoy_dmY() {
        $fecha = getdate();
        $dia = $fecha['mday'];
        if($dia<10) $dia="0".$dia;
        $mes = $fecha['mon'];
        if($mes<10) $mes="0".$mes;
        $agno = $fecha['year']; 
        $hoy = $dia."-".$mes."-".$agno;
        return $hoy;
    }

    function fecha_hoy_dmY2() {
        $fecha = getdate();
        $dia = $fecha['mday'];
        if($dia<10) $dia="0".$dia;
        $mes = $fecha['mon'];
        if($mes<10) $mes="0".$mes;
        $agno = $fecha['year']; 
        $hoy = $dia."/".$mes."/".$agno;
        return $hoy;
    }

    function fecha_hoy_Ymd() {
        $fecha = getdate();
        $dia = $fecha['mday'];
        if($dia<10) $dia="0".$dia;
        $mes = $fecha['mon'];
        if($mes<10) $mes="0".$mes;
        $agno = $fecha['year']; 
        $hoy = $agno."-".$mes."-".$dia;
        return $hoy;
    }

    function ValidRucPeru($ruc){
        $factor= "5432765432";
        $ruc= trim($ruc);
        if ( (!is_numeric($ruc)) || (strlen($ruc) != 11) ){
            return false;
        }  
        // verificar digitos iniciales
        $dig_valid= array("10", "20" ,"17", "15");
        $dig=substr($ruc, 0, 2);
        if (!in_array($dig, $dig_valid, true)) {
        return false;
        }
        
        $dig_verif= substr($ruc, 10, 1);       
        for ($i=0; $i < 10; $i++){
        $arr[]= substr($ruc, $i, 1) * substr($factor, $i, 1);
        }
        $suma=0;
        foreach($arr as $a){
        $suma= $suma + $a;
        }
        //Calculamos el residuo
        $residuo= round(($suma/11),1);
        $residuo= substr($residuo, -1);
        $resta= 11 - $residuo;
        $dig_verif_aux= substr($resta, -1);

        if ($dig_verif == $dig_verif_aux){
            return true;
        } else {
            return false;
        }
    }

    function RandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function tamano_archivo($peso , $decimales = 2 )
    {
        $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
        return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
    } 

    function VerificarDireccionCorreo($direccion)
    {
       $Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
       if(preg_match($Sintaxis,$direccion))
          return true;
       else
         return false;
    }

?>