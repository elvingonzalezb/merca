<?php

class Ajax extends CI_Controller {

    function __construct() {
        parent::__construct();
        
    }

   public function eliminaItemPedido() {
        $id = $_POST['id'];

        if($this->session->userdata('carrito_items'))

        {
         

            $carrito = $this->session->userdata('carrito_items');
            $global= $this->session->userdata('total');
            
          
            foreach ($carrito as $key => $value) {

                if ($value['item_carroID']==$id) {
                 $actual = ($value['item_cantidad'] * $value['item_precio']);
                 $momentaneo = ($global - $actual);
                 $this->session->unset_userdata('total');
                 $this->session->set_userdata('total', $momentaneo);
                    unset($carrito[$key]);
                }
            }
            $numItem=count($carrito);
            if($numItem == 0){
                $this->session->unset_userdata('carrito_items');
             }else{
                $this->session->set_userdata('carrito_items', $carrito);                           
            }
            $ok=array();
            $ok['dato'] = 'ok';
            $ok['num'] = $numItem;  
            echo json_encode($ok);  

        }
    }

    public function eliminaPedidos() {

        $carrito = $this->session->userdata('carrito');
        foreach ($carrito as $value) {
            $id_producto = $value['id_producto'];
            $cantidad = $value['cantidad'];
        }
        $this->session->unset_userdata('carrito');
        $ok=array();
        $ok['dato']='ok';
        $ok['num'] = 0;
        echo json_encode($ok);
    }

public function actualizaPedido() {
        if ($_POST) {
            $datos = $_POST;
            $indice = $datos['carro_id'];
            $json = array();
            $carrito = $this->session->userdata('carrito_items');
       
               if($carrito){
                    if(isset($carrito[$indice])){
                        if (isset($datos['cantidad'])) {
                             $global = $this->session->userdata('total');
                             $actual = $carrito[$indice]['item_precio'] * $carrito[$indice]['item_cantidad'];
                             $momentaneo = ($global - $actual);
                             $this->session->unset_userdata('total');

                            $carrito[$indice]['item_cantidad'] = $datos['cantidad'];
                            $carrito[$indice]['item_precio'] = $datos['precio'];
                            $carrito[$indice]['item_subtotal'] = $datos['precio'] * $datos['cantidad'];

                            $total = ($datos['precio'] * $datos['cantidad']) + $momentaneo ;
                            $this->session->set_userdata('total', $total);
                        }else{

                            $item_cantidad = $carrito[$indice]['item_cantidad'];
                            $item_precio = $carrito[$indice]['item_precio'];
                            $item_subtotal = $carrito[$indice]['item_subtotal'];

                        }

                        if (isset($datos['observaciones'])) {

                            $carrito[$indice]['item_observaciones'] = $datos['observaciones'];

                        }
                   
                    }

                    $this->session->set_userdata('carrito_items', $carrito);

                    $json=array();

                    $json['dato'] = 'ok';

                    if (isset($datos['cantidad'])) {

                        $json['new_cantidad'] = $datos['cantidad'];
                        $json['new_precio'] = $datos['precio'];
                        $json['new_subtotal'] = $datos['precio'] * $datos['cantidad'];

           
                    }else{

                        $json['new_cantidad'] = $item_cantidad;
                        $json['new_precio'] = $item_precio;
                        $json['new_subtotal'] = $item_subtotal;
                    }
                   }
           echo json_encode($json);
        }
    }

   public function actualizaPrecio() {
        $id = $_POST['id'];
         

            $carrito = $this->session->userdata('carrito_items');
            $global= $this->session->userdata('total');
            
          
            foreach ($carrito as $key => $value) {

                if ($value['item_carroID']==$id) {
                 $actual = ($value['item_cantidad'] * $value['item_precio']);
                 $momentaneo = ($global - $actual);
                 $this->session->unset_userdata('total');
                 $this->session->set_userdata('total', $momentaneo);
                    unset($carrito[$key]);
                }
            }
            $numItem=count($carrito);
            if($numItem == 0){
                $this->session->unset_userdata('carrito_items');
             }else{
                $this->session->set_userdata('carrito_items', $carrito);                           
            }
            $ok=array();
            $ok['dato'] = 'ok';
            $ok['num'] = $numItem;  
            echo json_encode($ok);  

       
    }



}//END CONTROLLER

