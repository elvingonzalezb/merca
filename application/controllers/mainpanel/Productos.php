<?php 
	class Productos extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library("validacion_mainpanel");
			$this->load->model("mainpanel/catalogo_model");
			$this->load->model("mainpanel/Categorias_model");
			$this->load->library('my_upload');
		}

		public function listado()
		{
	        $this->validacion_mainpanel->validacion_login();
	        // GENERAL
	        $theme = $this->config->item('admin_theme');
	        $data['theme'] = $theme;
	        $datos2 = array();
	        $datos2["current_section"] ="catalogo";
	        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
	        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
	        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
	        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
	        $dataPrincipal["cuerpo"]="catalogo/index_view";
	        $productos = $this->Productos_model->getLista();
	        $dataPrincipal["productos"] = $productos;
	        $this->load->view("mainpanel/includes/template", $dataPrincipal);
		}

		public function nuevo()
		{			
	        $this->validacion_mainpanel->validacion_login();
	        // GENERAL
	        $theme = $this->config->item('admin_theme');
	        $data['theme'] = $theme;
	        $datos2 = array();
	        $datos2["current_section"] ="catalogo";
	        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
	        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
	        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
	        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
	        $dataPrincipal["cuerpo"]="catalogo/nuevo_view";
	        $dataPrincipal["categorias"] = $this->Categorias_model->categorias();
	        $this->load->view("mainpanel/includes/template", $dataPrincipal);
		}

		public function grabar()
		{
			$this->validacion_mainpanel->validacion_login();
			// grabar los datos
			$data["id_categoria"]  = $this->input->post('id_categoria');
			$data["titulo"]		   = $this->input->post("titulo");
			$data["url"] 		   = $this->input->post("url");
			$data["created"]       = dmY_2_Ymd($this->input->post("created"));
			$data["introtext"] 	   = $this->input->post("introtext");
			$data["fulltext"] 	   = $this->input->post("fulltext");
			$data["resumen"] 	   = $this->input->post("introtext");
			$data["contenido"] 	   = $this->input->post("fulltext");

			$data["state"]         = $this->input->post("state"); 
			$data["script_head"]   = $this->input->post("script_head");
			$data["script"]        = $this->input->post("script");
			$data["id_autor"]      = $this->session->userdata('id_admin');
			//$name_image = date("YmdHis");
			$this->my_upload->upload($_FILES["imagen"]);
			if($this->my_upload->uploaded == true)
			{
	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 900;
	            $this->my_upload->image_y          		= 600;
	            $this->my_upload->process('./files/productos/');
	            
	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 450;
	            $this->my_upload->image_y          		= 300;
	            $this->my_upload->process('./files/productos/medianas/');
	            
	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 75;
	            $this->my_upload->image_y          		= 75;
	            $this->my_upload->process('./files/productos/thumbs/');
	            if($this->my_upload->processed == true)
	            {
	            	$data["imagen"] = $this->my_upload->file_dst_name;
	            	$this->my_upload->clean();
	            }
	            else
	            {
	            	$error= $this->my_upload->error;
	            	$this->session->set_userdata("error", 'IMAGEN:'.$error);
	            	redirect("mainpanel/catalogo/nuevo");
	            }
			}
			else
			{
	     	}
	        $last_id = $this->Productos_model->grabar($data);


	        if($last_id>0)
	        {
	         	$this->session->set_userdata("success", "Se proceso correctamente la información");
				redirect("mainpanel/catalogo/listado");
	        }
	        else
	        {
	         	$error="Ocurrio un error al procesar la información";
	         	$this->session->set_userdata("error", $error);
	         	redirect("mainpanel/catalogo/nuevo");
	        }
		}

		public function edit($id)
		{
	        $this->validacion_mainpanel->validacion_login();
	        // GENERAL
	        $theme = $this->config->item('admin_theme');
	        $data['theme'] = $theme;
	        $datos2 = array();
	        $datos2["current_section"] ="catalogo";
	        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
	        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
	        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
	        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
	        $dataPrincipal["cuerpo"]="catalogo/edit_view";
	        // *****************************************************************
	        // 
	        // EDIT BANNER
	        $articulo = $this->Productos_model->get($id);
	        $dataPrincipal['articulo'] = $articulo;
	        $dataPrincipal["categorias"] = $this->Categorias_model->categorias();

	      
	        $this->load->view("mainpanel/includes/template", $dataPrincipal);
   		}

   		public function actualizar()
   		{
	        $this->validacion_mainpanel->validacion_login();
	        // EDITAR Clientes
	        $data = array();
	        $data["id_categoria"]  = $this->input->post('id_categoria');
			$data["titulo"]		   = $this->input->post("titulo");
			$data["url"]           = $this->input->post("url");
			$data["created"]       = dmY_2_Ymd($this->input->post("created"));
			$data["introtext"] 	   = $this->input->post("introtext");
			$data["fulltext"] 	   = $this->input->post("fulltext");
			$data["resumen"] 	   = $this->input->post("introtext");
			$data["contenido"] 	   = $this->input->post("fulltext");
			$data["state"]         = $this->input->post("state"); 
			$data["script"]        = $this->input->post("script");
			$data["script_head"]   = $this->input->post("script_head");
			$data["id_autor"]      = $this->session->userdata('id_admin');
		    $id_producto = $this->input->post('id');
		    //$name_image = date("YmdHis");
	        $this->my_upload->upload($_FILES["imgnovedad"]);
	        if ( $this->my_upload->uploaded == true  )
	        {
	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 900;
	            $this->my_upload->image_y          		= 600;
	            $this->my_upload->process('./files/productos/');

	            $this->my_upload->allowed         	 	= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 450;
	            $this->my_upload->image_y          		= 300;
	            $this->my_upload->process('./files/productos/medianas/');

	            $this->my_upload->allowed          		= array('image/*');
            	//$this->my_upload->file_new_name_body 	= $name_image;
	            $this->my_upload->image_resize     		= true;
	            $this->my_upload->image_ratio_crop 		= true;
	            $this->my_upload->image_x          		= 75;
	            $this->my_upload->image_y         		= 75;
	            $this->my_upload->process('./files/productos/thumbs/');
	            if ($this->my_upload->processed == true )
	            {
	                $data['imagen'] = $this->my_upload->file_dst_name;
	                $this->my_upload->clean();
	            }
	            else
	            {
	                $error = $this->my_upload->error;
	                $this->session->set_userdata("error",'FOTO: '.$error);  
	                redirect('mainpanel/catalogo/edit/'.$id_producto); 
	            }
	        }
	        $result=$this->Productos_model->update($id_producto, $data);


	        if($result==true)
	        {
	            $this->session->set_userdata("success",'Se procesó correctamente la información');
	            redirect('mainpanel/catalogo/edit/'.$id_producto);
	        }
	        else
	        {
	            $error='Ocurrió un error al procesar su información '.$error;
	            $this->session->set_userdata("error",$error);
	            redirect('mainpanel/catalogo/edit/'.$id_producto);            
	        }  
   		}
		
   		public function borrar($id)
   		{
   			$this->validacion_mainpanel->validacion_login();
   			$secciones= $this->Productos_model->get($id);
   			$imagen = $secciones->imagen;
	   			@unlink("files/productos/".$imagen);
	   			@unlink("files/productos/medianas/".$imagen);
	   			@unlink("files/productos/thumbs/".$imagen);
	   			$result = $this->Productos_model->delete($id);
   			if($result==true)
   			{
   				$this->session->set_userdata("success", "Su información se procesó correctamente");
   				redirect("mainpanel/catalogo/listado");
   			}
   			else
   			{
   				$this->session->set_userdata("error", "Ocurrió un error al procesar su información");
   				redirect("mainpanel/catalogo/listado");
   			}
   		}

   		public function modifica() {
   			$productos = $this->Productos_model->getLista();
   			$i=1;
   			foreach($productos as $noticia)
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



	}
?>