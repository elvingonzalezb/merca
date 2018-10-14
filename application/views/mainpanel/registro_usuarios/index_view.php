<div>
    <ul class="breadcrumb">
     <li><a href="mainpanel/registro_usuarios/listado">Lista de Usuarios</a> <span class="divider">/</span></li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i>Usuarios</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
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
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th width="5%">Nro</th>
                            <th width="15%">Nombre</th>
                            <th width="15%">Apellidos</th>
                            <th width="10%">Teléfono</th>
                            <th width="25%">Email</th>
                            <th width="10%">Estado</th>
                            <th width="10%">Ver Precio</th>
                            <th width="20%">ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                       $orden = 1;
                      foreach($usuarios as $usuario) 
                       {
                        echo '<tr>';
                        echo '<td class="center">'.$orden.'</td>';
                        echo '<td>'.$usuario->nombres.'</td>';
                        echo '<td>'.$usuario->apellidos.'</td>';
                        echo '<td>'.$usuario->telefono.'</td>';
                        echo '<td>'.$usuario->email.'</td>';
                        if($usuario->estado=="A")
                        {
                            echo '<td><span class="label label-success">ACTIVO</span></td>';
                        }
                        else
                        {
                            echo '<td><span class="label label-important">INACTIVO</span></td>';
                        }
                        if($usuario->autorizado=="S")
                        {
                            echo '<td><span class="label label-success">SI</span></td>';
                        }
                        else
                        {
                            echo '<td><span class="label label-important">NO</span></td>';
                        }
                        echo '<td>';
                        echo '<a class="btn btn-info espacio" href="mainpanel/registro_usuarios/edit/'.$usuario->id.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                        echo '<a class="btn btn-danger espacio" href="javascript:deleteRegistroUsuario(\''.$usuario->id.'\')"><i class="icon-trash icon-white"></i>Borrar</a> ';
                        echo '</td>'; 
                        echo '</tr>'; 
                        $orden++;
                     }
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
    <!--/span-->
</div>
<!--/row-->