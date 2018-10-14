<div>
    <ul class="breadcrumb">
        <li><a href="mainpanel/categorias/listado">Listado de Categorias</a> <span class="divider">/</span></li>
        <li><a href="mainpanel/categorias/nuevacategoria">Nueva Categoria</a> <span class="divider">/</span></li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Nueva Categoría</h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
        </div>

        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/categorias/grabarCategoria" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Ingrese los datos de la nueva categoría</legend>
                    <?php
                        if( isset($resultado) )
                        {
                            if($resultado=="success")
                            {
                                echo '<div class="alert alert-success">';
                                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                echo '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente';
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
                        <label class="control-label span2" for="typeahead">Categoria</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="categoria" name="categoria" value="" onkeyup="url_amigable('categoria', 'url', 'title');" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">URL</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="url" name="url" value="" >
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <div class="alert alert-success span10">
                            <p><strong>La imagen a subir debe tener dimensiones de 1080 x 760 pixeles. Caso contrario la imagen se forzará al tamaño indicado.</strong></p>
                            </div> 
                        </div>
                    </div>   
                    <div class="control-group">
                    <label class="control-label">Banner</label>
                        <div class="controls">
                          <input type="file" name="imagen" id="imagen">
                        </div>
                    </div>                 

                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Orden</label>
                        <div class="controls span10">
                            <input type="text" class="span1 typeahead" id="orden" name="orden" value="" >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label span2">Estado</label>
                        <div class="controls span10">
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
                    

                    <legend>Parámetros para SEO</legend>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">TITLE</label>
                        <div class="controls">
                            <input type="text" class="span6" id="title" name="title" value="" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">KEYWORDS</label>
                        <div class="controls">
                            <input type="text" class="span6" id="keywords" name="keywords" value="" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">DESCRIPTION</label>
                        <div class="controls">
                            <input type="text" class="span6" id="description" name="description" value="" >
                        </div>
                    </div>                    

                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                        <a class="btn btn-danger" href="mainpanel/categorias/listado">VOLVER AL LISTADO</a>
                    </div>

                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->