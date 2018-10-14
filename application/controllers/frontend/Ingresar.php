<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ingresar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Generales_model');
        $this->load->model('frontend/Ingresar_model');
        $this->load->model('frontend/Inicio_model');
        $this->load->helper('captcha');
        $this->load->library('My_phpmailer');
    }

    public function index()
    {
        $dataPrincipal = array();

        $seccion                  = 'ingresar';
        $dataPrincipal['seccion'] = $seccion;

        $dataPrincipal['titulo'] = "INGRESO DE USUARIOS";
        $dataPrincipal['texto']  = "";

        $dataPrincipal['cuerpo'] = 'ingresar_view';

        $data                = array();
        $data['seccion']     = $seccion;
        $data['title']       = "INGRESO DE USUARIOS";
        $data['keywords']    = "ingreso de usuarios, usuarios " . NOMBRE_SITIO;
        $data['description'] = "Formulario de ingreso de usuarios en " . NOMBRE_SITIO;

        $dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();
        $dataPrincipal['recaptcha']      = $this->recaptcha->render();
        $dataPrincipal['header']         = $this->load->view('frontend/includes/header_view', $data, true);
        $dataPrincipal['footer']         = $this->load->view('frontend/includes/footer_view', $data, true);

        $this->load->view("frontend/includes/template", $dataPrincipal);
    }

    public function editdatos()
    {
        $correo                   = $this->session->userdata('usuario_email');
        $dataPrincipal            = array();
        $seccion                  = 'ingresar';
        $dataPrincipal['seccion'] = $seccion;
        $dataPrincipal['titulo']  = "REGISTRO DE USUARIOS";
        $dataPrincipal['texto']   = "";

        $dataPrincipal['cuerpo']        = 'editdatos_view';
        $usuarioactual                  = $this->Ingresar_model->getUsuario($correo);
        $dataPrincipal['usuarioactual'] = $usuarioactual;

        $data                = array();
        $data['seccion']     = $seccion;
        $data['title']       = "EDITAR DE USUARIOS";
        $data['keywords']    = "editar usuarios, usuarios " . NOMBRE_SITIO;
        $data['description'] = "editar ingreso de usuarios en " . NOMBRE_SITIO;

        $dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();
        $dataPrincipal['header']         = $this->load->view('frontend/includes/header_view', $data, true);
        $dataPrincipal['footer']         = $this->load->view('frontend/includes/footer_view', $data, true);

        $this->load->view("frontend/includes/template", $dataPrincipal);
    }

    public function actualizar()
    {
        $correo                   = $this->session->userdata('usuario_email');
        $dataPrincipal            = array();
        $seccion                  = 'ingresar';
        $dataPrincipal['seccion'] = $seccion;
        $dataPrincipal['titulo']  = "EDITAR DE USUARIOS";
        $dataPrincipal['texto']   = "";

        $data                   = array();
        $data["nombres"]        = $this->input->post("nombres");
        $data["apellidos"]      = $this->input->post("apellidos");
        $data["telefono"]       = $this->input->post("telefono");
        $data["clave"]          = $this->input->post("clave");
        $id                     = $this->input->post('id');

        $result = $this->Ingresar_model->update($correo, $data);
        if ($result == true) {
            $resultado = "exito";
            $mensaje   = "Se procesó correctamente la información";
            $this->session->set_userdata("resultado", $resultado);
            $this->session->set_userdata("mensaje", $mensaje);
             $this->session->set_userdata('nombres_usuario',$data["nombres"]);
             $this->session->set_userdata('apellidos_usuario',$data["apellidos"]);
            redirect(base_url() . 'editdatos');
        } else {
            $resultado = "error";
            $mensaje   = "Ocurrió un error al procesar su información";
            $this->session->set_userdata("resultado", $resultado);
            $this->session->set_userdata("mensaje", $mensaje);
            redirect(base_url() . 'editdatos');

        }
    }

    public function validarLogin()
        {
            // PROCESAR LOGIN
            $username = $this->input->post('emailLogin');
            $password = $this->input->post('claveLogin');
            
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);

            if($response['success']) 
            {
                $existe = $this->Ingresar_model->validaUser($username, $password);
                if($existe != "")
                {
                    $this->session->set_userdata('usermercasub_registrado', true);
                    $this->session->set_userdata('nombres_usuario', $existe->nombres);
                    $this->session->set_userdata('apellidos_usuario', $existe->apellidos);
                    $this->session->set_userdata('usuario_email', $existe->email);
                    $this->session->set_userdata('id_usuario', $existe->id);
                    $this->session->set_userdata('autorizado', $existe->autorizado);
                    redirect(base_url().'pedidos');
                }
                else
                {
                    $estado_inactivo = $this->Ingresar_model->verificaEstado($username, $password);
                    if($estado_inactivo != "")
                    {
                            $usuario = $this->Ingresar_model->getUser($username, $password);
                            /************ REENVIAMOS EL CORREO CON EL ENLACE DE ACTIVACION ******************/
                            $data["nombres"] = $usuario->nombres;
                            $data["apellidos"] = $usuario->apellidos;
                            $data["telefono"] = $usuario->telefono;
                            $data["email"] = $usuario->email;
                            $data["clave"] = $usuario->clave;
                            $data["timestamp"] = $usuario->timestamp;

                            $mensaje = $this->load->view('frontend/emails/email_registro_usuario', $data, true);
                            $mail = new PHPMailer();
                            $mail->From = getConfig("remitente_correos");
                            $mail->FromName = NOMBRE_SITIO;
                            $mail->AddAddress($data["email"]);
                            $mail->Subject = "Sobre su registro en ".NOMBRE_SITIO;
                            $mail->Body = $mensaje;
                            $mail->IsHTML(true);
                            @$mail->Send();

                            $this->session->set_userdata("resultado", "error");
                            $this->session->set_userdata("mensaje", "Tu cuenta está inactiva. Te hemos reenviado el correo con el enlace de activación. Revisa tu bandeja de entrada y en caso no encuentres allí nuestro mensaje busca en la carpeta de spam o de correos no deseados y agréganos a tu libreta de contactos.");
                            redirect(base_url().'ingresar');
                    }
                    else
                        {
                                $user_correcto = $this->Ingresar_model->verificaUser($username);
                                if($user_correcto != "")
                                {
                                    $this->session->set_userdata("resultado", "error");
                                    $this->session->set_userdata("mensaje", "Clave errada");
                                    redirect(base_url().'ingresar');
                                }
                                else
                                {
                                    $this->session->set_userdata("resultado", "error");
                                    $this->session->set_userdata("mensaje", "No existe un registro con el email indicado");
                                     redirect(base_url().'ingresar');
                                }
                        }
                }
            }
            else
            {
                $this->session->set_userdata("resultado", "error");
                $this->session->set_userdata("mensaje", "Debe comprobar que no es un robot");
                 redirect(base_url().'ingresar_registrate');
            }
        }

    public function logout()
    {

        $this->session->set_flashdata('message', '<div class="form-group has-feedback"><div class="alert alert-info">Sesión finalizada.</div></div>');
        $this->session->unset_userdata('usermercasub_registrado');
        $this->session->unset_userdata('nombre_usuario');
        $this->session->unset_userdata('apellidos_usuario');
        $this->session->unset_userdata('usuario_email');
        $this->session->unset_userdata('usuario_telefono');
        $this->session->unset_userdata('id_usuario');
        $this->session->unset_userdata('autorizado');

        redirect(base_url() . 'inicio');
    }

}
