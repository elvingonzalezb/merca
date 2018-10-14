<div>
 <ul class="breadcrumb">
   <li><a href="mainpanel/catalogo/listadoCategoria">Categorias</a> <span class="divider">/</span></li>
   <li><a href="mainpanel/catalogo/nuevacategoria">Nueva Categoria</a> <span class="divider">/</span></li>
   <li><a href="mainpanel/catalogo/listadoSubCategoria">SubCategorias</a> <span class="divider">/</span></li>
   <li><a href="mainpanel/catalogo/nuevaSubcategoria">Nueva SubCategoria</a> <span class="divider">/</span></li>
   <li><a href="mainpanel/catalogo/listado">Productos</a> <span class="divider">/</span></li>
   <li><a href="mainpanel/catalogo/nuevo">Nuevo Producto</a> <span class="divider">/</span></li>
   <li><a href="mainpanel/catalogo/nuevaVarColor">Nueva Variedad de Color</a> <span class="divider">/</span></li>
 </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i>Productos</h2>
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
                        <th width="18%">Imagen</th>
                        <th width="15%">Nombre</th>
                        <th width="18%">Descripción</th>
                        <th width="25%">(Click) para opciones</th>
                        <th width="20%">Acción</th>
                    </tr>
                </thead>   
                <tbody>
               <?php
                    $orden = 1;
                    $cad_id_productos=array();
                                       
                    for($i=0; $i<count($productos); $i++)
                    {
                        $current = $productos[$i];
                        $imagen = $current['imagen'];
                        $id_producto = $current['id_producto'];
                        $nom_producto= $current['nom_producto'];                       
                        $resumen= $current['resumen'];
                        $descripcion= $current['descripcion'];
                        $prodxcolor= $current['prodxcolor'];
                  
                        if($imagen!="")
                        {
                            $pic = '<img src="files/productos/medianas/'.$imagen.'"/>';
                        }
                        else
                        {
                            $pic = '--------';
                        }
                                                                  
                        $sk='';
                        
                        for($e=0;$e<count($prodxcolor);$e++){
                            $cur=$prodxcolor[$e];
                            $color=$cur['codigo_color'];
                            $nombre=$cur['nombre_color'];
                            $id_prodxcolor=$cur['id_prodxcolor'];
                            $cad_id_productos[]=$id_prodxcolor;
                            $sk .='<div class="env_col_mant">';
                            $sk .='<a href="javascript:deleteEditProductoColor(\''.$id_prodxcolor.'\')"><div style="background:'.$color.'" class="cu_col_mant" title="'.$color.' - '.$nombre.'"></div></a>';
                            $sk .='</div>';
                        }                        
                        echo '<tr>';
                        echo '<td>'.($i+1).'</td>';                                             
                        echo '<td>'.$pic.'</td>';                       
                        echo '<td class="left">'.$nom_producto.'</td>';                      
                        echo '<td class="center">'.$resumen.'</td>';
                        echo '<td class="center">'.$sk.'</td>';   
                        echo '<td>';
                        echo '<a class="btn btn-info espacio" href="mainpanel/catalogo/edit/'.$id_producto.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                        echo '<a class="btn btn-danger espacio" href="javascript:deleteProducto(\''.$id_producto.'\')"><i class="icon-trash icon-white"></i>Borrar</a> ';
                        echo '</td>';
                        echo '</tr>';
                    }
                    $cad_id_productos=implode("&&",$cad_id_productos);                    
                ?>
                </tbody>
            </table>            
        </div>
     </div>
</div>