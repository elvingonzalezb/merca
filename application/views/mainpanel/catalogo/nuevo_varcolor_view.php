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
            <h2><i class="icon-edit"></i> Nueva Variedad de Color</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/catalogo/grabarColor" method="post" enctype="multipart/form-data" onsubmit="return validaProductoVarColor()">
                <fieldset>
                    <legend>Ingrese los datos de la nueva variedad de color</legend>
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
                            <select name="id_subcategoria" id="id_subcategoria" onchange="cargaProductos(this.value)" disabled>
                                <option value="0">-------</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Productos</label>
                        <div class="controls span10" id="divProducto">
                            <select name="id_producto" id="id_producto" disabled>
                                <option value="0">-------</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Colores</label>
                        <div class="controls span10">
                            <select name="id_color" id="id_color">
                                <option value="0">Elija el color...</option>
                                <?php 
                                foreach($colores as $color) 
                                {    
                                echo '<option value="'.$color->id.'">'.$color->nombre_color.'</option>';
                                }   
                                ?>
                            </select>
                        </div>
                    </div>
                        
                    <legend></legend>
             


                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary" value="GRABAR"> </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>