<?php
class Pedidos extends CI_Controller {
            function __construct() {
                parent::__construct();
                $this->load->library('validacion_mainpanel');
                $this->load->model('mainpanel/Pedidos_model');
                $this->load->library('My_upload');
                $this->load->library('My_phpmailer');
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
            $datos2["current_section"] ="pedidos";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="pedidos/index_view";
            $dataPrincipal['listado'] = $this->Pedidos_model->getListado();

            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }


        public function edit($id)
        {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="pedidos";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="pedidos/edit_detalles_view";

            $pedido   = $this->Pedidos_model->getPedido($id);
            $dataPrincipal['pedido'] = $pedido;
            $detalles = $this->Pedidos_model->getDetalles($id);
            $dataPrincipal['detalles'] = $detalles;

            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

        public function cotizar($id)
        {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="pedidos";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="pedidos/cotizar_view";

            $pedido   = $this->Pedidos_model->getPedido($id);
            $dataPrincipal['pedido'] = $pedido;
            $detalles = $this->Pedidos_model->getDetalles($id);
            $dataPrincipal['detalles'] = $detalles;

            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }


        public function actualizar()
        {
              $this->validacion_mainpanel->validacion_login();
              $id_detalle  = $this->input->post('id_detalle');
              $precio  = $this->input->post('precio');
              $data = array();

              for($i = 0; $i<($id_detalle); ++$i)
              {
                $id_detalle[$i];
                $precio[$i];
                //BUSCO TOTAL GENERAL Y SUBTOTAL DEL DETALLE 3500
                $subtotalactual   = $this->Pedidos_model->getsubTotal($id_detalle[$i]);
                $totalactual   = $this->Pedidos_model->getTotal($subtotalactual->id_pedido);

                //RESTO SUBTOTAL ACTUAL DEL TOTAL
                $totalTemp = ($totalactual->total - $subtotalactual->subtotal);
                // CALCULO SUBTOTAL NUEVO
                $subtotalnuevo = ($subtotalactual->cantidad * $precio[$i]);
                //CALCULO TOTAL NUEVO
                $data2 = array();
                $totalnuevo = ($totalTemp + $subtotalnuevo);
                $data['subtotal'] = $subtotalnuevo;
                $data['precio'] = $precio[$i];

                $result=$this->Pedidos_model->updatePrecio($id_detalle[$i], $data);

                $data2['total'] = $totalnuevo;
                //$data2['estado'] = "C";
                $resulttotal=$this->Pedidos_model->updateTotal($subtotalactual->id_pedido, $data2);

                    if($result==true)
                    {
                        $this->session->set_userdata("success",'Se actualizo el precio correctamente');
                        redirect('mainpanel/pedidos/cotizar/'.$subtotalactual->id_pedido);
                    }
                    else
                    {
                        $error='Ocurrió un error al procesar su información '.$error;
                        $this->session->set_userdata("error",$error);
                        redirect('mainpanel/pedidos/cotizar/'.$subtotalactual->id_pedido);
                    }
              }
        }

        public function enviar($id)
        {
          $this->validacion_mainpanel->validacion_login();
          $data2['estado'] = "C";
          $resulttotal=$this->Pedidos_model->updateTotal($id, $data2);
          $pedido   = $this->Pedidos_model->getPedido($id);

          $usuario   = $this->Pedidos_model->getUsuario($pedido->id_usuario);
          //$this->session->set_userdata('pedido',$pedido)
          $detalles = $this->Pedidos_model->getDetalles($id);
          $data['pedido'] = $pedido;
          $data['usuario'] = $usuario;
          $data['detalles'] = $detalles;


                  if ($detalles)
                  {
                                //VALIDACION SI COTIZADO ENVIAR CON TOTAL NO ENVIAR SIN TOTAL
                          $mensaje = $this->load->view('mainpanel/pedidos/email_pedidototal_usuario', $data, true);
                          $mail           = new PHPMailer();
                          $mail->From     = getConfig("remitente_correos");
                          $mail->FromName = NOMBRE_SITIO;
                          $mail->AddAddress($usuario->email);
                          $mail->Subject = "Infomación de pedido de " . NOMBRE_SITIO;
                          $mail->Body    = $mensaje;
                          $mail->IsHTML(true);
                          @$mail->Send();
                                /************** COPIA A ADMINISTRACION ***************/
                              //VALIDACION SI COTIZADO ENVIAR CAN TOTAL NO ENVIAR SIN TOTAL
                            $mensaje2 = $this->load->view('mainpanel/pedidos/email_pedidototal_adm', $data, true);
                            $mail2           = new PHPMailer();
                            $mail2->From     = getConfig("remitente_correos");
                            $mail2->FromName = NOMBRE_SITIO;
                            $destinatarios   = explode(",", getConfig("notificaciones_registros"));
                            for ($u = 0; $u < count($destinatarios); $u++)
                             {
                                $current = trim($destinatarios[$u]);
                                $mail2->AddAddress($current);
                              }
                        $mail2->Subject = "Solicitud de pedido desde la web" . NOMBRE_SITIO;
                        $mail2->Body    = $mensaje2;
                        $mail2->IsHTML(true);
                        @$mail2->Send();


                        $this->session->set_userdata("success",'Su cotización se envio correctamente');
                        redirect('mainpanel/pedidos/cotizar/'.$id);
                 } else {
                   $error='Ocurrió un error al procesar su información '.$error;
                   $this->session->set_userdata("error",$error);
                  redirect('mainpanel/pedidos/cotizar/'.$id);
                }

        }


 }//END CONTROLADOR
?>
