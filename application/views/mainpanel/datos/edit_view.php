<div>
    <ul class="breadcrumb">
        <li><a href="mainpanel/datos/edit">Editar Perfil</a> <span class="divider">/</span></li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar Datos Personales</h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
        </div>

        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/datos/actualizar" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Modifique los datos deseados</legend>
                    <?php
                        $resultado = $this->session->userdata("resultado");
                        if(isset($resultado))
                        {
                            $mensaje = $this->session->userdata("mensaje");
                            switch($resultado)
                            {
                                case "exito":
                                    echo '<div class="alert alert-success">';
                                    echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                    echo '<strong>RESULTADO:</strong> '.$mensaje;
                                    echo '</div>';
                                break;

                                case "error":
                                    echo '<div class="alert alert-error">';
                                    echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                    echo '<strong>RESULTADO:</strong> '.$mensaje;
                                    echo '</div>';
                                break;
                            }
                            $this->session->unset_userdata("resultado");
                        }
                    ?>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Nombre</label>
                        <div class="controls span10">
                            <input type="text" class="span8 typeahead" id="nombre" name="nombre" value="<?php echo $datos->nombre; ?>" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Usuario</label>
                        <div class="controls span10">
                            <input type="text" class="span8 typeahead" id="usuario" name="usuario" value="<?php echo $datos->usuario; ?>" required="required">
                        </div>
                    </div>
                 <!--   <div class="control-group">
                        <label class="control-label span2" for="typeahead">Teléfono</label>
                        <div class="controls span10">
                            <input type="text" class="span8 typeahead" id="telefono" name="telefono" value="<?php echo $datos->telefono; ?>" required="required">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Email</label>
                        <div class="controls span10">
                            <input type="text" class="span8 typeahead" id="email" name="email" value="<?php echo $datos->email; ?>" required="required">
                        </div>
                    </div>
-->
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Password</label>
                        <div class="controls span10">
                            <input type="text" class="span4 typeahead" id="password" name="password" value="<?php echo $datos->password; ?>" required="required">
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary" value="ACTUALIZAR">
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->