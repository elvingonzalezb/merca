<div>
   <ul class="breadcrumb">
     <li><a href="mainpanel/stock/listado">Listado </a> <span class="divider">/</span></li>
     <li><a href="mainpanel/stock/nuevo">Nuevo Catalogo </a> <span class="divider">/</span></li>
   </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-list"></i>Listado de Stock</h2>
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
                        <th width="20%">Imagen</th>
                        <th width="20%">Archivo PDF</th>
                        <th width="15%">Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                    foreach($listado as $lista)
                    {
                        $imagen = $lista->imagen;
                        if($imagen!="")
                        {
                            $pic = '<img src="files/stock/'.$imagen.'"/>';
                        }
                        else
                        {
                            $pic = '--------';
                        } 
                         echo '<tr>';
                        echo '<td>'.$orden.'</td>';
                        echo '<td>'.$lista->titulo.'</td>';
                        echo '<td class="celdaImagen">'.$pic.'</td>';
                        echo '<td> <embed src="files/stock/'.$lista->archivo.'" type="application/pdf" width="400" height="315"></td>';


                        echo '<td>';
                        echo '<a class="btn btn-info espacio" href="mainpanel/stock/edit/'.$lista->id.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
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