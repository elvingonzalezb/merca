<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row outer-bottom-sm'>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar">

              <div class="side-menu">
                <h3> Categorías</h3>
                  <nav class="" role="navigation">
                      <ul class="nav">
                        <?php
                        foreach($categorias as $categoria)
                        {
                            $link = 'subcategorias/'.$categoria['url'].'-'.$categoria['id'];
                                    echo'<li class="">';
                                        echo'<a href="'.$link.'">'.$categoria['nom_cat'].'</a>';
                                    echo'</li>';
                        }
                        ?>
                      </ul>
                  </nav>
              </div>


                <div class="sidebar-widget  wow fadeInUp outer-top-vs hidden-xs hidden-sm">
                  <div id="advertisement-2" class="advertisement">
                      <?php
                      if(count($bannerslateral)>0)
                        {
                          foreach($bannerslateral as $bannerlateral)
                          {
                           echo '<li><a href="#"><img src="files/bannerlateral/'.$bannerlateral->imagen.'" /></a></li>';
                          }
                        }
                    ?>
                  </div><!-- /.owl-carousel -->
                </div>

            </div><!-- /.sidemenu-holder -->


        <div class='col-xs-12 col-sm-12 col-md-3 col-lg-9'>
          <div class="search-result-container">
            <div class="category-product inner-top-vs">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 wow fadeInUp">
                     <?php
                      $orden = 1;
                      $cad_id_productos=array();
                      for($i=0; $i<count($productos); $i++)
                      {
                        $current = $productos[$i];
                        $imagen = $current['imagen'];
                        $id_producto = $current['id_producto'];
                        $url = $current['url'];
                        $nom_producto= $current['nom_producto'];
                        $resumen= $current['resumen'];
                        $codigo= $current['codigo'];
                        $precio= $current['precio'];
                        $descripcion= $current['descripcion'];
                        $prodxcolor= $current['prodxcolor'];

                        $link = "productos".'/'.$id_producto.'-'.$url;
                        echo'<div class="product col-md-4 mgb-20 col-xs-6 col-sm-6"> ';
                          echo'<div class="product-image">';
                              if (!empty($this->session->userdata('autorizado')))
                              {
                               $autorizado = $this->session->userdata('autorizado');
                                   if($autorizado == "S")
                                   {
                                     echo'<div class="product-price">';
                                       $nomprecio = "Precio: ";
                                       $linkprecio ='$'.$precio;
                                       echo'<h5 class="name">'.$nomprecio.'<span class="fontFucsia">'.$linkprecio.' </span> </h5>';
                                     echo'</div>';
                                   }
                              }
                                   echo'<div class="image">';
                                        echo'<a href="'.$link.'"><img src="" data-echo="files/productos/medianas/'.$imagen.'" alt="'.$nom_producto.'"></a>';
                                        echo'<div class="product-cate text-center">';
                                          echo'<h5 class="name"><a href="'.$link.'">'.$nom_producto.'</a></h5>';
                                        echo'</div>';
                                    echo'</div>';

                                          echo'<div class="product-color text-left">';
                                            echo'<h5 class="name">Código: '.$codigo.'</h5>';
                                            echo'<h5 class="name">Colores disponibles</h5>';
                                                $sk='';
                                                for($e=0;$e<count($prodxcolor);$e++)
                                                {
                                                  $cur=$prodxcolor[$e];
                                                  $color=$cur['codigo_color'];
                                                  $nombre=$cur['nombre_color'];
                                                  $id_prodxcolor=$cur['id_prodxcolor'];
                                                  $cad_id_productos[]=$id_prodxcolor;
                                                   echo'<a href="javascript:deleteEditProductoColor(\''.$id_prodxcolor.'\')"><div style="background:'.$color.'" class="colores" title="'.$color.' - '.$nombre.'"></div></a>';
                                                }
                                           echo'</div>';

                                            echo'<div class="">';
                                              echo'<ul class="">';
                                                echo'<li class="text-right">';
                                                 echo'<a class=" btn btn-fucsia add-to-cart" href="'.$link.'" title="Detalles">';
                                                   echo'  <i class="fa fa-cart"></i>';
                                                 echo' Ir a pedido</a>';
                                                echo' </li>';
                                              echo' </ul>';
                                            echo' </div>';
                                  echo'</div>';
                             echo'</div>';
                          }
                          $cad_id_productos=implode("&&",$cad_id_productos);
                          ?>
                  </div><!-- /.item -->
               </div><!-- /.row -->
            </div><!-- /.category-product -->
         </div><!-- /.search-result-container -->
                              <div class="col-md-12 text-right">
                                  <?php echo $paginacion; ?>
                              </div>
      </div><!-- /.col -->

    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.body-content -->
