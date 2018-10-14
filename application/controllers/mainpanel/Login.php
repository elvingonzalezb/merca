<?php
class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
            $this->load->model('mainpanel/Login_model');
            $this->load->helper('captcha');
    }

	public function index()
	{
        // GENERAL
        $theme = $this->config->item('admin_theme');
        $dataPrincipal['theme'] = $theme;
        $dataPrincipal['recaptcha'] = $this->recaptcha->render();
        $error = $this->uri->segment(3);
        $dataPrincipal["error"] = $error;
        $this->load->view('mainpanel/login_view', $dataPrincipal);
	}
        
    public function validar() {
        // GENERAL
        $theme = $this->config->item('admin_theme');
        $data['theme'] = $theme;
        $data['no_visible_elements'] = false;
        $datos2['current_section'] = '';
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
        // PROCESAR LOGIN
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);

        if($response['success']){
            $existe = $this->Login_model->valida_usuario($username, $password);
            if($existe)
            {
                $this->session->set_userdata('registrado', true);
                $this->session->set_userdata('nombre_admin', $existe->nombre);
                $this->session->set_userdata('id_admin', $existe->id);
                $this->session->set_userdata('nivel', $existe->nivel);
                redirect('mainpanel/inicio');
            }
            else
            {
                $user_pass = $this->Login_model->userPass($username, $password);
                if($user_pass)
                {
                    redirect('mainpanel/error/estado');
                }
                else
                {
                    $user_correcto = $this->Login_model->userCorrecto($username);
                    if($user_correcto)
                    {
                        redirect('mainpanel/error/password');
                    }
                    else
                    {
                        redirect('mainpanel/error/usuario');
                    }                    
                }
            }
        }
        else
        {
            //var_dump($response); die();
            redirect('mainpanel/error/captcha');
        }
    }
        
    public function logout()
    {
        $this->session->unset_userdata('registrado');
        $this->session->unset_userdata('nombre_admin');
        $url= base_url()."mainpanel";
        redirect($url);
    }
}
?>