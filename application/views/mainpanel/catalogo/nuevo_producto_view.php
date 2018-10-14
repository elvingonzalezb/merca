<div>
    <ul class="breadcrumb">
     <li><a href="mainpanel/catalogo/listadoCategoria">Categorias</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/nuevacategoria">Nueva Categoria</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/listadoSubCategoria">SubCategorias</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/nuevaSubcategoria">Nueva SubCategoria</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/listado">Productos</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/nuevo">Nuevo Producto</a> <span class="divider">/</span></li>
      <li><a href="mainpanel/catalogo/nuevaVarColor">Nueva Variedad de Color</a> <span class="divider">/</span></li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Nuevo Producto</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/catalogo/grabar" method="post" enctype="multipart/form-data" onsubmit="return validaProducto()">
                <fieldset>
                    <legend>Ingrese los datos del nuevo producto</legend>
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
                        <div class="controls span10">
                            <select name="id_categoria" id="id_categoria" onchange="cargaSubcategorias(this.value)">
                                <option value="0">Elija la Categoria...</option>
                            <?php
                                foreach($categorias as $categoria)
                                {
                                    echo '<option value="'.$categoria->id_categoria.'">'.$categoria->nom_cat.'</option>';
                                }
                            ?>
                          </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Subcategorias</label>
                        <div class="controls span10" id="divSubcategorias">
                            <select name="id_subcategoria" disabled>
                                <option value="0">-------</option>
                            </select>
                        </div>
                    </div>


                        <div class="control-group">
                            <label class="control-label" for="typeahead">Nombre</label>
                            <div class="controls">
                                <input type="text" id="nom_producto" name="nom_producto" class="span8 typeahead" value="" onkeyup="url_amigable('nom_producto', 'url', 'title'); cuentaChars(this.value, 'contador1', 155)" maxlength="155">
                                <label><span id="contador1">155</span> caracteres restantes</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Url</label>
                            <div class="controls">
                                <input type="text" id="url" name="url" class="span8 typeahead" value=""> </div>
                        </div>

                      <div class="control-group">
                        <label class="control-label" for="typeahead">Codigo</label>
                        <div class="controls">
                            <input type="text" class="typeahead" id="codigo" name="codigo" value="" >
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label" for="typeahead">Precio</label>
                        <div class="controls">
                            <input type="text" class="typeahead" id="precio" name="precio" value="0.00" >
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
                                <input type="file" name="imgprod" id="imgprod" accept=".jpg, .png"> </div>
                        </div>

                      
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Resumen</label>
                            <div class="controls">
                                <textarea id="resumen" name="resumen" rows="6" class="span8" onkeyup="cuentaChars(this.value, 'contador2', 300)" maxlength="300"></textarea>
                                <label><span id="contador2">300</span> caracteres restantes</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Descripción</label>
                            <div class="controls">
                                <textarea id="descripcion" name="descripcion" rows="3"></textarea>
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
                            <input type="text" class="span1 typeahead" id="orden" name="orden" value="" >
                        </div>
                    </div>
                    
                        <div class="control-group">
                            <label class="control-label">Estado</label>
                            <div class="controls">
                                <label class="radio">
                                    <input type="radio" name="state" id="estado1" value="1" checked="checked"> Activo </label>
                                <div style="clear:both"></div>
                                <label class="radio">
                                    <input type="radio" name="state" id="estado2" value="0"> Inactivo </label>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">Destacado</label>
                            <div class="controls">
                                <label class="radio">
                                    <input type="radio" name="destacado" id="destacado1" value="1" checked="checked"> Si </label>
                                <div style="clear:both"></div>
                                <label class="radio">
                                    <input type="radio" name="destacado" id="destacado2" value="0"> No </label>
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
                            <input type="submit" class="btn btn-primary" value="GRABAR"> <a class="btn btn-danger" href="mainpanel/catalogo/listado">VOLVER AL LISTADO</a> </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>