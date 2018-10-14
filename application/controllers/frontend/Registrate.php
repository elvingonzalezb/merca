<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Registrate extends CI_Controller {

		function __construct() {
		    parent::__construct();
			$this->load->model('frontend/Generales_model'); 
			$this->load->model('frontend/Registrate_model'); 
			$this->load->model('frontend/Inicio_model'); 
			$this->load->helper('captcha');
			$this->load->library('My_phpmailer'); 
		}

		public function index()
		{
			$dataPrincipal = array();
			$seccion = 'registro';
			$dataPrincipal['seccion'] = $seccion;
			$dataPrincipal['titulo'] = "REGISTRO DE USUARIOS";
			$dataPrincipal['texto'] = "";

			$dataPrincipal['cuerpo'] = 'registrate_view';
			
		
			$data = array();
			$data['seccion'] = $seccion;
			$data['title'] = "REGISTRO DE USUARIOS";
			$data['keywords'] = "registro de usuarios, usuarios ".NOMBRE_SITIO;
			$data['description'] = "Formulario de registro de usuarios en ".NOMBRE_SITIO;
;
			$dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();
			$dataPrincipal['recaptcha'] = $this->recaptcha->render();
			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);
			
			$this->load->view("frontend/includes/template", $dataPrincipal);
		}

		public function enviar() {
			$data = array();
			$data["nombres"] = $this->input->post('nombres');
			$data["apellidos"] = $this->input->post('apellidos');
			$data["telefono"] = $this->input->post('telefono');
			$data["email"] = $this->input->post('email');
			$data["clave"] = $this->input->post('clave');
				
			$activacion_automatica = getConfig('activacion_automatica');
		  		if ($activacion_automatica == "S") {
                $data["estado"] = "A";
	            } else {
	                $data["estado"] = "I";
	            }
			$data["autorizado"] = "N";
			$data["timestamp"] = time();
			$data["fecha_registro"] = date('Y-m-d');
		

			$recaptcha = $this->input->post('g-recaptcha-response');
        	$response = $this->recaptcha->verifyResponse($recaptcha);
        	if($response['success']) 
        	{
        		// VERIFICAMOS Q NO HAYA OTRO USUARIO CON ESE TELEFONO        		
        		$telefono_existe = $this->Registrate_model->telefonoDuplicado($data["telefono"]);
    			if($telefono_existe)
    			{
    				$resultado = "error";
    				$mensaje = "Ya existe una cuenta con ese número de teléfono";
    				$this->session->set_userdata("resultado", $resultado);
		        	$this->session->set_userdata("mensaje", $mensaje);
		        	  redirect(base_url().'registrate');
    			}
        		else
        		{
        			$email_existe = $this->Registrate_model->emailDuplicado($data["email"]);
	        		if($email_existe)
	        		{
	        			$resultado = "error";
	        			$mensaje = "Ya existe una cuenta con esa dirección de correo";
	    				$this->session->set_userdata("resultado", $resultado);
			        	$this->session->set_userdata("mensaje", $mensaje);
			        	  redirect(base_url().'registrate');	        			
	        		}
        			else
        			{
		        		$resultado = $this->Registrate_model->grabarRegistro($data);
		        		if($resultado)
		        		{
		        				$activacion_automatica = getConfig('activacion_automatica');
							  		if ($activacion_automatica == "S") {
					                $mensaje = $this->load->view('frontend/emails/email_registro_usuario', $data, true);
						            } else {
						            $mensaje = $this->load->view('frontend/emails/email_registroactivacion_usuario', $data, true);
						            }
				        
			                $mail = new PHPMailer();
			                $mail->From = getConfig("remitente_correos");
			                $mail->FromName = NOMBRE_SITIO;
			                $mail->AddAddress($data["email"]);
			                $mail->Subject = "Sobre su registro en ".NOMBRE_SITIO;
			                $mail->Body = $mensaje;
			                $mail->IsHTML(true);
			                @$mail->Send();

			                /************** COPIA A ADMINISTRACION ***************/
			                $mensaje2 = $this->load->view('frontend/emails/email_registro_adm', $data, true);
			                $mail2 = new PHPMailer();
			                $mail2->From = getConfig("remitente_correos");
			                $mail2->FromName = NOMBRE_SITIO;
			                $destinatarios = explode(",", getConfig("correos_notificaciones"));
			                for($u=0; $u<count($destinatarios); $u++)
			                {
			                	$current = trim($destinatarios[$u]);
			                	$mail2->AddAddress($current);
			                }
			                $mail2->Subject = "Registro de usuario en ".NOMBRE_SITIO;	
			                $mail2->Body = $mensaje2;
			                $mail2->IsHTML(true);
			                @$mail2->Send();

							$resultado = "exito";
							$mensaje = "Su registro se proceso correctamente. puede ingresar y utilizar nuestros productos, Le hemos enviado un email con los datos ingresados en su registro.";
			        		$this->session->set_userdata("resultado", $resultado);
				        	$this->session->set_userdata("mensaje", $mensaje);
				        	  redirect(base_url().'ingresar');								
		        		}
		        		else
		        		{
		        			$resultado = "error";
		        			$mensaje = "Ocurrio un error al procesar la información";
			        		$this->session->set_userdata("resultado", $resultado);
				        	$this->session->set_userdata("mensaje", $mensaje);
				        	  redirect(base_url().'registrate');			        			
		        		}
        			}
        		}
        	}
        	else
        	{
        		$resultado = "error";
        		$mensaje = "Código de imagen errado";
        		$this->session->set_userdata("resultado", $resultado);
	        	$this->session->set_userdata("mensaje", $mensaje);
	        	 redirect(base_url().'registrate');	
        	}        	
		}


		public function activacion() {
			$dataPrincipal = array();
			$timestamp = $this->uri->segment(3);
			$h = $this->Registrate_model->buscaRegistro($timestamp);
			if($h>0)
			{
				$data2 = array();
				$data2["estado"] = "A";
				$this->Registrate_model->activaRegistro($timestamp, $data2);
				$dataPrincipal['resultado'] = 'activo'; 
			}
			else
			{
				$dataPrincipal['resultado'] = 'noexiste';
			}

			
			$seccion = 'validacion';
			$dataPrincipal['seccion'] = $seccion;

			$dataPrincipal['titulo'] = "ACTIVACION DE CUENTA DE USUARIO";
			$dataPrincipal['texto'] = "";

			$dataPrincipal['cuerpo'] = 'activacion_view';
			

			$data = array();
			$data['seccion'] = $seccion;
			$data['title'] = "ACTIVACION DE CUENTA DE USUARIO";
			$data['keywords'] = "activacion de usuario ".NOMBRE_SITIO;
			$data['description'] = "Resultado de activacion de usuario en ".NOMBRE_SITIO;

			
			$dataPrincipal['recaptcha'] = $this->recaptcha->render();
			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);
			
			$this->load->view("frontend/includes/template", $dataPrincipal);		
		}		

	


	}