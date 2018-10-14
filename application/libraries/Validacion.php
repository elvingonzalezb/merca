<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class validacion {
    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
    }

    public function validacion_login(){
        if(!$this->CI->session->userdata('usermercasub_registrado'))
        {
            $url = base_url().'inicio';
            redirect($url);
        }
    }
    
   public function validacion_login_frontend(){
        if(!$this->CI->session->userdata('logueadocki'))
        {
            $url = base_url().'ingresar';
            redirect($url);
        }
    } 
     public function validacion_cliente(){
        if(!$this->CI->session->userdata('cliente')){
            redirect('ingresar');
        }
    }     
    
}
?>