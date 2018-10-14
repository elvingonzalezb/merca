<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Contactanos extends CI_Controller {

		 function __construct() {
		    parent::__construct();
			 $this->load->model('frontend/Generales_model'); 
			$this->load->model('frontend/Contactanos_model'); 
			//$this->load->helper('captcha');
			$this->load->library('My_phpmailer'); 
		}

		public function index()
		{
			$dataPrincipal = array();
    		$seccion = 'contactanos';
			$dataPrincipal['seccion'] = $seccion;
			$contenido = $this->Generales_model->getSeccion($seccion);
			$dataPrincipal['titulo'] = $contenido->titulo;
			$dataPrincipal['texto'] = $contenido->texto;
			$dataPrincipal['cuerpo'] = 'contactenos_view';
			//$dataPrincipal['device'] = tipoDevice();

			$dataPrincipal['textosweb'] = $this->Generales_model->getTextosWeb($seccion);	
			$data = array();
			$data['seccion'] = $seccion;
			$data['title'] = $contenido->title;
			$data['keywords'] = $contenido->keywords;
			$data['description'] = $contenido->description;
        
		    $data['mapa'] = $this->Contactanos_model->getMapa();
                     
			
			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);

            $dataPrincipal['recaptcha'] = $this->recaptcha->render();
			$error = $this->uri->segment(3);
            $dataPrincipal["error"] = $error;
			$this->load->view("frontend/includes/template", $dataPrincipal);
		}	

        public function enviar()
        {
            $data = array();
            $data["nombre"] = $this->input->post('nombre');
            $data["email"] = $this->input->post('email');
            $data["telefono"] = $this->input->post('telefono');
            $data["asunto"] = $this->input->post('asunto');
            $data["mensaje"] = $this->input->post('mensaje');
            $data["estado"] = "P";
            $data["fecha_ingreso"] = date('Y-m-d h:m:s');
          

            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
      
            if(isset($response['success']) and $response['success'] ===  true)
            {
               $resultado = $this->Contactanos_model->grabarMensaje($data);
                if($resultado)
                {
                    $mensaje = $this->load->view('frontend/emails/email_contactenos', $data, true);
                    $mail = new PHPMailer();
                    $mail->From = getConfig("remitente_correos");
                    $mail->FromName = NOMBRE_SITIO;
                    $destinatarios = explode(",", getConfig("correos_notificaciones"));
                    for($u=0; $u<count($destinatarios); $u++)
                    {
                        $current = trim($destinatarios[$u]);
                        $mail->AddAddress($current);
                    }
                    $mail->AddAddress($data["email"]);
                    $mail->Subject = "Mensaje desde el formulario de contacto de ".NOMBRE_SITIO;    
                    $mail->Body = $mensaje;
                    $mail->IsHTML(true);
                    @$mail->Send();

                    $resultado = "exito";
                    $mensaje = "Su mensaje se envió correctamente";
                }
                else
                {
                    $resultado = "error";
                    $mensaje = "Ocurrio un error al procesar la información";
                }
            }

            else
            {
                $resultado = "error";
                $mensaje = "Código de imagen incorrecto";
            }
          $this->session->set_userdata("resultado", $resultado);
          $this->session->set_userdata("mensaje", $mensaje);
          redirect('frontend/contactanos');  
        }       
	}