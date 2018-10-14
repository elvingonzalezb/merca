<?php

class Ajax extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        $this->load->model('mainpanel/Ajax_model');
    }

    public function cargaSubcategoria() {
        $id_categoria = $_POST['id_categoria'];
        $aux = $this->Ajax_model->getSubcategorias($id_categoria);
        $dato=array();
        $cont=0;
        foreach ($aux as $value) {
            $id_subcategoria = $value->id_subcategoria;
            $nombre = $value->nombre;
            $url = $value->url;
            $dato[] = $id_subcategoria.'$$'.$nombre.'$$'.$url;
            $cont +=1;
        }
        $envio=$cont.'@@'.implode("@@",$dato);
        $json['dato'] = $envio;
        echo json_encode($json);
    }


    public function cargaProductos() {
        $id_subcategoria = $_POST['id_subcategoria'];
        $aux = $this->Ajax_model->getProductos($id_subcategoria);
        $dato = array();
        $cont = 0;
        foreach ($aux as $value) {
            $id_producto = $value->id;
            $nom_producto = $value->nom_producto;
            $url = $value->url;
            $dato[] = $id_producto.'$$'.$nom_producto.'$$'.$url;
            $cont +=1;
        }
        $envio=$cont.'@@'.implode("@@",$dato);
        $json['dato'] = $envio;
        echo json_encode($json);
    }

public function actualizaPedido() {
        if ($_POST) {
            $datos = $_POST;
            $indice = $datos['carro_id'];
            $json = array();

            $id_detalle  = $this->input->post('id_detalle');
            $precio  = $datos['precio'];
            $data = array();

            //BUSCO TOTAL GENERAL Y SUBTOTAL DEL DETALLE 3500
            $subtotalactual   = $this->Pedidos_model->getsubTotal($id_detalle);
            $totalactual   = $this->Pedidos_model->getTotal($subtotalactual->id_pedido);

            //RESTO SUBTOTAL ACTUAL DEL TOTAL
            $totalTemp = ($totalactual - $subtotalactual->subtotal);
            // CALCULO SUBTOTAL NUEVO 600
            $subtotalnuevo = ($subtotalactual->cantidad * $precio);
            //CALCULO TOTAL NUEVO
            $totalnuevo = ($totalTemp + $subtotalnuevo);
            $data['subtotal'] = $subtotalnuevo;
            $data['precio'] = $precio;

            $result=$this->Pedidos_model->updatePrecio($id_detalle, $data);
            $data2 = array();
            $data2['total'] = $totalnuevo;
            $resulttotal=$this->Pedidos_model->updateTotal($id_pedido, $data2);
                  $this->session->set_userdata('carrito_items', $carrito);

                    $json=array();

                    $json['dato'] = 'ok';

                    if (isset($datos['precio'])) {

                        $json['new_precio'] = $datos['precio'];

                    }else{

                     $json['new_precio'] = $item_precio;
                        }
           echo json_encode($json);

        }

    }



    }//END CONTROLLER
