<div>
    <ul class="breadcrumb">
      
       
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i>Listado de Información General</h2>
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
                        <th>Imagen</th>
                        <th width="20%">Título</th>
                        <th width="40%">Descripción</th>
                        <th width="20%">Sección</th>
                        <th width="32%">Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                    foreach($generales as $seccion)
                    {
                        $imagen = $seccion->imagen;
                        if($imagen!="")
                        {
                            $pic = '<img src="files/textosweb/'.$imagen.'"/>';
                        }
                        else
                        {
                            $pic = '--------';
                        }                        
                        echo '<tr>';
                        echo '<td class="center">'.$seccion->id.'</td>';
                        echo '<td class="celdaImagen">'.$pic.'</td>';
                        echo '<td>'.$seccion->titulo.'</td>';
                        echo '<td>'.$seccion->fulltext.'</td>';
                        echo '<td><span class="label label-success" >'.$seccion->seccion.'</span></td>';
                    
                        echo '<td>';
                        echo '<a class="btn btn-info espacio" href="mainpanel/informativa/edit/'.$seccion->id.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                      
         
                        echo '</td>';
                        echo '</tr>';
                        $orden++;
                    }
                ?>
                </tbody>
            </table>            
        </div>
     </div><!--/span-->
</div><!--/row-->