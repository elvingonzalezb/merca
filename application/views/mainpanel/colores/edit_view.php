<div>
   <ul class="breadcrumb">
      <li><a href="mainpanel/colores/listado">Listado de <?php echo $current_section ?></a> <span class="divider">/</span></li>
      <li><a href="mainpanel/colores/nuevo">Nuevo color</a> <span class="divider">/</span></li>
   </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-list"></i>Modificar <?php echo $current_section ?></h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>                
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/colores/actualizar" method="post" enctype="multipart/form-data" onclick="return valida_colores()">
                <fieldset>
                    <legend>Ingrese los datos a modificar</legend>
                    <?php
                        if( isset($resultado) )
                        {
                            if($resultado=="success")
                            {
                                echo '<div class="alert alert-success">';
                                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                echo '<strong>RESULTADO:</strong> Los datos se registraron correctamente';
                                echo '</div>';
                            }
                            if($resultado=="error")
                            {
                                echo '<div class="alert alert-error">';
                                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                echo '<strong>RESULTADO:</strong> '.str_replace("%20", " ", $error);
                                echo '</div>';                                
                            }
                        }
                    ?>  
                  
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Nombre</label>
                        <div class="controls">
                            <input type="text" class="span8 typeahead" id="nombre_color" name="nombre_color" value="<?php echo $color->nombre_color; ?>" >
                        </div>
                    </div>
                       
               
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Modificar el Color</label>
                        <div class="controls">
                            <input type="text" name="codigo_color" id="codigo_color" class="jscolor {closable:true,closeText:'Close!'}" value="<?php echo $color->codigo_color;?>">
                          
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Orden</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="orden" name="orden" value="<?php echo $color->orden;?>" >
                        </div>
                    </div>   
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Estado</label>
                        <div class="controls">
                        <label class="radio">
                            <input type="radio" name="estado" value="A" <?php if($color->estado=='A'){echo 'checked';};?> />Activo
                         </label>
                         <div style="clear:both"></div>
                         <label class="radio">
                            <input type="radio" name="estado" value="I" <?php if($color->estado=='I'){echo 'checked';};?> />Inactivo
                         </label>
                        </div>
                    </div>                  
                    <div class="form-actions">
                        <input type="hidden" name="id" id="id" value="<?php echo $color->id; ?>">
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                        &nbsp;&nbsp;
                        <a class="btn btn-danger" href="mainpanel/colores/listado">VOLVER AL LISTADO</a>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div>
</div>