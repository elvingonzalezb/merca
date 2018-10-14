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
            <h2><i class="icon-edit"></i> Editar</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/catalogo/actualizarVariedadColor" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Ingrese nueva información del color</legend>
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
                <label class="control-label" for="typeahead">Colores</label>
                <div class="controls span10">
                    <select name="id_color" id="id_color">
                        <option value="0">Elija el color...</option>
                        <?php
                         foreach($colores as $color) 
                           { 
                             if($color->id == $productoxcolor->id_color)
                               {  
                                echo '<option value="'.$color->id.'" selected>'.$color->nombre_color.'</option>';
                               }  
                               else  
                               { 
                                echo '<option value="'.$color->id.'">'.$color->nombre_color.'</option>';
                               }   
                            } 
                        ?>
                    </select>
                </div>
            </div>

         <div class="form-actions">
            <input type="hidden" name="id_subcategoria" id="id_subcategoria" value="<?php echo $productoxcolor->id_subcategoria; ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $productoxcolor->id; ?>">

            <input type="submit" class="btn btn-primary" value="ACTUALIZAR">
         </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>