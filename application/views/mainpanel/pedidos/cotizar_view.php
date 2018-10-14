<div>
   <ul class="breadcrumb">
     <li><a href="mainpanel/pedidos/listado">Listado </a> <span class="divider">/</span></li>
   </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-list"></i>Detalles del Pedido</h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>
            </div>
        </div>

        <div class="box-content">
        <?php
            if($this->session->userdata('success'))
            {
                echo '<div class="alert alert-success">';
                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                echo $this->session->userdata('success');
                echo '</div>';
                $this->session->unset_userdata('success');
            }
            if($this->session->userdata('error'))
            {
                echo '<div class="alert alert-error">';
                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                echo $this->session->userdata('error');
                echo '</div>';
                $this->session->unset_userdata('error');
            }
        ?>
        	  			<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td width="15%"><strong>Nro de Pedido:</strong></td>
									<td><?php echo $pedido->numero_cotizacion; ?></td>
								</tr>
								<tr>
									<td><strong>Fecha Pedido:</strong></td>
									<td><?php echo $pedido->fecha_pedido; ?></td>
								</tr>
							</tbody>
						</table>
						<hr>
						<h3><strong>Datos del Cliente</strong></h3>
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td width="30%"><strong>Nombre y apellidos:</strong></td>
									<td><?php echo $pedido->nombres." ".$pedido->apellidos; ?></td>
								</tr>
								<tr>
									<td><strong>Teléfono:</strong></td>
									<td><?php echo $pedido->telefono; ?></td>
								</tr>
								<tr>
									<td><strong>Email:</strong></td>
									<td><?php echo $pedido->email; ?></td>
								</tr>
							</tbody>
						</table>
						<hr>
        <table class="table table-striped table-bordered bootstrap-datatable">
            <thead>
                <tr>
                    <th width="15%">Imagen</th>
                    <th width="15%">Código Pedido</th>
                    <th width="5%">Nombre Producto</th>
                    <th width="15%">Color</th>
                    <th width="15%">Cantidad</th>
                    <th width="15%">Precio</th>
                    <th width="15%">Subtotal</th>
                </tr>
            </thead>
            <?php
			foreach ($detalles as $key => $detalle):
			$orden = 1;
			?>

			<tbody>

			<form class="form-horizontal" action="mainpanel/pedidos/actualizar" method="post" enctype="multipart/form-data" onsubmit="return validaProducto()">
			<tr>
			<td class="center"><a href="#" target="_blank"><img src="files/productos/<?=$detalle->imagen?>" alt=""></a></td>
			<td class="center"><?=$detalle->codigo?></td>
			<td class="center"><?=$detalle->nombre_producto?></td>
			<td class="center"><?=$detalle->nombre_color?></td>
			<td class="center"><?=$detalle->cantidad?></td>
			<td><input type="text" name="precio[]" size="1" title="precio" value="<?=$detalle->precio?>" id="precio" class="input-cantidad"> <button type="submit" class="btn btn-success boton-cantidad"> Actualizar</button></td>
			<td class="center"><?=$detalle->subtotal?></td>
			</tr>
			<input type="hidden" name="cantidad" value="<?=$detalle->cantidad?>" id="cantidad">
			<input type="hidden" name="subtotal" value="<?=$detalle->subtotal?>" id="subtotal">
			<input type="hidden" name="id_detalle[]" value="<?=$detalle->id?>" id="id_detalle">
			<input type="hidden" name="id_pedido" value="<?=$pedido->id?>" id="id_pedido">
			</form>
	         </tbody>

  <?php
$orden++;
   endforeach
  ?>
            </table>
            		<div class="form-actions">

							&nbsp;&nbsp;

						<a class="btn btn-danger" href="mainpanel/pedidos/enviar/<?php echo $pedido->id; ?>">Enviar</a>
					</div>
        </div>
     </div>
</div>
