<div>
   <ul class="breadcrumb">
      <li><a href="mainpanel/colores/listado">Listado de <?php echo $current_section ?></a> <span class="divider">/</span></li>
      <li><a href="mainpanel/colores/nuevo">Nuevo color</a> <span class="divider">/</span></li>
   </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-list"></i>Agregar <?php echo $current_section ?></h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>                
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/colores/grabar" method="post" enctype="multipart/form-data" onsubmit="return validaColor()">
                <fieldset>
                    <legend>Ingrese los datos</legend>
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
                            <input type="text" class="span6 typeahead" id="nombre_color" name="nombre_color" value="" >
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Color</label>
                        <div class="controls">
                            <input type="text" name="codigo_color" id="codigo_color" class="jscolor {closable:true,closeText:'Close!'}" value="ff3300">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Orden</label>
                        <div class="controls">
                            <input type="text" class="typeahead" id="orden" name="orden" value="" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Estado</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="estado" id="estado1" value="A" checked="checked">
                                Activo
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="estado" id="estado2" value="I">
                                Inactivo
                            </label>
                        </div>
                    </div>                    
                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                        &nbsp;&nbsp;
                        <a class="btn btn-danger" href="mainpanel/colores/listado">VOLVER AL LISTADO</a>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div>
</div>