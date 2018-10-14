<div>
    <ul class="breadcrumb">
      <li><a href="mainpanel/registro_usuarios/listado">Lista de Usuarios</a> <span class="divider">/</span></li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/registro_usuarios/actualizar" method="post">
                <fieldset>
                    <legend>Ingrese los datos de los usuarios registrados</legend>
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
                       <div class="control-group">
                            <label class="control-label" for="typeahead">Nombres</label>
                            <div class="controls">
                                <input type="text" id="nombres" name="nombres" class="span4 typeahead" value="<?php echo $usuario->nombres;?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Apellidos</label>
                            <div class="controls">
                              <input type="text" id="apellidos" name="apellidos" class="span4 typeahead" value="<?php echo $usuario->apellidos;?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Teléfono</label>
                            <div class="controls">
                              <input type="text" id="telefono" name="telefono" class="span2 typeahead" value="<?php echo $usuario->telefono;?>"> 
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Correo electrónico</label>
                            <div class="controls">
                                <input type="text" id="email" name="email" class="span4 typeahead" value="<?php echo $usuario->email;?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Clave</label>
                            <div class="controls">
                                <input type="text" id="clave" name="clave" class="span2 typeahead" value="<?php echo $usuario->clave;?>">
                            </div>
                        </div>

                       <div class="control-group">
                        <label class="control-label ">Estado</label>
                        <div class="controls span10">
                            <label class="radio">
                                <input type="radio" name="estado" id="estado1" value="A"<?php if($usuario->estado=="A") echo ' checked="checked"'; ?>>
                                Activo
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="estado" id="estado2" value="I"<?php if($usuario->estado=="I") echo ' checked="checked"'; ?>>
                                Inactivo
                            </label>
                        </div>
                      </div> 
                      <div class="control-group">
                        <label class="control-label ">Ver Precio</label>
                        <div class="controls span10">
                            <label class="radio">
                                <input type="radio" name="autorizado" id="autorizado1" value="S"<?php if($usuario->autorizado=="S") echo ' checked="checked"'; ?>>
                                Si
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="autorizado" id="autorizado2" value="N"<?php if($usuario->autorizado=="N") echo ' checked="checked"'; ?>>
                                No
                            </label>
                        </div>
                      </div>  
                        <?php
                         $f = explode(" ", $usuario->fecha_registro);
                         $fecha = Ymd_2_dmY($f[0]);
                         ?>
                          <div class="control-group">
                                <label class="control-label" for="fecha_registro">Fecha registro</label>
                                <div class="controls">
                                    <input type="text" class="input-small datepicker" value="<?php echo $fecha; ?>" id="fecha_registro" name="fecha_registro"> <span class="etiqueta">*</span> </div>
                            </div>

                        <div class="form-actions">
                           <input type="hidden" name="id" id="id" value="<?php echo $usuario->id; ?>">
                            <input type="submit" class="btn btn-primary" value="GRABAR"> <a class="btn btn-danger" href="mainpanel/registro_usuarios/listado">VOLVER AL LISTADO</a>
                        </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>