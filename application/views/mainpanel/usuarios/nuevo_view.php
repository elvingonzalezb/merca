<div>
    <ul class="breadcrumb">
        <li><a href="mainpanel/usuarios/listado">Lista de Usuarios</a> <span class="divider">/</span></li>
        <li><a href="mainpanel/usuarios/nuevo">Nuevo Usuario</a></li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Nuevo Usuario</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/usuarios/grabar" method="post">
                <fieldset>
                    <legend>Ingrese los datos del nuevo usuario</legend>
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
                            <label class="control-label" for="typeahead">Nivel</label>
                            <div class="controls">
                                <select name="nivel">
                                    <option value="0">Elija el nivel...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Redactor</option>
                                    <option value="3">Editor</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Nombre</label>
                            <div class="controls">
                                <input type="text" id="nombre" name="nombre" class="span8 typeahead" value=""> </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Usuario</label>
                            <div class="controls">
                                <input type="text" id="usuario" name="usuario" class="span2 typeahead" value=""> </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Clave</label>
                            <div class="controls">
                                <input type="text" id="password" name="password" class="span2 typeahead" value=""> </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Estado</label>
                            <div class="controls">
                                <label class="radio">
                                    <input type="radio" name="estado" id="estado1" value="1" checked="checked"> Activo </label>
                                <div style="clear:both"></div>
                                <label class="radio">
                                    <input type="radio" name="estado" id="estado2" value="0"> Inactivo </label>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary" value="GRABAR"> <a class="btn btn-danger" href="mainpanel/usuarios/listado">VOLVER AL LISTADO</a> </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>