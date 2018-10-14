<?php
class Configuracion extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion_mainpanel');
        $this->load->model('mainpanel/Configuracion_model');
        $this->load->library('my_upload');
    }

    public function index() {
          $this->validacion_mainpanel->validacion_login();
    }

    public function listado() {
          $this->validacion_mainpanel->validacion_login();
        // GENERAL
        $theme = $this->config->item('admin_theme');
        $data['theme'] = $theme;
        $datos2 = array();
        $datos2["current_section"] = "configuracion";
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
        $dataPrincipal["cuerpo"]="configuracion/index_view";
        // LISTA PARAMETROS
        $aux = $this->Configuracion_model->getListaParametros();
        $configuraciones = array();
        foreach($aux as $configuracion)
        {
            $aux2 = array();
            $aux2['id'] = $configuracion->id;
            $aux2['llave'] = $configuracion->llave;
            $aux2['valor'] = $configuracion->valor;
            $aux2['descripcion'] = $configuracion->descripcion;
            $configuraciones[] = $aux2;
        }
        $dataPrincipal['configuraciones'] = $configuraciones;
        $resultado = $this->uri->segment(4);
        $dataPrincipal["resultado"] = $resultado;
        $this->load->view("mainpanel/includes/template", $dataPrincipal);
    }


    public function edit() {
          $this->validacion_mainpanel->validacion_login();
        // GENERAL
        $theme = $this->config->item('admin_theme');
        $data['theme'] = $theme;
        $datos2 = array();
        $datos2["current_section"] = "configuracion";
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = '';
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
        $dataPrincipal["cuerpo"]="configuracion/edit_view";
        // EDIT CLIENTE
        $id_configuracion = $this->uri->segment(4);
        $resultado = $this->uri->segment(5);
        $configuracion = $this->Configuracion_model->getConfiguracion($id_configuracion);
        $dataPrincipal['configuracion'] = $configuracion;
        $dataPrincipal["resultado"] = $resultado;
        $this->load->view("mainpanel/includes/template", $dataPrincipal);
    }

    public function actualizar() {
          $this->validacion_mainpanel->validacion_login();
        $data = array();
        // EDITAR CLIENTE
        $id_configuracion = $this->input->post('id_configuracion');
        $tipo = $this->Configuracion_model->getConfiguracion($id_configuracion)->tipo;
        if($tipo!=3){
            $valor = $this->input->post('valor');
            $data['valor'] = $valor;
        }
        if(($tipo==3)){
            $old_img = $this->input->post('old_img');
            $this->my_upload->upload($_FILES["valor"]);
            if ( ($this->my_upload->uploaded == true))
            {
                $this->my_upload->allowed          = array('image/*');
                $this->my_upload->image_resize     = true;
                $this->my_upload->image_ratio_crop = true;
                $this->my_upload->image_x          = 700;
                $this->my_upload->image_y          = 700;

                $this->my_upload->process('./assets/frontend/img/');
                if ( $this->my_upload->processed == true ) {
                    $data['valor'] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                    @unlink('./assets/frontend/img/'.$old_img);

                } else {
                    $error = $this->my_upload->error;
                }
            }
        }

        $resultado=$this->Configuracion_model->updateConfiguracion($id_configuracion, $data);
        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
        }else{
            $error = 'Ocurrió un error al procesar su información '. $error;
            $this->session->set_userdata("error",$error);
        }
        redirect('mainpanel/configuracion/edit/'.$id_configuracion.'/success');
    }



    public function detalle() {

          $this->validacion_mainpanel->validacion_login();

        // GENERAL

        $theme = $this->config->item('admin_theme');

        $data['theme'] = $theme;

        $datos2 = array();

        $datos2["current_section"] = "configuracion";

        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);

        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);

        $data['modal'] = '';

        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);

        $dataPrincipal['cuerpo']="configuraciones/detalle";

        // DETALLE DE CLIENTE

        $id_configuracion = $this->uri->segment(4);

        $configuracion= $this->Configuracion_model->getCliente($id_configuracion);

        $dataPrincipal['cliente'] = $configuracion;

        $this->load->view("mainpanel/includes/template", $dataPrincipal);

    }



}

?>
