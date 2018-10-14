<div>
    <ul class="breadcrumb">
       <li><a href="mainpanel/categorias/listado">Listado de Categorias</a> <span class="divider">/</span></li>
       <li><a href="mainpanel/categorias/nuevacategoria">Nueva Categoria</a> <span class="divider">/</span></li>
       <li><a href="mainpanel/productos/listado">Listado de Productos</a> <span class="divider">/</span></li>
       <li><a href="mainpanel/productos/nuevo">Nuevo Producto</a> <span class="divider">/</span></li>
    </ul>
</div>

<div class="row-fluid sortable">
     <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Categorías </h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
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
                        <th width="30%">CATEGORIA</th>
                        <th width="15%">NUM. ARTÍCULOS</th>
                        <th width="10%">ORDEN</th>
                        <th width="10%">ESTADO</th>
                        <th width="30%">ACCION</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                    foreach($categorias as $categoria)
                    {
                        echo '<tr>';
                        echo '<td>'.$orden.'</td>';
                        echo '<td>'.$categoria['categoria'].'</td>';
                        echo '<td>'.$categoria['num_productos'].'</td>';
                        echo '<td>'.$categoria['orden'].'</td>';
                        if($categoria['estado']=="A")
                        {
                            echo '<td><span class="label label-success">ACTIVO</span></td>';
                        }
                        else
                        {
                            echo '<td><span class="label label-important">INACTIVO</span></td>';
                        }
                        echo '<td>';
                        echo '<a class="btn btn-info" href="mainpanel/categorias/editCategoria/'.$categoria['id'].'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                        echo '<a class="btn btn-danger" href="javascript:deleteCategoria(\''.$categoria['id'].'\')"><i class="icon-trash icon-white"></i>Borrar</a>';
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