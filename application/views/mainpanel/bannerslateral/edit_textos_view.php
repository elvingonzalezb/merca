<div>
    <ul class="breadcrumb">
        <li><a href="mainpanel/inicio">Inicio</a> <span class="divider">/</span></li>
        <li><a href="mainpanel/banners/homeTextos">Texto Home </a> <span class="divider">/</span></li>
        <li><a href="mainpanel/banners/listado">Lista de Banners </a> <span class="divider">/</span></li>
        <li><a href="mainpanel/banners/nuevo">Nuevo Banner</a></li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/banners/updateTextos" method="post" enctype="multipart/form-data" onsubmit="return validar_articulo()">
                <fieldset>
                    <legend>Ingrese nuevo Textos web</legend>
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
                        <input type="submit" class="btn btn-primary" value="ACTUALIZAR">
                      </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
