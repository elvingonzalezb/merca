<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedidos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Productos_model', 'Producto');
        $this->load->model('frontend/Pedidos_model');
        $this->load->model('frontend/Generales_model');
        $this->load->library('My_phpmailer');
    }

    public function index()
    {
        $dataPrincipal            = array();
        $seccion                  = 'pedidos';
        $dataPrincipal['seccion'] = $seccion;
        $contenido                = $this->Generales_model->getSeccion($seccion);
        $dataPrincipal['carrito'] = $this->session->userdata('carrito_items');

        if (!empty($this->session->userdata('autorizado'))) {
            $autorizado = $this->session->userdata('autorizado');
            if ($autorizado == "S") {
                $dataPrincipal['cuerpo'] = 'pedidos_total_view';
            } else {
                $dataPrincipal['cuerpo'] = 'pedidos_view';
            }

        } else {
            $dataPrincipal['cuerpo'] = 'pedidos_view';
        }

        $data                = array();
        $data['seccion']     = $seccion;
        $data['title']       = $contenido->title;
        $data['keywords']    = $contenido->keywords;
        $data['description'] = $contenido->description;

        $dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);

        $dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);

        $this->load->view("frontend/includes/template", $dataPrincipal);
    }

    public function agregar()
    {
        if (!empty($_POST)) {
            $id             = $this->input->post('id');
            $cantidad       = $this->input->post('cantidad');
            $id_color       = $this->input->post('id_color');
            $observaciones  = $this->input->post('observaciones');
            $linkeditPedido = $this->input->post('linkeditPedido');
            $precio = $this->input->post('precio');
            if ($id != null) {
                //verifico que posea un ID producto

                $carritoItems = is_array($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : array();

                if (count($carritoItems) > 0) {
                    //Si Existe producto en el pedido recorro verifico si es el mismo, si no agrego nuevo
                    $existe = false;
                    $indice= $id . '-' . $id_color;
                    for ($i = 0; $i < count($carritoItems); $i++) {
                        if ($carritoItems[$i]['item_carroID'] == $indice) {
                            $existe = true;
                            break;
                        }
                    }

                    if ($existe) {
                    //Mismo producto solo modifico color/cantidad/precio/subtotal/total
                    //obtengo  total actual precio * cantidad del total actual para obtener total y despues obtengo el total general y lo resto
                     $global = $this->session->userdata('total');
                     $actual = $carritoItems[$i]['item_precio'] * $carritoItems[$i]['item_cantidad'];
                     $momentaneo = ($global - $actual);
                     $this->session->unset_userdata('total');

                        //Datos nuevos a modificar ya que es el mismo producto solo modifica cantidad y precio
                        $carritoItems[$i]['item_cantidad']     = $cantidad;
                        $carritoItems[$i]['item_subtotal']     = $precio * $cantidad;

                        $itemcolor                             = $this->Pedidos_model->getCodigoColor($id_color);
                        $carritoItems[$i]['item_id_color']     = $id_color;
                        $carritoItems[$i]['item_codigo_color'] = $itemcolor['codigo_color'];
                        $carritoItems[$i]['item_nombre_color'] = $itemcolor['nombre_color'];
                        //reasigno total
                        $total = ($precio * $cantidad) + $momentaneo ;
                        $this->session->set_userdata('total', $total);


                    } else {

                            $carritoItems = is_array($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : array();

                        //Busco en la BD damas datos del producto
                        $itemread  = $this->Pedidos_model->getProductos($id);
                        $itemcolor = $this->Pedidos_model->getCodigoColor($id_color);

                        if (count($itemread) > 0) {
                            $item = array(
                                'item_carroID'      => $id . '-' . $id_color,
                                'item_id'           => $itemread['id'],
                                'item_url'          => $itemread['url'],
                                'item_nom_producto' => $itemread['nom_producto'],
                                'item_codigo'       => $itemread['codigo'],
                                'item_precio'       => $itemread['precio'],
                                'item_id_color'     => $id_color,
                                'item_imagen'       => $itemread['imagen'],
                                'item_codigo_color' => $itemcolor['codigo_color'],
                                'item_nombre_color' => $itemcolor['nombre_color'],
                                'item_resumen'      => $itemread['resumen'],
                                'item_subtotal'     => $itemread['precio'] * $cantidad,
                                'item_cantidad'     => $cantidad,
                            );
                            $carritoItems[] = $item;
                            //asigno primer total
                            $global = $this->session->userdata('total');
                            $total = ($itemread['precio'] * $cantidad) + $global;
                            $this->session->set_userdata('total', $total);
                        } else {
                            redirect(base_url() . 'pedidos');
                        }
                    }
                } else {
                    //No existe producto agrego primer producto al pedido
                    $itemread  = $this->Pedidos_model->getProductos($id);
                    $itemcolor = $this->Pedidos_model->getCodigoColor($id_color);
                    if (count($itemread) > 0) {
                        $item = array(
                            'item_carroID'      => $id . '-' . $id_color,
                            'item_id'           => $itemread['id'],
                            'item_url'          => $itemread['url'],
                            'item_nom_producto' => $itemread['nom_producto'],
                            'item_codigo'       => $itemread['codigo'],
                            'item_precio'       => $itemread['precio'],
                            'item_id_color'     => $id_color,
                            'item_imagen'       => $itemread['imagen'],
                            'item_codigo_color' => $itemcolor['codigo_color'],
                            'item_nombre_color' => $itemcolor['nombre_color'],
                            'item_resumen'      => $itemread['resumen'],
                            'item_subtotal'     => $itemread['precio'] * $cantidad,
                            'item_cantidad'     => $cantidad,
                        );
                        //$carritoItems[$item['item_id']] = $item;
                        $carritoItems[] = $item;
                        //asigno primer total
                        $total = $itemread['precio'] * $cantidad;
                        $this->session->set_userdata('total', $total);
                    } else {
                        redirect(base_url() . 'pedidos');
                    }
                }
                $this->session->set_userdata('carrito_items', $carritoItems);
                //$this->session->set_userdata('observaciones', $observaciones);
                redirect(base_url() . 'pedidos');

            } else {
                redirect(base_url() . 'productos');
            }
        }
    }

    public function continuar()
    {

        if (!$this->session->userdata('usermercasub_registrado')) {
            $this->session->set_userdata('pedido_login', array('carrito' => true));
            // SI NO ESTA REGISTRADO DEBE HACERLO
            // $this->session->set_userdata('carrito',array('carrito'=>true));
            $resultado = "exito";
            $mensaje   = "Para continuar, debes ingresar a tu cuenta o registrarte.";
            $this->session->set_userdata("resultado", $resultado);
            $this->session->set_userdata("mensaje", $mensaje);
            //redirect(base_url().'frontend/ingresar_registrate/#redirectLogin');
            redirect(base_url() . 'ingresar_registrate');
        }

        $carrito                        = (!empty($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : []);
        $total = $this->session->userdata('total');
        $observaciones                  = $this->input->post('observaciones');
        $dataPrincipal                  = array();
        $seccion                        = 'pedidos';
        $dataPrincipal['seccion']       = $seccion;
        $contenido                      = $this->Generales_model->getSeccion($seccion);
        $dataPrincipal['pedido']        = $carrito;

                     if (!empty($this->session->userdata('autorizado'))) {
                        $autorizado = $this->session->userdata('autorizado');
                        if ($autorizado == "S") {
                            $dataPrincipal['cuerpo'] = 'pedido_continuartotal_view';
                        } else {
                           $dataPrincipal['cuerpo']        = 'pedido_continuar_view';
                        }

                    } else {
                        $dataPrincipal['cuerpo']        = 'pedido_continuar_view';
                    }

        $dataPrincipal['observaciones'] = $observaciones;
        $data                           = array();
        $data['seccion']                = $seccion;
        $data['title']                  = $contenido->title;
        $data['keywords']               = $contenido->keywords;
        $data['description']            = $contenido->description;

        $dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);

        $dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);

        $this->load->view("frontend/includes/template", $dataPrincipal);
    }

    public function enviar()
    {

        if (!$this->session->userdata('usermercasub_registrado')) {
            // SI NO ESTA REGISTRADO DEBE HACERLO
            $this->session->set_userdata('carrito', array('carrito' => true));
            $resultado = "exito";
            $mensaje   = "Para continuar, debes ingresar a tu cuenta o registrarte.";
            $this->session->set_userdata("resultado", $resultado);
            $this->session->set_userdata("mensaje", $mensaje);
            //redirect(base_url().'frontend/ingresar_registrate/#redirectLogin');
            redirect(base_url() . 'ingresar_registrate');
        } else {
            // OBTENEMOS LOS DATOS DEL PEDIDO
            $data               = array();
            $data['id_usuario'] = $this->session->userdata('id_usuario');
            $data['numero_cotizacion'] = '#PE/' . time();

                    //VALIDACION SI COTIZADO  NO
                    if (!empty($this->session->userdata('autorizado')))
                    {
                        $autorizado = $this->session->userdata('autorizado');
                        if ($autorizado == "S")
                        {
                        $data['estado'] = "C";
                        }
                        else {
                                $data['estado'] = "P";
                             }

                    }
                    else {
                           $data['estado'] = "P";
                         }

            $data['fecha_pedido'] = date("Y-m-d");
            $data['hora_pedido']  = date("h:i:s");
            $correo               = $this->session->userdata('usuario_email');
            //ASIGNAMOS LOS DATOS DE LA SESSION A LA VARIABLE CARRITO
            $observaciones         = $this->input->post('observaciones');
            $data['observaciones'] = $observaciones;
            $total = $this->session->userdata('total');
            $data['total'] = $total;
            //GUARDAMOS EN TBL PEDIDOS Y OBTENEMOS ID
            $id_pedido = $this->Pedidos_model->grabarPedido($data);

            // $aux = array();
            //OBTENEMOS DATOS DEL DETALLE
            $carrito = (!empty($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : []);
                $cont = 0;
                foreach ($carrito as $value)
                {
                    $datos                    = array();
                    $datos['id_pedido']       = $id_pedido;
                    $datos['id_producto']     = $value['item_id'];
                    $datos['id_color']        = $value['item_id_color'];
                    $datos['nombre_producto'] = $value['item_nom_producto'];
                    $datos['codigo']          = $value['item_codigo'];
                    $datos['imagen']          = $value['item_imagen'];
                    $datos['cantidad']        = $value['item_cantidad'];
                    $datos['precio']          = $value['item_precio'];
                    $datos['subtotal']        = $value['item_subtotal'];

                    //GRABAMOS EN TBL DETALLES
                    $id_detalle = $this->Pedidos_model->grabarDetallePedido($datos);
                    $cont += 1;
                }
            $data['carrito']         = $carrito;
            $data['correo']          = $this->session->userdata('usuario_email');
            $data['telefono']        = $this->session->userdata('usuario_telefono');
            $data['nombreUsuario']   = $this->session->userdata('nombres_usuario');
            $data['apellidoUsuario'] = $this->session->userdata('apellidos_usuario');
            $data['total'] = $this->session->userdata('total');

                  $resultado = $id_pedido;
                  if ($resultado)
                  {
                            //VALIDACION SI COTIZADO ENVIAR CON TOTAL NO ENVIAR SIN TOTAL
                            if (!empty($this->session->userdata('autorizado')))
                            {
                                $autorizado = $this->session->userdata('autorizado');
                                if ($autorizado == "S")
                                {
                                  $mensaje = $this->load->view('frontend/emails/email_pedidototal_usuario', $data, true);
                                }
                                else {
                                        $mensaje = $this->load->view('frontend/emails/email_pedido_usuario', $data, true);
                                     }

                            }
                            else {
                                    $mensaje = $this->load->view('frontend/emails/email_pedido_usuario', $data, true);
                                 }

                      $mail           = new PHPMailer();
                      $mail->From     = getConfig("remitente_correos");
                      $mail->FromName = NOMBRE_SITIO;
                      $mail->AddAddress($this->session->userdata('usuario_email'));
                      $mail->Subject = "Infomación de pedido de " . NOMBRE_SITIO;
                      $mail->Body    = $mensaje;
                      $mail->IsHTML(true);
                      @$mail->Send();

                        /************** COPIA A ADMINISTRACION ***************/
                          //VALIDACION SI COTIZADO ENVIAR CAN TOTAL NO ENVIAR SIN TOTAL
                          if (!empty($this->session->userdata('autorizado')))
                            {
                                $autorizado = $this->session->userdata('autorizado');
                                if ($autorizado == "S")
                                {
                                  $mensaje2 = $this->load->view('frontend/emails/email_pedidototal_adm', $data, true);
                                }
                                else {
                                        $mensaje2 = $this->load->view('frontend/emails/email_pedido_adm', $data, true);
                                     }
                            }
                             else {
                                    $mensaje2 = $this->load->view('frontend/emails/email_pedido_adm', $data, true);
                                  }

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

                    $resultado = "exito";
                    $mensaje   = "Su pedido se envio correctamente. Le hemos enviado un email con la copia del pedido realizado. Nos pondremos en contacto con usted a la brevedad posible.";
                    $this->session->set_userdata("resultado", $resultado);
                    $this->session->set_userdata("mensaje", $mensaje);

                    $this->session->unset_userdata('carrito');
                    $this->session->unset_userdata('carrito_items');
                    redirect(base_url() . 'pedidos');
             } else {
                $resultado = "error";
                $mensaje   = "Ocurrio un error al procesar la información";
                $this->session->set_userdata("resultado", $resultado);
                $this->session->set_userdata("mensaje", $mensaje);
                redirect(base_url() . 'pedidos');
            }

            $this->session->unset_userdata('carrito');
            $this->session->unset_userdata('carrito_items');
            $this->session->unset_userdata('total');
        }
    }
    public function borrar()
    {
        $this->session->unset_userdata('carrito');
        redirect('pedidos');
    }

    public function verpedidos()
    {
        $id                       = $this->session->userdata('id_usuario');
        $dataPrincipal            = array();
        $seccion                  = 'pedidos';
        $dataPrincipal['seccion'] = $seccion;
        $contenido                = $this->Generales_model->getSeccion($seccion);


                //VALIDACION AUTORIZADO SI O NO
               if (!empty($this->session->userdata('autorizado'))) {
                        $autorizado = $this->session->userdata('autorizado');
                        if ($autorizado == "S") {
                            $pedidos                  = $this->Pedidos_model->getPedidoAutorizado($id);
                            $dataPrincipal['pedidos'] = $pedidos;
                            $dataPrincipal['cuerpo'] = 'mis_pedidosautorizado_view';
                        } else {
                            $pedidos                  = $this->Pedidos_model->getPedido($id);
                            $dataPrincipal['pedidos'] = $pedidos;
                           $dataPrincipal['cuerpo']        = 'mis_pedidos_view';
                        }

                    } else {
                        $pedidos                  = $this->Pedidos_model->getPedido($id);
                        $dataPrincipal['pedidos'] = $pedidos;
                        $dataPrincipal['cuerpo']        = 'mis_pedidos_view';
                    }

        $data                = array();
        $data['seccion']     = $seccion;
        $data['title']       = $contenido->title;
        $data['keywords']    = $contenido->keywords;
        $data['description'] = $contenido->description;

        $dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
        $dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);
        $this->load->view("frontend/includes/template", $dataPrincipal);
    }

    public function verdetalles()
    {
        $id_pedido = $this->uri->segment(2);

        $dataPrincipal            = array();
        $seccion                  = 'pedidos';
        $dataPrincipal['seccion'] = $seccion;
        $contenido                = $this->Generales_model->getSeccion($seccion);


               //VALIDACION AUTORIZADO SI O NO
               if (!empty($this->session->userdata('autorizado'))) {
                        $autorizado = $this->session->userdata('autorizado');
                        if ($autorizado == "S") {
                            $detalles                  = $this->Pedidos_model->getDetallesAutorizado($id_pedido);
                            $dataPrincipal['detalles'] = $detalles;
                            $dataPrincipal['cuerpo'] = 'mis_detallesautorizado_view';
                        } else {
                            $detalles                  = $this->Pedidos_model->getDetalles($id_pedido);
                            $dataPrincipal['detalles'] = $detalles;
                           $dataPrincipal['cuerpo']        = 'mis_detalles_view';
                        }

                    } else {
                        $detalles                  = $this->Pedidos_model->getDetalles($id_pedido);
                        $dataPrincipal['detalles'] = $detalles;
                        $dataPrincipal['cuerpo']        = 'mis_detalles_view';
                    }

        $data                = array();
        $data['seccion']     = $seccion;
        $data['title']       = $contenido->title;
        $data['keywords']    = $contenido->keywords;
        $data['description'] = $contenido->description;

        $dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
        $dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);
        $this->load->view("frontend/includes/template", $dataPrincipal);
    }

} //END CONTROLLER
