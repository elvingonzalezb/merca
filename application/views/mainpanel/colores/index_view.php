<div>
   <ul class="breadcrumb">
      <li><a href="mainpanel/colores/listado">Listado de <?php echo $current_section ?></a> <span class="divider">/</span></li>
      <li><a href="mainpanel/colores/nuevo">Nuevo color</a> <span class="divider">/</span></li>
   </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-list"></i>Listado de <?php echo $current_section ?></h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>
            </div>
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
                        <th width="15%">Código Color</th>
                        <th width="10%">Color</th>
                        <th width="10%">Orden</th>
                        <th width="10%">Estado</th>
                        <th width="25%">Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                    foreach($listado as $lista)
                    {
                        echo '<tr>';
                        echo '<td class="center">'.$orden.'</td>';
                        echo '<td>'.$lista->nombre_color.'</td>';
                        echo '<td>'.$lista->codigo_color.'</td>';
                        echo '<td><div style="background:'.$lista->codigo_color.'; width:50px;height:50px;border:#000 solid 1px;"</div></td>';
                        echo '<td>'.$lista->orden.'</td>';
                        if($lista->estado=='A')
                        {
                            echo '<td><span class="label label-success">ACTIVO</span></td>';
                        }
                        else
                        {
                            echo '<td><span class="label label-important">INACTIVO</span></td>';
                        }
                        echo '<td>';
                        echo '<a class="btn btn-info espacio" href="mainpanel/colores/edit/'.$lista->id.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                        echo '<a class="btn btn-danger espacio" href="javascript:deleteColor(\''.$lista->id.'\')"><i class="icon-trash icon-white"></i>Borrar</a> ';
                        echo '</td>';
                        echo '</tr>';
                        $orden++;
                    }
                ?>
                </tbody>
            </table>            
        </div>
     </div>
</div>