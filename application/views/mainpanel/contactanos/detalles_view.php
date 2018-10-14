<div>
   <ul class="breadcrumb">
     <li><a href="mainpanel/contactanos/editTexto">Editar Texto</a> <span class="divider">/</span></li>
     <li><a href="mainpanel/contactanos/listado">Ver Mensajes</a> <span class="divider">/</span></li>
   </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-list"></i>Detalles del Mensaje</h2>
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
        	  	
						<h3><strong>Datos del Remitente</strong></h3>
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td width="30%"><strong>Nombre y apellidos:</strong></td>
									<td><?php echo $mensaje->nombre ?></td>
								</tr>
								<tr>
									<td><strong>Teléfono:</strong></td>
									<td><?php echo $mensaje->telefono; ?></td>
								</tr>
								<tr>
									<td><strong>Email:</strong></td>
									<td><?php echo $mensaje->email; ?></td>
								</tr>
							</tbody>
						</table>
						<hr> 
						<h3><strong>Datos del Mensaje</strong></h3>
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td width="30%"><strong>Fecha Mensaje:</strong></td>
									<td><?php echo $mensaje->fecha_ingreso; ?></td>
								</tr>
								<tr>
									<td><strong>Asunto:</strong></td>
									<td><?php echo $mensaje->asunto; ?></td>
								</tr>
								<tr>
									<td><strong>Mensaje:</strong></td>
									<td><?php echo $mensaje->mensaje; ?></td>
								</tr>
							</tbody>
						</table>
						<hr>                  
        
            		<div class="form-actions">
							<input type="hidden" name="id" id="id" value="<?php echo $mensaje->id; ?>">
							<!--<input type="submit" class="btn btn-primary" value="ENVIAR ">
							&nbsp;&nbsp;-->
							<a class="btn btn-danger" href="mainpanel/contactanos/listado">VOLVER AL LISTADO</a>
					</div>          
        </div>
     </div>
</div>
