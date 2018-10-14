<div>
    <ul class="breadcrumb">
     <li><a href="mainpanel/nosotros/editTexto/nosotros">Editar Texto</a> <span class="divider">/</span></li>
     <li><a href="mainpanel/nosotros/listado">Listado Quienes somos</a> <span class="divider">/</span></li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i>Listado Quienes Somos</h2>
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
                        <th width="30%">Título</th>
                        <th width="15%">Sección</th>
                        <th width="20%">Acción</th>
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
                            $pic = '<img src="files/nosotros/'.$imagen.'"/>';
                        }
                        else
                        {
                            $pic = '--------';
                        }                        
                        echo '<tr>';
                        echo '<td class="center">'.$seccion->id.'</td>';
                        echo '<td class="" width="400" height="300">'.$pic.'</td>';
                        echo '<td>'.$seccion->titulo.'</td>';
                        echo '<td>'.$seccion->seccion.'</td>';
                        echo '<td>';
                        echo '<a class="btn btn-info espacio" href="mainpanel/nosotros/editTexto/'.$seccion->seccion.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                         
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