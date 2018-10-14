<?php
class Bannerslateral extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion_mainpanel');
        $this->load->model('mainpanel/Bannerslateral_model');
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
        $datos2["current_section"] = "bannerslateral";        
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
        $dataPrincipal["cuerpo"]="bannerslateral/index_view";
        // LISTA BANNERS
        $dataPrincipal['banners'] = $this->Bannerslateral_model->getListaBanners();
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
        $datos2["current_section"] = "bannerslateral";        
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = '';
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
        $dataPrincipal["cuerpo"]="bannerslateral/edit_view";
        // EDIT BANNER
        $id_banner = $this->uri->segment(4);
        $resultado = $this->uri->segment(5);
        $banner = $this->Bannerslateral_model->getBanner($id_banner);
        $dataPrincipal['banner'] = $banner;
        $dataPrincipal["resultado"] = $resultado;
        $this->load->view("mainpanel/includes/template", $dataPrincipal);
    }
    
    public function actualizar() {
        $this->validacion_mainpanel->validacion_login();
        // EDITAR BANNER
        $id_banner  = $this->input->post('id_banner');
        $titulo     = $this->input->post('titulo');
        $enlace     = $this->input->post('enlace');
        $orden      = $this->input->post('orden');
        $target   = $this->input->post('target');
        $estado     = $this->input->post('estado');

        $data = array(
            'titulo'    => $titulo,
            'enlace'    => $enlace,
            'orden'     => $orden,
            'target'    => $target,
            'estado'    => $estado
            );
        
        $imgatng            = $this->input->post('imgatng'); 

        $name_image = date("YmdHis");
        
        $this->my_upload->upload($_FILES["banner"]);
        if ( $this->my_upload->uploaded == true  )
        {
            $this->my_upload->allowed               = array('image/*');
            $this->my_upload->file_new_name_body    = $name_image;
            $this->my_upload->image_resize          = true;
            $this->my_upload->image_ratio_crop      = true;
            $this->my_upload->image_x               = 270;
            $this->my_upload->image_y               = 434;
            $this->my_upload->process('./files/bannerlateral/');
            if ( $this->my_upload->processed == true )
            {
                $data['imagen'] = $this->my_upload->file_dst_name;
                $this->my_upload->clean();  
                @unlink('./files/bannerlateral/'.$imgatng);
            }
            else
            {
                $error = $this->my_upload->error;
                redirect('mainpanel/bannerslateral/edit/'.$id_banner.'/error/'.$error);
            }
        }
        else{}
        
        $this->Bannerslateral_model->updateBanner($id_banner, $data);

        redirect('mainpanel/bannerslateral/edit/'.$id_banner.'/success');
    }
    
    public function delete() {
        $this->validacion_mainpanel->validacion_login();
        $id_banner = $this->uri->segment(4);
        $banner = $this->Bannerslateral_model->getBanner($id_banner);
        $imagen=$banner->imagen;
        @unlink('files/bannerlateral/'.$imagen);
        $this->Bannerslateral_model->deleteBanner($id_banner);
        redirect('mainpanel/bannerslateral/listado/success');
    }
    
    public function nuevo() {
        $this->validacion_mainpanel->validacion_login();
        // GENERAL
        $theme = $this->config->item('admin_theme');
        $data['theme'] = $theme;
        $datos2 = array();
        $datos2["current_section"] = "bannerslateral";        
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = '';
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
        $dataPrincipal["cuerpo"]="bannerslateral/nuevo_view";
        // NUEVO BANNER
        $resultado = $this->uri->segment(4);
        if($resultado=="error")
        {
            $error = $this->uri->segment(5);
        }
        else
        {
            $error = '';
        }

        $dataPrincipal["orden"] = $this->Bannerslateral_model->ultimoBanner()->orden+1;

        $dataPrincipal["resultado"]= $resultado;
        $dataPrincipal["error"]= $error;
        $this->load->view("mainpanel/includes/template", $dataPrincipal);        
    }
    
    public function grabar() {
        $this->validacion_mainpanel->validacion_login();
        // GRABAR BANNER
              // EDITAR BANNER
        $id_banner  = $this->input->post('id_banner');
        $titulo     = $this->input->post('titulo');
        $enlace     = $this->input->post('enlace');
        $orden      = $this->input->post('orden');
        $target   = $this->input->post('target');
        $estado     = $this->input->post('estado');

        $data = array(
            'titulo'    => $titulo,
            'enlace'    => $enlace,
            'orden'     => $orden,
            'target'    => $target,
            'estado'    => $estado
            );
        
        $name_image = date("YmdHis");

        $this->my_upload->upload($_FILES["banner"]);
        if ( $this->my_upload->uploaded == true  )
        {
            $this->my_upload->allowed               = array('image/*');
            $this->my_upload->file_new_name_body    = $name_image;
            $this->my_upload->image_resize          = true;
            $this->my_upload->image_ratio_crop      = true;
            $this->my_upload->image_x               = 270;
            $this->my_upload->image_y               = 434;
            $this->my_upload->process('./files/bannerlateral/');
            if ( $this->my_upload->processed == true )
            {
                $data['imagen'] = $this->my_upload->file_dst_name;
                $this->my_upload->clean();
                $resultado = $this->Bannerslateral_model->grabarBanner($data);
                if($resultado==1)
                {
                    redirect('mainpanel/bannerslateral/listado/success');
                }
                else
                {
                    redirect('mainpanel/bannerslateral/nuevo/error/bd');
                }
            }
            else
            {
                $error = $this->my_upload->error;
                redirect('mainpanel/bannerslateral/nuevo/error/'.$error);
            }
        }
        else
        {
            $error = $this->my_upload->error;
            redirect('mainpanel/bannerslateral/nuevo/error/'.$error);
        }
    }

     public function homeTextos()
        {
            $this->validacion_mainpanel->validacion_login();
            // GENERAL
            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="inicio";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="bannerslateral/edit_textos_view";
   
            $generales = $this->Bannerslateral_model->getTextos($datos2["current_section"]);
            $dataPrincipal['generales'] = $generales;
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

      public function updateTextos()
        {
            $this->validacion_mainpanel->validacion_login();
            // EDITAR Clientes
            $data = array();
            $data["title"]         = $this->input->post("title");
            $data["description"]   = $this->input->post("description");
            $data["keywords"]      = $this->input->post("keywords");
            $id_seccion            = $this->input->post('id');

            $result=$this->Bannerslateral_model->updateTextosWeb($id_seccion, $data); 

           if($result==true)
            {
                $this->session->set_userdata("success",'Se procesó correctamente la información');
                redirect('mainpanel/bannerslateral/homeTextos');
            }
            else
            {
                $error='Ocurrió un error al procesar su información '.$error;
                $this->session->set_userdata("error",$error);
                redirect('mainpanel/bannerslateral/homeTextos');            
            } 
        }
}
?>