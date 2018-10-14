<?php
class Stock extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion_mainpanel');
        $this->load->model('mainpanel/Stock_model');
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
            $datos2["current_section"] ="stock";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="stock/index_view";
            $dataPrincipal['listado'] = $this->Stock_model->getListado();
          
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

        public function nuevo()
        {
            $this->validacion_mainpanel->validacion_login();
          
            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="stock";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="stock/nuevo_view";
          
        
             
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }
        public function grabar()
        {
            $this->validacion_mainpanel->validacion_login();
            
            $data["titulo"]    = $this->input->post("titulo");
            $data["fecha"]    = $this->input->post("fecha");
            
                   
            $this->my_upload->upload($_FILES["imagen"]);
            if($this->my_upload->uploaded == true)
            {
                $this->my_upload->allowed               = array('image/*');
              
                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 300;
                $this->my_upload->image_y               = 400;
                $this->my_upload->process('./files/stock/');
                
                        
               
                if($this->my_upload->processed == true)
                {
                    $data["imagen"] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error= $this->my_upload->error;
                    $this->session->set_userdata("error", 'IMAGEN:'.$error);
                    redirect("mainpanel/stock/listado");
                }
            }

                    $this->my_upload->upload($_FILES["archivo"]);
                if($this->my_upload->uploaded == true)
                {
                                           
                    $this->my_upload->process('./files/stock/');
                    
                    if($this->my_upload->processed == true)
                    {
                        $data["archivo"] = $this->my_upload->file_dst_name;
                        $this->my_upload->clean();
                    }
                    else
                    {
                        $error= $this->my_upload->error;
                        $this->session->set_userdata("error", 'ARCHIVO:'.$error);
                        redirect("mainpanel/stock/listado");
                    }
                }



            else
            {
            }
            $last_id = $this->Stock_model->grabar($data);


            if($last_id>0)
            {
                $this->session->set_userdata("success", "Se proceso correctamente la información");
                redirect("mainpanel/stock/listado");
            }
            else
            {
                $error="Ocurrio un error al procesar la información";
                $this->session->set_userdata("error", $error);
                redirect("mainpanel/stock/listado");
            }
        }



    public function edit($id)
        {
            $this->validacion_mainpanel->validacion_login();
          
            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="stock";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="stock/edit_view";
          
            $stock = $this->Stock_model->get($id);
            $dataPrincipal['stock'] = $stock;
             
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }
        
       
        public function actualizar()
        {
            $this->validacion_mainpanel->validacion_login();
           
            $data = array();
            $data["fecha"]    = $this->input->post("fecha");
            $data["titulo"]    = $this->input->post("titulo");
            $id_stock         = $this->input->post('id');

                $this->my_upload->upload($_FILES["imagen"]);
            if ( $this->my_upload->uploaded == true  )
            {
                $this->my_upload->allowed               = array('image/*');
               
                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 300;
                $this->my_upload->image_y               = 400;
                $this->my_upload->process('./files/stock/');
           
              
                if ($this->my_upload->processed == true )
                {
                    $data['imagen'] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error = $this->my_upload->error;
                    $this->session->set_userdata("error",'FOTO: '.$error);  
                    redirect("mainpanel/stock/listado");
                }
            }


          
             $this->my_upload->upload($_FILES["archivo"]);
            if($this->my_upload->uploaded == true)
            {
                
                          
                $this->my_upload->process('./files/stock/');
                
                if($this->my_upload->processed == true)
                {
                    $data["archivo"] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error= $this->my_upload->error;
                    $this->session->set_userdata("error", 'ARCHIVO:'.$error);
                    redirect("mainpanel/stock/listado");
                }
            }
            else
            {
            }

            $result=$this->Stock_model->update($id_stock, $data);
        
            if($result==true)
            {
                $this->session->set_userdata("success",'Se procesó correctamente la información');
                redirect('mainpanel/stock/listado');
            }
            else
            {
                $error='Ocurrió un error al procesar su información '.$error;
                $this->session->set_userdata("error",$error);
                redirect('mainpanel/stock/listado');            
            }  
        }
        
        
 }
?>
