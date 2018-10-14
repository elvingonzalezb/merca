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

  if (count($pedidos)>0): ?>
        <form action="" method="post" id="form-continuar-compra">
         
      <div class="col-md-12 col-sm-12 shopping-cart-table ">
        <div class="table-responsive" id="">
           <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                    <tr>
                      <th class="cart-description item">Orden</th>
                      <th class="cart-product-name item">Número de Pedido</th>
                      <th class="cart-edit item">Fecha de Pedido</th>
                      <th class="cart-romove item">Detalles</th>
                    </tr>
                  </thead>
             <?php 
                  $orden = 1 ;
                  foreach ($pedidos as $item): ?>
                   <tbody>
                      <tr>                          
                         <input type="hidden" name="id_usuario" value="<?php $item->id_usuario ?>" id="id_usuario" >
                   
                        <td class="cart-product-sub-total">
                          </span> <?php echo $orden ?> </span> 
                        </td>
                              
                    
                        <td class="cart-product-quantity">
                           </span> <?php echo $item->numero_cotizacion ?> </span> 
                        </td>
                     
                    
                        <td class="cart-product-quantity">
                         </span> <?php echo $item->fecha_pedido ?> </span> 
                        </td>
                    

                        <td class="romove-item">
                          <a href="<?=base_url('verdetalles/').$item->id ?>" title="cancel" class="icon"><i class="fa fa-bars"></i></a>
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