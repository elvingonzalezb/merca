<?php 
	class Registro_usuarios extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library("validacion_mainpanel");
			$this->load->model("mainpanel/Registro_usuarios_model");
			$this->load->library('my_upload');
		}

		public function listado()
		{
	        $this->validacion_mainpanel->validacion_login();
	       
	        $theme = $this->config->item('admin_theme');
	        $data['theme'] = $theme;
	        $datos2 = array();
	        $datos2["current_section"] ="registro_usuarios";
	        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
	        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
	        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
	        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
	        $dataPrincipal["cuerpo"]="registro_usuarios/index_view";
	        $dataPrincipal["usuarios"] = $this->Registro_usuarios_model->getLista();
	        $this->load->view("mainpanel/includes/template", $dataPrincipal);
		}

		public function nuevo()
		{			
	        $this->validacion_mainpanel->validacion_login();
	       
	        $theme = $this->config->item('admin_theme');
	        $data['theme'] = $theme;
	        $datos2 = array();
	        $datos2["current_section"] ="registro_usuarios";
	        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
	        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
	        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
	        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
	        $dataPrincipal["cuerpo"]="registro_usuarios/nuevo_view";
			$this->load->view("mainpanel/includes/template", $dataPrincipal);
		}

		public function grabar()
		{
			$this->validacion_mainpanel->validacion_login();
			// grabar los datos
			$data["nivel"]	= $this->input->post("nivel");
			$data["nombre"]	= $this->input->post("nombre");
			$data["usuario"]  = $this->input->post("usuario");
			$data["password"] = $this->input->post("password");
			$data["estado"] = $this->input->post("estado");
			$data["autorizado"] = $this->input->post("autorizado");  
	        $resultado = $this->Registro_usuarios_model->grabar($data);
	        if($resultado==true)
	        {
	         	$this->session->set_userdata("success", "Se proceso correctamente la información");
				redirect("mainpanel/registro_usuarios/listado");
	        }
	        else
	        {
	         	$error="Ocurrio un error al procesar la información";
	         	$this->session->set_userdata("error", $error);
	         	redirect("mainpanel/registro_usuarios/nuevo");
	        }
		}

		public function edit($id)
		{
	        $this->validacion_mainpanel->validacion_login();
	       
	        $theme = $this->config->item('admin_theme');
	        $data['theme'] = $theme;
	        $datos2 = array();
	        $datos2["current_section"] ="registro_usuarios";
	        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
	        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
	        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
	        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
	        $dataPrincipal["cuerpo"]="registro_usuarios/edit_view";
	        
	        $dataPrincipal['usuario'] = $this->Registro_usuarios_model->get($id);
	        $this->load->view("mainpanel/includes/template", $dataPrincipal);
   		}

   		public function actualizar()
   		{
	        $this->validacion_mainpanel->validacion_login();
	        
	        $data = array();
	        $data["nombres"]	= $this->input->post("nombres");
			$data["apellidos"]	= $this->input->post("apellidos");
			$data["telefono"]  = $this->input->post("telefono");
			$data["email"] = $this->input->post("email");
			$data["clave"] = $this->input->post("clave");
			$data["estado"] = $this->input->post("estado");
			$data["autorizado"] = $this->input->post("autorizado");  
			$data["fecha_registro"]       = dmY_2_Ymd($this->input->post("fecha_registro"));
		    $id = $this->input->post('id');

	        $result=$this->Registro_usuarios_model->update($id, $data);
	        if($result==true)
	        {
	            $this->session->set_userdata("success",'Se procesó correctamente la información');
	            redirect('mainpanel/registro_usuarios/edit/'.$id);
	        }
	        else
	        {
	            $error='Ocurrió un error al procesar su información '.$error;
	            $this->session->set_userdata("error",$error);
	            redirect('mainpanel/registro_usuarios/edit/'.$id);            
	        }  
   		}
		
   		public function borrar($id)
   		{
   			$this->validacion_mainpanel->validacion_login();
	   		$result = $this->Registro_usuarios_model->delete($id);
   			if($result==true)
   			{
   				$this->session->set_userdata("success", "Su información se procesó correctamente");
   				redirect("mainpanel/registro_usuarios/listado");
   			}
   			else
   			{
   				$this->session->set_userdata("error", "Ocurrió un error al procesar su información");
   				redirect("mainpanel/registro_usuarios/listado");
   			}
   		}


	}
?>