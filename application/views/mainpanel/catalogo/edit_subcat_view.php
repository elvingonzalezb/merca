<div>
    <ul class="breadcrumb">
      <li><a href="mainpanel/catalogo/listadoCategoria">Categorias</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/nuevacategoria">Nueva Categoria</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/listadoSubCategoria">SubCategorias</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/nuevaSubcategoria">Nueva SubCategoria</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/listado">Productos</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/nuevo">Nuevo Producto</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/nuevaVarColor">Nueva Variedad de Color</a> <span class="divider">/</span></li>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/catalogo/actualizarSubCategoria" method="post" enctype="multipart/form-data" onsubmit="return validaSubCategoria()">
                <fieldset>
                    <legend>Ingrese nueva información </legend>
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
                            <label class="control-label" for="typeahead">Categorías</label>
                            <div class="controls">
                                <select name="id_categoria">
                                    <option value="0">Elija la categoría...</option>
                                    <?php
                                    foreach($categorias as $categoria)
                                    { 
                                    if($categoria->id_categoria == $subcategoria->id_categoria)
                                    {  
                                    echo '<option value="'.$categoria->id_categoria.'" selected>'.$categoria->nom_cat.'</option>';  
                                    }  
                                    else  
                                    { 
                                    echo '<option value="'.$categoria->id_categoria.'">'.$categoria->nom_cat.'</option>';
                                    }   
                                    } 
                                    ?>

                               </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Nombre</label>
                            <div class="controls">
                                <input type="text" id="nombre" name="nombre" class="span8 typeahead" value="<?php echo $subcategoria->nombre;?>" onkeyup="url_amigable('nombre','url', 'title'); cuentaChars(this.value, 'contador1', 155)" maxlength="155">
                                <?php
                                 $aux = 155 - strlen($subcategoria->nombre) + 1; 
                                 ?>
                                    <label><span id="contador1"><?php echo $aux; ?></span> caracteres restantes</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Url</label>
                            <div class="controls">
                                <input type="text" id="url" name="url" class="span8 typeahead" value="<?php echo $subcategoria->url;?>"> </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Imagen</label>
                            <div class="controls">
                                <div class="span6"><img src="files/subcategorias/<?php echo $subcategoria->imagen; ?>" width="300" /></div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <div class="alert alert-success span10">
                                    <p><strong>La imagen a subir debe tener dimensiones de 600 x 600 pixeles. Caso contrario la imagen se forzará al tamaño indicado.</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Imagen</label>
                            <div class="controls">
                            <input type="file" name="imagen" id="imagen"> </div>
                        </div>
                              
                          
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Orden</label>
                        <div class="controls span10">
                            <input type="text" class="span1 typeahead" id="orden" name="orden" value="<?php echo $subcategoria->orden; ?>" >
                        </div>
                    </div>

                 <div class="control-group">
                        <label class="control-label">Estado</label>
                        <div class="controls span10">
                            <label class="radio">
                                <input type="radio" name="estado" id="estado1" value="A"<?php if($subcategoria->estado=="A") echo ' checked="checked"'; ?>>
                                Activo
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="estado" id="estado2" value="I"<?php if($subcategoria->estado=="I") echo ' checked="checked"'; ?>>
                                Inactivo
                            </label>
                        </div>
                    </div>  
                           

                    <legend>Parámetros para SEO</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">TITLE</label>
                                        <div class="controls">
                                            <input type="text" class="span8" id="title" name="title" value="<?php echo $subcategoria->title; ?>" >
                                        </div>
                                    </div>
                               
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">DESCRIPTION</label>
                                        <div class="controls">
                                            <input type="text" class="span8" id="description" name="description" value="<?php echo $subcategoria->description; ?>" >
                                        </div>
                                    </div>
                                   <div class="control-group">
                                        <label class="control-label" for="typeahead">KEYWORDS</label>
                                        <div class="controls">
                                            <input type="text" class="span8" id="keywords" name="keywords" value="<?php echo $subcategoria->keywords; ?>" >
                                        </div>
                                    </div> 

                            <div class="form-actions">
                                <input type="hidden" name="id" id="id" value="<?php echo $subcategoria->id_subcategoria; ?>">
                                <input type="submit" class="btn btn-primary" value="ACTUALIZAR"> <a class="btn btn-danger" href="mainpanel/catalogo/listadoSubCategoria">VOLVER AL LISTADO</a> </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>