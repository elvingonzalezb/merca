<div class="body-content outer-top-xs">
  <div class="container">
    <div class="row inner-bottom-sm">
      <div class="shopping-cart">
<?php
$resultado = $this->session->userdata("resultado");
if (isset($resultado)) {
    switch ($resultado) {
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

if (count($carrito) > 0): ?>
        <form action="pedidos/continuar" method="post" id="form-continuar-compra">

      <div class="col-md-12 col-sm-12 shopping-cart-table ">
        <div class="table-responsive" id="pedidos_view">
          <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="cart-romove item">Borrar</th>
                      <th class="cart-description item">Imagen</th>
                      <th class="cart-product-name item">Nombre Producto</th>
                      <th class="cart-edit item">Color</th>
                      <th class="cart-qty item">Cantidad</th> 
                      <th class="cart-sub-total item">Descripcion</th>

                    </tr>
                  </thead>

                  <tfoot>
                    <tr>
                      <td colspan="7">
                        <div class="shopping-cart-btn">
                          <span class="">
                            <a href="productos" class="btn btn-upper btn-fucsia outer-left-xs bg">Seguir comprando</a>
                            <button type="submit" class="btn btn-upper btn-fucsia pull-right outer-right-xs bg">Continuar</button>

                          </span>
                        </div>
                      </td>
                    </tr>
                  </tfoot>
                <?php
$total = 0;
foreach ($carrito as $key => $item): ?>
                  <tbody>
                    <tr>
                       <td class="romove-item"><a href="javascript:deleteItem('<?=$item['item_carroID']?>')" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>

                        <td class="cart-image">
                          <a class="entry-thumbnail" href="index.php?page=detail">
                              <img src="<?=base_url('files/productos/thumbs/') . $item['item_imagen'];?>"  class="img-responsive">
                          </a>
                        </td>

                        <input type="hidden" name="item[<?=$key?>][item_carroID]" value="<?=$item['item_carroID']?>" id="carId<?=$key?>" >

                        <td style="width:350px" class="cart-product-sub-total">
                          <h4 class='fontgris'>
                            <a href="javascript:void(0)">
                              <strong><?=$item['item_nom_producto']?></strong><br>
                           </h4>   
                             <strong class="cart-product-coment fontgris">Código: <?=$item['item_codigo']?></strong>
                            </a>
                        </td>


                        <td class="cart-product-sub-total">
                          <div style="background:<?php echo $item['item_codigo_color']; ?>" class="colores" title=""></div>
                        </td>


                        <td class="cart-product-quantity">
                          <input type="hidden" value="<?=$item['item_id']?>" id="prodID_<?=$key?>">

                          <input type="text" name="item[<?=$key?>][item_cantidad]"  size="3" title="Cantidad" value="<?=$item['item_cantidad']?>" id="cant_<?=$key?>" class="input-cantidad" >

                          <a href="javascript:updateCantidad('<?=$key?>')" title="Editar cantidad" class="btn btn-updatecantidad"><i class="fa fa-pencil-square-o"></i></a>
                        </td>

                    
                         <input type="hidden" name="item[<?=$key?>][item_precio]" size="3" value="<?=$item['item_precio']?>" id="precio_<?=$key?>">
                         <input type="hidden" name="item[<?=$key?>][item_subtotal]" size="3" value="<?=$item['item_subtotal']?>" id="subtotal_<?=$key?>">
                      
                        <td class="cart-product-coment">
                          <textarea class="form-control no-required uptcoment" rows="4" onblur="updateComentario('<?=$key?>')" name="item[<?=$key?>][item_observaciones]" id="comen_<?=$key?>" style="resize: none;" ><?=(isset($item['item_observaciones']) ? $item['item_observaciones'] : '')?></textarea>
                        </td>
                    </tr>
                  </tbody>
              <?php endforeach?>
              <?php $total = $this->session->userdata('total');?>
          </table>
        </div>
      </div>
    <?php else: ?>
      <div class="alert alert-warning">Su carrito está vacío. Dirígete a la sección de nuestros productos para realizar una nueva compra dando click <a href="productos">aquí</a></div>
     <?php endif?>
    </form>
      </div>
    </div>
  </div>
</div>