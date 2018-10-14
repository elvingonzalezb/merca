<div>
    <ul class="breadcrumb">
        <li><a href="mainpanel/categorias/listado">Listado de Categorias</a> <span class="divider">/</span></li>
        <li><a href="mainpanel/categorias/nuevacategoria">Nueva Categoria</a> <span class="divider">/</span></li>
     
    
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar Categorías </h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
        </div>

        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/categorias/actualizarCategoria" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Modifique los datos deseados</legend>
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
                        }   
                        ?>
               

                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Categoría</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="categoria" name="categoria" value="<?php echo $categoria->categoria; ?>" onkeyup="url_amigable('categoria', 'url', 'title');" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">URL</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="url" name="url" value="<?php echo $categoria->url; ?>" >
                        </div>
                    </div>

                    <?php
                        if($categoria->banner != "")
                        {
                    ?>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Banner actual</label>
                        <div class="controls span4">
                            <img src="files/categorias/<?php echo $categoria->banner; ?>">
                        </div>
                    </div>                    
                    <?php
                        }
                    ?>
                    
                    <div class="control-group">
                        <div class="controls">
                            <div class="alert alert-success span10">
                            <p><strong>La imagen a subir debe tener dimensiones de 1080 x 780 pixeles. Caso contrario la imagen se forzará al tamaño indicado.</strong></p>
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
                            <input type="text" class="span1 typeahead" id="orden" name="orden" value="<?php echo $categoria->orden; ?>" >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label span2">Estado</label>
                        <div class="controls span10">
                            <label class="radio">
                                <input type="radio" name="estado" id="estado1" value="A"<?php if($categoria->estado=="A") echo ' checked="checked"'; ?>>
                                Activo
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="estado" id="estado2" value="I"<?php if($categoria->estado=="I") echo ' checked="checked"'; ?>>
                                Inactivo
                            </label>
                        </div>
                    </div>  
                          
                    <legend>Parámetros para SEO</legend>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">TITLE</label>
                        <div class="controls">
                            <input type="text" class="span8" id="title" name="title" value="<?php echo $categoria->title; ?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">KEYWORDS</label>
                        <div class="controls">
                            <input type="text" class="span8" id="keywords" name="keywords" value="<?php echo $categoria->keywords; ?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">DESCRIPTION</label>
                        <div class="controls">
                            <input type="text" class="span8" id="description" name="description" value="<?php echo $categoria->description; ?>" >
                        </div>
                    </div>                      

                    <div class="form-actions">
                        <input type="hidden" name="id" id="id" value="<?php echo $categoria->id; ?>">
                        <input type="submit" class="btn btn-primary" value="ACTUALIZAR">
                        <a class="btn btn-danger" href="mainpanel/categorias/listado">VOLVER AL LISTADO</a>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->