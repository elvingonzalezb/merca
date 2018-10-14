<?php
class Colores extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion_mainpanel');
        $this->load->model('mainpanel/Colores_model');
        $this->load->library('My_upload');
    }
    
    public function index() {
        $this->validacion_mainpanel->validacion_login();
    }


    
    public function listado()
        {
            $this->validacion_mainpanel->validacion_login();
            
            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="colores";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="colores/index_view";
            $dataPrincipal['listado'] = $this->Colores_model->getListado();
          
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

    public function nuevo() {
            $this->validacion_mainpanel->validacion_login();
          
            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] = "colores";        
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = '';
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="colores/nuevo_view";
           
            $this->load->view("mainpanel/includes/template", $dataPrincipal);        
        }

    public function grabar()
        {
            $this->validacion_mainpanel->validacion_login();
            
            $data["nombre_color"]  = $this->input->post("nombre_color");
            $data["codigo_color"]  = "#". $this->input->post("codigo_color");
            $data["orden"]         = $this->input->post('orden');
            $data["estado"]        = $this->input->post("estado");
        
            $result = $this->Colores_model->grabar($data);

            if($result>0)
            {
                $this->session->set_userdata("success", "Se proceso correctamente la información");
                redirect("mainpanel/colores/listado");
            }
            else
            {
                $error="Ocurrio un error al procesar la información";
                $this->session->set_userdata("error", $error);
                redirect("mainpanel/colores/nuevo");
            }
        }

    public function edit($id) {
            $this->validacion_mainpanel->validacion_login();
          
            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] = "colores";        
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = '';
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="colores/edit_view";
          
            $id = $this->uri->segment(4);
            $dataPrincipal['color'] = $this->Colores_model->getColor($id);
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }
        
       
         public function actualizar()
        {
            $this->validacion_mainpanel->validacion_login();
           
            $data = array();
            $data["nombre_color"]  = $this->input->post("nombre_color");
            $data["codigo_color"]  = "#". $this->input->post("codigo_color");
            $data["orden"]         = $this->input->post('orden');
            $data["estado"]        = $this->input->post("estado");
            $id                    = $this->input->post('id');
         
            $result=$this->Colores_model->update($id, $data);
                  
            if($result>0)
            {
                $this->session->set_userdata("success",'Se procesó correctamente la información');
                redirect('mainpanel/colores/listado/'.$id);
            }
            else
            {
                $error='Ocurrió un error al procesar su información '.$error;
                $this->session->set_userdata("error",$error);
                redirect('mainpanel/colores/edit/'.$id);            
            }   
        }
        
        public function borrar($id)
        {
            $this->validacion_mainpanel->validacion_login();
            
            $secciones= $this->Colores_model->getColDel($id);
          
          
            $result = $this->Colores_model->delete($id);
            if($result>0)
            {
                $this->session->set_userdata("success", "Su información se procesó correctamente");
                redirect("mainpanel/colores/listado");
            }
            else
            {
                $this->session->set_userdata("error", "Ocurrió un error al procesar su información");
                redirect("mainpanel/colores/listado");
            }
        }
}
?>
