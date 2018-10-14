<?php 
	class Articulos extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library("validacion_mainpanel");
			$this->load->model("mainpanel/Generales_model");
			$this->load->model("mainpanel/Articulos_model");
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
	        $datos2["current_section"] ="articulos";
	        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
	        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
	        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
	        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
	        $dataPrincipal["cuerpo"]="articulos/index_view";
	        $noticias = $this->Articulos_model->getLista();
	        $dataPrincipal["noticias"] = $noticias;
	        $this->load->view("mainpanel/includes/template", $dataPrincipal);
		}

		public function nuevo()
		{			
	        $this->validacion_mainpanel->validacion_login();
	        // GENERAL
	        $theme = $this->config->item('admin_theme');
	        $data['theme'] = $theme;
	        $datos2 = array();
	        $datos2["current_section"] ="articulos";
	        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
	        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
	        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
	        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
	        $dataPrincipal["cuerpo"]="articulos/nuevo_view";
	        $dataPrincipal["categorias"] = $this->Articulos_model->categorias();
	       
			$this->load->view("mainpanel/includes/template", $dataPrincipal);
		}

		public function grabar()
		{
			$this->validacion_mainpanel->validacion_login();
			// grabar los datos
	
			$data["titulo"]	   	   = $this->input->post("titulo");
			$data["url"]  		   = $this->input->post("url");
			$data["introtext"] 	   = $this->input->post("introtext");
			$data["fulltext"] 	   = $this->input->post("fulltext");
			$data["state"]         = $this->input->post("state");
			$data["created"] 	   = dmY_2_Ymd($this->input->post("created"));
			$data["destacado"]         = $this->input->post("destacado");  
			$data["id_autor"]      = $this->session->userdata('id_admin');
			$data["title"]   = $this->input->post("title");
			$data["description"]        = $this->input->post("description");
			$data["keywords"]        = $this->input->post("keywords");
			//$name_image = date("YmdHis");
			$this->my_upload->upload($_FILES["imagen"]);
			if($this->my_upload->uploaded == true)
			{
	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 370;
	            $this->my_upload->image_y          		= 275;
				$this->my_upload->process('./files/articulos/');
				
				$this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 780;
	            $this->my_upload->image_y          		= 460;
	            $this->my_upload->process('./files/articulos/grandes');
	            
	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 200;
	            $this->my_upload->image_y          		= 120;
				$this->my_upload->process('./files/articulos/medianas/');
				
				$this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 100;
	            $this->my_upload->image_y          		= 100;
	            $this->my_upload->process('./files/articulos/pequeñas/');
	            
	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 80;
	            $this->my_upload->image_y          		= 55;
	            $this->my_upload->process('./files/articulos/thumbs/');
	            if($this->my_upload->processed == true)
	            {
	            	$data["imagen"] = $this->my_upload->file_dst_name;
	            	$this->my_upload->clean();
	            }
	            else
	            {
	            	$error= $this->my_upload->error;
	            	$this->session->set_userdata("error", 'IMAGEN:'.$error);
	            	redirect("mainpanel/articulos/nuevo");
	            }
			}
			else
			{
	     	}
	        $last_id = $this->Articulos_model->grabar($data);

	      
	        if($last_id>0)
	        {
	         	$this->session->set_userdata("success", "Se proceso correctamente la información");
				redirect("mainpanel/articulos/listado");
	        }
	        else
	        {
	         	$error="Ocurrio un error al procesar la información";
	         	$this->session->set_userdata("error", $error);
	         	redirect("mainpanel/articulos/nuevo");
	        }
		}

		public function edit($id)
		{
	        $this->validacion_mainpanel->validacion_login();
	        // GENERAL
	        $theme = $this->config->item('admin_theme');
	        $data['theme'] = $theme;
	        $datos2 = array();
	        $datos2["current_section"] ="articulos";
	        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
	        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
	        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
	        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
	        $dataPrincipal["cuerpo"]="articulos/edit_view";
	        // *****************************************************************
	        // 
	        // EDIT BANNER
	        $articulo = $this->Articulos_model->get($id);
	        $dataPrincipal['articulo'] = $articulo;
	        $dataPrincipal["categorias"] = $this->Articulos_model->categorias();

	 
	        $this->load->view("mainpanel/includes/template", $dataPrincipal);
   		}

   		public function actualizar()
   		{
	        $this->validacion_mainpanel->validacion_login();
	        // EDITAR Clientes
	        $data = array();
	       
			$data["titulo"]	   	   = $this->input->post("titulo");
			$data["url"]  		   = $this->input->post("url");
			$data["introtext"] 	   = $this->input->post("introtext");
			$data["fulltext"] 	   = $this->input->post("fulltext");
			$data["state"]         = $this->input->post("state");
			$data["created"] 	   = dmY_2_Ymd($this->input->post("created"));
			$data["destacado"]         = $this->input->post("destacado");  
			$data["id_autor"]      = $this->session->userdata('id_admin');
			$data["title"]   = $this->input->post("title");
			$data["description"]        = $this->input->post("description");
			$data["keywords"]        = $this->input->post("keywords");
		    $id_articulo           = $this->input->post('id');
		    //$name_image = date("YmdHis");
	        $this->my_upload->upload($_FILES["imgnovedad"]);
	        if ( $this->my_upload->uploaded == true  )
	        {
	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 370;
	            $this->my_upload->image_y          		= 275;
				$this->my_upload->process('./files/articulos/');

				$this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 780;
	            $this->my_upload->image_y          		= 460;
	            $this->my_upload->process('./files/articulos/grandes');

	            $this->my_upload->allowed         	 	= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 200;
	            $this->my_upload->image_y          		= 120;
				$this->my_upload->process('./files/articulos/medianas/');
				
				$this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 100;
	            $this->my_upload->image_y          		= 100;
	            $this->my_upload->process('./files/articulos/pequeñas/');

	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 80;
	            $this->my_upload->image_y         		= 75;
	            $this->my_upload->process('./files/articulos/thumbs/');
	            if ($this->my_upload->processed == true )
	            {
	                $data['imagen'] = $this->my_upload->file_dst_name;
	                $this->my_upload->clean();
	            }
	            else
	            {
	                $error = $this->my_upload->error;
	                $this->session->set_userdata("error",'FOTO: '.$error);  
	                redirect('mainpanel/articulos/edit/'.$id_articulo); 
	            }
	        }
	        $result=$this->Articulos_model->update($id_articulo, $data);

	     
	        if($result==true)
	        {
	            $this->session->set_userdata("success",'Se procesó correctamente la información');
	            redirect('mainpanel/articulos/edit/'.$id_articulo);
	        }
	        else
	        {
	            $error='Ocurrió un error al procesar su información '.$error;
	            $this->session->set_userdata("error",$error);
	            redirect('mainpanel/articulos/edit/'.$id_articulo);            
	        }  
   		}
		
   		public function borrar($id)
   		{
   			$this->validacion_mainpanel->validacion_login();
   			$secciones= $this->Articulos_model->get($id);
   			$imagen = $secciones->imagen;
	   			@unlink("files/articulos/".$imagen);
				@unlink("files/articulos/medianas/".$imagen);
				@unlink("files/articulos/pequeñas/".$imagen);
	   			@unlink("files/articulos/thumbs/".$imagen);
	   			$result = $this->Articulos_model->delete($id);
   			if($result==true)
   			{
   				$this->session->set_userdata("success", "Su información se procesó correctamente");
   				redirect("mainpanel/articulos/listado");
   			}
   			else
   			{
   				$this->session->set_userdata("error", "Ocurrió un error al procesar su información");
   				redirect("mainpanel/articulos/listado");
   			}
   		}

   		public function modifica() {
   			$noticias = $this->Articulos_model->getLista();
   			$i=1;
   			foreach($noticias as $noticia)
   			{
   				$id = $noticia->id;
   				$images = explode("|", $noticia->images);
   				$imagen = $images[0];
   				if($imagen!="")
   				{
   					echo $i.'.- '.$imagen.'<br>';
   					$i++;
   				}   				   				
   			}
   		}


   		/*********************** EDIT TEXTOS ***************************/
   		/*********************** EDIT TEXTOS ***************************/
   		/*********************** EDIT TEXTOS ***************************/
   		/*********************** EDIT TEXTOS ***************************/
 
 public function editTexto($current_section)
        {
            $this->validacion_mainpanel->validacion_login();
            // GENERAL
            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] =$current_section;
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
            $dataPrincipal["cuerpo"]="articulos/edit_textos_view";
   
            $generales = $this->Generales_model->getTextos($current_section);
            $dataPrincipal['generales'] = $generales;
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }
  
  public function actualizarTexto()
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
                $this->my_upload->image_x               = 870;
                $this->my_upload->image_y               = 255;
                $this->my_upload->process('./files/articulos/');

           
                if ($this->my_upload->processed == true )
                {
                    $data['imagen'] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error = $this->my_upload->error;
                    $this->session->set_userdata("error",'FOTO: '.$error);  
                    redirect('mainpanel/articulos/editTexto/'.$data["seccion"]); 
                }
            }
            $result=$this->Generales_model->updateTexto($id_seccion, $data);

         
            if($result==true)
            {
                $this->session->set_userdata("success",'Se procesó correctamente la información');
                redirect('mainpanel/articulos/editTexto/'.$data["seccion"]);
            }
            else
            {
                $error='Ocurrió un error al procesar su información '.$error;
                $this->session->set_userdata("error",$error);
                redirect('mainpanel/articulos/editTexto/'.$data["seccion"]);            
            }  
        }
	  


	}
?>