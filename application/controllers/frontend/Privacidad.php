<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Privacidad extends CI_Controller {

		function __construct() {
		    parent::__construct();
			$this->load->model('frontend/Generales_model'); 
		}

		    public function agregar() {

        if (!empty($_POST)) {

            $id = $this->input->post('id');

            $cantidad = $this->input->post('cantidad');

            $color = $this->input->post('color');

            $impresion = $this->input->post('impresion');

            $atributos = array($color,$impresion); 

            if( $id != null){ //viene un ID para agregar

                

                $carritoItems = is_array($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : array();

                if (count($carritoItems)>0){ //ya existe algo en el carrito

                     

                    $flag = false;

                    for($i=0; $i<count($carritoItems); $i++){

                        if( $carritoItems[$i]['item_id'] == $id && $carritoItems[$i]['item_atributos_id'] == $color){

                            $flag = true;

                            break;

                        }

                    }

                     

                    if($flag){

                        $carritoItems[$i]['item_cantidad'] = $cantidad;

                        //$carritoItems[$i]['item_cantidad']    += $cantidad;

                    }else{

                        #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO

                        $itemread = $this->Producto->getProductById($id);

                        $itemAtributos = $this->Producto->getStockAtributos($atributos,$id);

                        if ($itemAtributos) {

                            $itemread['atributos'] = $itemAtributos;

                        }else{

                            $itemread['atributos'] = '';

                        }

                        if(count($itemread)>0){

                                $item = array(

                                    'item_carroID' => time(),

                                    'item_id' => $itemread['id'],

                                    'item_nombre' => $itemread['nombre'],

                                    'item_precio' => '0',

                                    'item_imagen' => $itemread['imagen'],

                                    'item_atributos_id' => $color,

                                    'item_atributos' => $itemread['atributos'],

                                    'item_cantidad' => $cantidad

                                );

                                $carritoItems[] = $item;

                        }else{

                            redirect(base_url().'cotizacion');

                        }

                    }

                }else{ #no hay ningun producto en la cesta, leer la info del producto y agregar a la sesion

                    #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO

                    $itemread = $this->Producto->getProductById($id);

                    $itemAtributos = $this->Producto->getStockAtributos($atributos,$id);

                    if ($itemAtributos) {

                        //$itemread['precio'] = (!empty($itemAtributos['precio']))? $itemAtributos['precio'] : $itemAtributos['precio_oferta'];

                        $itemread['atributos'] = $itemAtributos;

                    }else{

                        $itemread['atributos'] = '';

                    }

                    if(count($itemread)>0){

                            $item = array(

                                    'item_carroID' => time(),

                                    'item_id' => $itemread['id'],

                                    'item_nombre' => $itemread['nombre'],

                                    'item_precio' => '0',

                                    'item_imagen' => $itemread['imagen'],

                                    'item_atributos_id' => $color,

                                    'item_atributos' => $itemread['atributos'],

                                    'item_cantidad' => $cantidad

                                );

                                //$carritoItems[$item['item_id']] = $item;

                                $carritoItems[] = $item;

                    }else{

                        redirect(base_url().'cotizacion');

                    }

                }

                $this->session->set_userdata('carrito_items',$carritoItems);

                redirect(base_url().'cotizacion');

            }

        }else{

            redirect(base_url().'cotizacion');

        }

    }





        
	}
