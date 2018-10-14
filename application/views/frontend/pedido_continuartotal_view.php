<div class="body-content outer-top-xs">
  <div class="container">
    <div class="row inner-bottom-sm">
      <div class="shopping-cart">
              <?php
              $resultado = $this->session->userdata("resultado");
              if( isset($resultado) )
              {
                switch( $resultado )
                {
                  case "exito":
                    echo '<div class="alert alert-success">';
                    echo $this->session->userdata("mensaje");
                    echo '</div>';
                  break;

                  case "error":
                    echo '<div class="alert alert-danger">';
                    echo $this->session->userdata("mensaje");
                    echo '</div>';
                  break;
                }
                $this->session->unset_userdata('resultado');
                    $this->session->unset_userdata('mensaje');
              }
            ?> 
        <form action="pedidos/enviar" method="post" id="form-continuar-compra">
    <?php
         echo'<div class="col-md-12 col-sm-12 shopping-cart-table ">';
        echo'<div class="table-responsive" id="pedidos_view">';
          echo'<table class="table table-bordered">';
                  echo'<thead>';
                    echo'<tr>';
                   
                      echo'<th class="cart-description item">Imagen</th>';
                      echo'<th class="cart-product-name item">Nombre Producto</th>';
                      echo'<th class="cart-qty item">Color</th>';
                      echo'<th class="cart-sub-total item">Cantidad</th>';
                      echo'<th class="cart-sub-total item">Precio</th>';
                      echo'<th class="cart-sub-total item">Subtotal</th>';
                    echo'</tr>';
                  echo'</thead>';
                 
                  echo'<tfoot>';
                    echo'<tr>';
                     echo' <td colspan="7">';
                       echo' <div class="shopping-cart-btn">';
                         echo' <span class="">';
                           //echo' <a href="pedidos" class="btn btn-upper btn-primary outer-left-xs bg">Editar</a>';
                            echo'<button type="submit" class="btn btn-upper btn-fucsia pull-right outer-right-xs bg">Enviar</button>';

                         echo' </span>';
                        echo'</div>';
                     echo' </td>';
                   echo' </tr>';
                  echo'</tfoot>';
 
                // $carrito=$this->session->userdata('carrito_items');
                 foreach ($pedido as $item) {
               
                    echo'<tbody>';
                      echo'<tr>';
                   
                              
                        echo'<td class="cart-image">';
                          echo'<a class="entry-thumbnail" href="index.php?page=detail">';
                              echo'<img src="files/productos/thumbs/'.$item['item_imagen'].'" alt="">';
                          echo'</a>';
                        echo'</td>';
                        
                        echo'<td style="width:350px" class="cart-product-sub-total">';
                          echo'<h4 class="cart-product-quantity">';
                            echo'<a href="index.php?page=detail"> '.$item['item_nom_producto'].'</a><br>';
                          
                          echo'</h4>';
                              echo'<strong class="cart-product-coment fontgris">Código: '.$item['item_codigo'].'</strong>';                    
                           
                       
                        echo'</td>';

                                          
                        echo'<td class="cart-product-sub-total">';
                          echo'<div style="background:'.$item['item_codigo_color'].'" class="colores" title=""></div>';
                        echo'</td>';
                        
                                          
                        echo'<td class="cart-product-quantity">';
                        echo'<span class="product-color">'.$item['item_cantidad'].'</span>';
                        echo'</td>';
                      

                      echo'<td class="cart-product-quantity">';
                      echo'<span class="product-color">'.$item['item_precio'].'</span>';
                        echo'</td>';

                        echo'<td class="cart-product-quantity">';
                          echo'<span class="product-color">'.$item['item_subtotal'].'</span>';
                        
                        echo'</td>';


                      
                    echo'</tbody>';
                        
                      
              }
               echo'<tr>';
                       echo'<th></th>';
                       echo'<th ></th>';
                       echo'<th ></th>';
                       echo'<th ></th>';
                       
                       $total = $this->session->userdata('total');
                       echo'<th class="tbltotal">Total:</th>';
                       echo'<th class="cart-product-sub-total tbltotal">'.$total .'</th>';
                       echo'</tr>';
          echo'</table>';
        echo'</div>';
      echo'</div>';
       echo'<span class=""><input type="hidden" name="observaciones" id="observaciones" class="form-control unicase-form-control " value="'.$observaciones.'"></span>';
    
    ?>
    </form>
      </div>
    </div> 
  </div>
</div>