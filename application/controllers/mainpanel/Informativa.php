<?php 
    class Informativa extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->library("validacion_mainpanel");
            $this->load->model("mainpanel/Informativa_model");
            $this->load->library('my_upload');
            $this->load->helper('generales_helper');
        }

        public function listado()
        {
            $this->validacion_mainpanel->validacion_login();
            // GENERAL
            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="informativa";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="informativa/index_view";
            $generales = $this->Informativa_model->getLista();
            $dataPrincipal["generales"] = $generales;
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

      public function edit($id_seccion)
        {
            $this->validacion_mainpanel->validacion_login();
            // GENERAL
            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();

            $datos2["current_section"] ='informativa';
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="informativa/edit_view";
   
            $generales = $this->Informativa_model->getTextos($id_seccion);
            $dataPrincipal['generales'] = $generales;
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

      public function actualizar()
        {
            $this->validacion_mainpanel->validacion_login();
            // EDITAR Clientes
            $data = array();
            $data["titulo"]        = $this->input->post("titulo");
            $data["url"]           = $this->input->post("url");
            $data["fulltext"]      = $this->input->post("fulltext");
            $data["state"]         = $this->input->post("state");
            $data["seccion"]       = $this->input->post("seccion");
            $data["title"]         = $this->input->post("title");
            $data["description"]   = $this->input->post("description");
            $data["keywords"]      = $this->input->post("keywords");
            $id_seccion            = $this->input->post('id');
            //$name_image = date("YmdHis");
            $this->my_upload->upload($_FILES["imagen"]);
            if ( $this->my_upload->uploaded == true  )
            {
                $this->my_upload->allowed               = array('image/*');
                //$this->my_upload->file_new_name_body  = $name_image;
                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 1280;
                $this->my_upload->image_y               = 565;
                $this->my_upload->process('./files/informativa/');

           
                if ($this->my_upload->processed == true )
                {
                    $data['imagen'] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error = $this->my_upload->error;
                    $this->session->set_userdata("error",'FOTO: '.$error);  
                    redirect('mainpanel/informativa/edit/'.$id_seccion); 
                }
            }
            $result=$this->Informativa_model->update($id_seccion, $data);

         
            if($result==true)
            {
                $this->session->set_userdata("success",'Se procesó correctamente la información');
                redirect('mainpanel/informativa/edit/'.$id_seccion);
            }
            else
            {
                $error='Ocurrió un error al procesar su información '.$error;
                $this->session->set_userdata("error",$error);
                redirect('mainpanel/informativa/edit/'.$id_seccion);            
            }  
        }
        
        public function borrar($id)
        {
            $this->validacion_mainpanel->validacion_login();
            $secciones= $this->Informativa_model->get($id);
            $imagen = $secciones->imagen;
                @unlink("files/textosweb/".$imagen);
                $result = $this->Informativa_model->delete($id);
            if($result==true)
            {
                $this->session->set_userdata("success", "Su información se procesó correctamente");
                redirect("mainpanel/informativa/listado");
            }
            else
            {
                $this->session->set_userdata("error", "Ocurrió un error al procesar su información");
                redirect("mainpanel/informativa/listado");
            }
        }

   

    }
?>