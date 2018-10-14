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
            <form class="form-horizontal" action="mainpanel/catalogo/actualizar" method="post" enctype="multipart/form-data" onsubmit="return validaProducto()">
                <fieldset>
                    <legend>Ingrese nueva información del producto</legend>
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
                
                      <!-- categoria principal -->
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Categorias</label>
                        <div class="controls">
                            <select name="id_categoria" id="id_categoria" onchange="cargaSubcategorias(this.value)">
                                <option value="0">Elija la Categoria...</option>
                                    <?php
                                    foreach($categorias as $categoria)
                                    { 
                                    if($categoria->id_categoria == $producto->id_categoria)
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
                        <label class="control-label" for="typeahead">Sub Categor&iacute;as</label>
                        <div class="controls" id="divSubcategorias">
                            <select name="id_subcategoria" id="id_subcategoria">
                                <option value="0">Elija...</option>
                                     <?php
                                    foreach($subcategorias as $subcategoria)
                                    { 
                                    if($subcategoria->id_subcategoria == $producto->id_subcategoria)
                                    {  
                                    echo '<option value="'.$subcategoria->id_subcategoria.'" selected>'.$subcategoria->nombre.'</option>';  
                                    }  
                                    else  
                                    { 
                                    echo '<option value="'.$subcategoria->id_subcategoria.'">'.$subcategoria->nombre.'</option>';
                                    }   
                                    } 
                                    ?>
                            </select>
                        </div>
                    </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Noombre</label>
                            <div class="controls">
                                <input type="text" id="nom_producto" name="nom_producto" class="span8 typeahead" value="<?php echo $producto->nom_producto;?>" onkeyup="url_amigable('nom_producto', 'url', 'title'); cuentaChars(this.value, 'contador1', 155)" maxlength="155">
                                <?php
                                 $aux = 155 - strlen($producto->nom_producto) + 1; 
                                 ?>
                                    <label><span id="contador1"><?php echo $aux; ?></span> caracteres restantes</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Url</label>
                            <div class="controls">
                                <input type="text" id="url" name="url" class="span8 typeahead" value="<?php echo $producto->url;?>"> </div>
                        </div>


                      <div class="control-group">
                        <label class="control-label" for="typeahead">Codigo</label>
                        <div class="controls">
                            <input type="text" class="typeahead" id="codigo" name="codigo" value="<?php echo $producto->codigo;?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Precio</label>
                        <div class="controls">
                            <input type="text" class="typeahead" id="precio" name="precio" value="<?php echo $producto->precio;?>" >
                        </div>
                    </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Imagen</label>
                            <div class="controls">
                                <div class="span6"><img src="files/productos/medianas/<?php echo $producto->imagen; ?>" width="300" /></div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <div class="alert alert-success span10">
                                    <p><strong>La imagen a subir debe tener dimensiones de 900 x 600 pixeles. Caso contrario la imagen se forzará al tamaño indicado.</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Imagen</label>
                            <div class="controls">
                            <input type="file" name="imagen" id="imagen"> </div>
                        </div>

                       
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Resumen</label>
                                <div class="controls">
                                    <textarea id="resumen" name="resumen" rows="6" class="span8" onkeyup="cuentaChars(this.value, 'contador2', 300)" maxlength="300"><?php echo $producto->resumen;?></textarea><?php $aux = 300 - strlen($producto->resumen) + 1;?>
                                        <label><span id="contador2"><?php echo $aux; ?></span> caracteres restantes</label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Descripción</label>
                                <div class="controls">
                                    <textarea id="descripcion" name="descripcion" rows="3"><?php echo $producto->descripcion;?></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('descripcion', {
                                            width: '800px',
                                            height: '300px'
                                        });
                                    </script>
                                </div>
                            </div>
                            
                           <div class="control-group">
                                <label class="control-label" for="typeahead">Orden</label>
                                <div class="controls span10">
                                    <input type="text" class="span1 typeahead" id="orden" name="orden" value="<?php echo $producto->orden; ?>" >
                                </div>
                            </div>
                       
                      
                            <div class="control-group">
                                <label class="control-label">Estado</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="state" id="estado1" value="1" <?php if($producto->state==1) echo ' checked="checked"'; ?>> Activo </label>
                                    <div style="clear:both"></div>
                                    <label class="radio">
                                        <input type="radio" name="state" id="estado2" value="0" <?php if($producto->state==0) echo ' checked="checked"'; ?>> Inactivo </label>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Destacado</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="destacado" id="destacado1" value="1"
                                         <?php if($producto->destacado==1)
                                          echo ' checked="checked"';
                                         ?>> Si
                                    </label>
                                    <div style="clear:both"></div>
                                    <label class="radio">
                                       <input type="radio" name="destacado" id="destacado2" value="0"
                                        <?php if($producto->destacado==0)
                                         echo ' checked="checked"';
                                        ?>> No 
                                    </label>
                                </div>
                            </div>

                                                   
                                 <legend>Parámetros para SEO</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">TITLE</label>
                                        <div class="controls">
                                            <input type="text" class="span8" id="title" name="title" value="<?php echo $producto->title; ?>" >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">KEYWORDS</label>
                                        <div class="controls">
                                            <input type="text" class="span8" id="keywords" name="keywords" value="<?php echo $producto->keywords; ?>" >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="typeahead">DESCRIPTION</label>
                                        <div class="controls">
                                            <input type="text" class="span8" id="description" name="description" value="<?php echo $producto->description; ?>" >
                                        </div>
                                    </div> 

                            <div class="form-actions">
                                <input type="hidden" name="id" id="id" value="<?php echo $producto->id; ?>">
                                <input type="submit" class="btn btn-primary" value="ACTUALIZAR"> <a class="btn btn-danger" href="mainpanel/catalogo/listado">VOLVER AL LISTADO</a> </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>