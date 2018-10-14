<div>
   <ul class="breadcrumb">
     <li><a href="mainpanel/stock/listado">Listado </a> <span class="divider">/</span></li>
     <li><a href="mainpanel/stock/nuevo">Nuevo Catalogo </a> <span class="divider">/</span></li>
   </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar Stock</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/stock/actualizar" method="post" enctype="multipart/form-data" onsubmit="return validar_articulo()">
                <fieldset>
                    <legend>Ingrese la información que desea modificar</legend>
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
                        <label class="control-label span2" for="typeahead">Titulo</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="titulo" name="titulo" value="<?php echo $stock->titulo; ?>" >
                        </div>
                    </div>
                     
                    <?php
                        if($stock->imagen != "")
                        {
                    ?>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Imagen actual</label>
                        <div class="controls span4">
                            <img src="files/stock/<?php echo $stock->imagen; ?>">
                        </div>
                    </div>                    
                    <?php
                        }
                    ?>
                    
                    <div class="control-group">
                        <div class="controls">
                            <div class="alert alert-success span10">
                            <p><strong>La imagen a subir debe tener dimensiones de 300 x 400 pixeles. Caso contrario la imagen se forzará al tamaño indicado.</strong></p>
                            </div> 
                        </div>
                    </div>   
                    <div class="control-group">
                    <label class="control-label">Imagen</label>
                        <div class="controls">
                          <input type="file" name="imagen" id="imagen" accept=".jpg, .png">
                        </div>
                    </div> 
                 
                     
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Archivo</label>
                            <div class="controls">
                                <div class="span6"><embed src="files/stock/<?php echo $stock->archivo; ?>" width="500" height="375" accept="application/pdf"></div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <div class="alert alert-success span10">
                                    <p><strong>Los archivos a subir deben ser tipo PDF.</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Archivo PDF</label>
                            <div class="controls">
                              <!-- <input type="file" name="archivo" id="archivo" accept="application/msword, .doc, .docx, application/msexcel, .xls, .xlsx, application/pdf">-->
                                <input type="file" name="archivo" id="archivo" accept="application/pdf">

                                <input type="hidden" name="fecha" id="fecha" value="<?php echo date("Y/m/d"); ?>">
                        </div>
                         
                        <div class="form-actions">
                                <input type="hidden" name="id" id="id" value="<?php echo $stock->id; ?>">
                                <input type="submit" class="btn btn-primary" value="ACTUALIZAR"> <a class="btn btn-danger" href="mainpanel/stock/listado">VOLVER AL LISTADO</a>
                        </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
