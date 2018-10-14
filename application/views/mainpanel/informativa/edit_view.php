<div>
    <ul class="breadcrumb">
       
        <li><a href="mainpanel/informativa/listado">Listado Textos Varios</a> <span class="divider"></span></li>
     
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/informativa/actualizar/<?php echo $generales->id;?>" method="post" enctype="multipart/form-data" onsubmit="return validar_articulo()">
                <fieldset>
                    <legend>Ingrese nueva información general</legend>
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
                            <label class="control-label" for="typeahead">Título</label>
                            <div class="controls">
                                <input type="text" id="titulo" name="titulo" class="span8 typeahead" value="<?php echo $generales->titulo;?>" onkeyup="url_amigable('titulo', 'url', 'title'); cuentaChars(this.value, 'contador1', 155)" maxlength="155">
                                <?php  
                                    $aux = 155 - strlen($generales->titulo) + 1;  
                                 ?>
                                    <label><span id="contador1"><?php echo $aux; ?></span> caracteres restantes</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Url</label>
                            <div class="controls">
                                <input type="text" id="url" name="url" class="span8 typeahead" value="<?php echo $generales->url;?>"> </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Imagen</label>
                            <div class="controls">
                                <div class="span6"><img src="files/informativa/<?php echo $generales->imagen; ?>" width="300" /></div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <div class="alert alert-success span10">
                                    <p><strong>La imagen a subir debe tener dimensiones de 1280 x 565 pixeles. Caso contrario la imagen se forzará al tamaño indicado.</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Imagen</label>
                            <div class="controls">
                                <input type="file" name="imagen" id="imagen"> </div>
                        </div>
                       
                       
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Descripción</label>
                                <div class="controls">
                                    <textarea id="fulltext" name="fulltext" rows="3">
                                        <?php echo $generales->fulltext;?>
                                    </textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('fulltext', {
                                            width: '800px',
                                            height: '300px'
                                        });
                                    </script>
                                </div>
                            </div>
                               
                            <div class="control-group">
                                <label class="control-label">Estado</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="hidden" name="state" id="estado1" value="3"> 
                                    </label>
                               
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Sección</label>
                                <div class="controls">
                                    <input type="text" id="seccion" name="seccion" class="span8 typeahead" value="<?php echo $generales->seccion;?>" readonly >
                                </div>
                            </div>
                               <legend> Parámetros SEO</legend>
                         <div class="control-group">
                            <label class="control-label" for="typeahead">Title</label>
                            <div class="controls">
                                <input type="text" id="title" name="title" class="span8 typeahead" value="<?php echo $generales->title;?>">
                            </div>
                        </div>
                           <div class="control-group">
                            <label class="control-label" for="typeahead">Description</label>
                            <div class="controls">
                                <input type="text" id="description" name="description" class="span8 typeahead" value="<?php echo $generales->description;?>">
                            </div>
                        </div>
                         <div class="control-group">
                            <label class="control-label" for="typeahead">keywords</label>
                            <div class="controls">
                                <input type="text" id="keywords" name="keywords" class="span8 typeahead" value="<?php echo $generales->keywords;?>">
                            </div>
                        </div>
                           
                            <div class="form-actions">
                                <input type="hidden" name="id" id="id" value="<?php echo $generales->id; ?>">
                                <input type="submit" class="btn btn-primary" value="ACTUALIZAR"> <a class="btn btn-danger" href="mainpanel/informativa/listado">VOLVER AL LISTADO</a> </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
