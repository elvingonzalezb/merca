<div>
    <ul class="breadcrumb">
     <li><a href="mainpanel/contactanos/editTexto">Editar Texto</a> <span class="divider">/</span></li>
     <li><a href="mainpanel/contactanos/listado">Ver Mensajes</a> <span class="divider">/</span></li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i>Mensajes</h2>
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
                            <th width="1%">Nro</th>
                            <th width="15%">Nombre</th>
                            <th width="20%">Email</th>
                            <th width="25%">Asunto</th>
                            <th width="10%">Estado</th>
                            <th width="10%">Fecha</th>
                            <th width="20%">ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                       $orden = 1;
                      foreach($mensajes as $mensaje) 
                       {
                        echo '<tr>';
                        echo '<td class="center">'.$orden.'</td>';
                        echo '<td>'.$mensaje->nombre.'</td>';
                        echo '<td>'.$mensaje->email.'</td>';
                        echo '<td>'.$mensaje->asunto.'</td>';
                        if($mensaje->estado=="P")
                        {
                            echo '<td><span class="label label-important">PENDIENTE</span></td>';
                        }
                        elseif($mensaje->estado=="L")
                        {
                            echo '<td><span class="label label-success">LEIDO</span></td>';
                        }
                      
                        echo '<td>'.$mensaje->fecha_ingreso.'</td>';
                        echo '<td>';
                        echo '<a class="btn btn-info espacio" href="mainpanel/contactanos/detalles/'.$mensaje->id.'"><i class="icon-edit icon-white"></i>  Ver</a> ';
                        echo '<a class="btn btn-danger espacio" href="javascript:deleteMensaje(\''.$mensaje->id.'\')"><i class="icon-trash icon-white"></i>Borrar</a> ';
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