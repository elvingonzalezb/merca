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
      
 <?php

  if (count($detalles)>0): ?>
        <form action="pedidos/continuar" method="post" id="form-continuar-compra">
         
      <div class="col-md-12 col-sm-12 shopping-cart-table ">
        <div class="table-responsive" id="">
           <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                    <tr>
                      <th class="cart-description item">Orden</th>
                      <th class="cart-edit item">Imagen</th>
                      <th class="cart-product-name item">Nombre Producto</th>
                      <th class="cart-edit item">Color</th>
                      <th class="cart-romove item">Cantidad</th>
                    </tr>
                  </thead>
             <?php 
                  $orden = 1 ;
                  foreach ($detalles as $item): ?>
                   <tbody>
                      <tr>                          
                      
                   
                        <td class="cart-product-sub-total">
                          </span> <?php echo $orden ?> </span> 
                        </td>
                              
                        <td class="cart-product-quantity">
                          <img src="<?=base_url('files/productos/thumbs/').$item->imagen ?>"  class="img-responsive">
                        </td>
                        
                        <td class="cart-product-quantity">
                           <strong><?php echo $item->nombre_producto ?></strong><br>
                           </span>  Código: </span> 
                           <strong><?php echo $item->codigo ?></strong><br>
                        </td>
                     
                    
                        <td class="cart-product-quantity">
                         <div style="background:<?php echo $item->codigo_color;?>" class="colores" title=""></div> 
                        </td>
                    

                        <td class="cart-product-quantity">
                          </span> <?php echo $item->cantidad ?> </span> 
                        </td>
                   
                      
                       <?php $orden++;  ?>                                      
                     </tr>
                
                    </tbody>
                    
              <?php endforeach ?>
          </table>
        </div>
      </div>
    <?php else: ?>
      <div class="alert alert-warning">No posee pedidos. Dirígete a la sección de nuestros productos para realizar un pedido dando click <a href="productos">aquí</a></div>
     <?php endif ?>
    </form>
      </div>
    </div> 
  </div>
</div>