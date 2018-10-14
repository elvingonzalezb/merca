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
			<tbody>
				<?php
				$orden = 1;
				foreach($detalles as $detalle)
				{

					echo '<tr>';
					echo '<td class="center"><a href="#" target="_blank"><img src="files/productos/'.$detalle->imagen.'" alt="'.$detalle->nombre_producto.'"></a></td>';
					echo '<td class="center">'.$detalle->codigo.'</td>';
					echo '<td class="center">'.$detalle->nombre_producto.'</td>';
					echo '<td class="center">'.$detalle->nombre_color.'</td>';
					echo '<td class="center">'.$detalle->cantidad.'</td>';
					echo '<td class="center">'.$detalle->precio.'</td>';
					echo '<td class="center">'.$detalle->subtotal.'</td>';
					echo '</tr>';
					$orden++;
				}
				?>


	         </tbody>
            </table>
            		<div class="form-actions">
							<input type="hidden" name="cliente_id" value="<?php echo $pedido->id; ?>">
							<input type="hidden" name="id" id="id" value="<?php echo $pedido->id; ?>">

							&nbsp;&nbsp;
							<a class="btn btn-danger" href="mainpanel/pedidos/listado">VOLVER AL LISTADO</a>
					</div>
        </div>
     </div>
</div>
