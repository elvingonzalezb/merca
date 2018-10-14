<?php
class Datos extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion_mainpanel');
        $this->load->model('mainpanel/Datos_model');
        $this->load->library('my_upload');
    }
    
    public function index() {
        $this->validacion_mainpanel->validacion_login();
    }
    
    public function edit() {
        $this->validacion_mainpanel->validacion_login();
        $id_usuario = $this->session->userdata('id_admin');
        // GENERAL
        $theme = $this->config->item('admin_theme');
        $data['theme'] = $theme;
        $datos2 = array();
        $datos2["current_section"] = "datos";        
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = '';
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
        $dataPrincipal["cuerpo"]="datos/edit_view";
        // EDIT 
        $dataPrincipal['datos'] = $this->Datos_model->get($id_usuario);
        $this->load->view("mainpanel/includes/template", $dataPrincipal);
    }
    
    public function actualizar() {
       $this->validacion_mainpanel->validacion_login();
        // EDITAR BANNER
        $id = $this->session->userdata('id_admin');
        $nombre = $this->input->post('nombre');
        $usuario     = $this->input->post('usuario');
        $password = $this->input->post('password');

        $data = array(
            'nombre' => $nombre,
            'usuario' => $usuario,
            'password' => $password
            );
        
        // ACTUALIZAMOS LA INSTITUCION
        $r = $this->Datos_model->update($id, $data);
        if($r)
        {
            $this->session->set_userdata("resultado", "exito");
            $msg = 'Su información se actualizó correctamente.';
            $this->session->set_userdata("mensaje", $msg); 
        }
        else
        {
            $this->session->set_userdata("resultado", "error");
            $msg = 'Ocurrio un error y su información no se pudo actualizar';
            $this->session->set_userdata("mensaje", $msg);                
            
        }
        redirect('mainpanel/datos/edit');
    }
}
?>