<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product outer-bottom-sm '>

            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
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
               </div>
            </div><!-- /.sidebar -->

            <div class='col-md-9'>
                <div class="row  wow fadeInUp">
                    <div class="col-xs-12 col-sm-6 col-md-6 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">
                          <div id="owl-single-product">
                            <div class="single-product-gallery-item" id="'.$prodactual->id.'">
                             <a data-lightbox="image-1" data-title="" href="files/productos/<?php echo $prodactual->imagen?>">
                              <img class="img-responsive" alt="" src="assets/frontend/img/preload-product.jpg" data-echo="files/productos/<?php echo $prodactual->imagen?>" />
                            </a>
                          </div>

                        </div>
                                <div id="owl-single-product">

                                </div><!-- /#owl-single-product-thumbnails -->


                        </div><!-- /.single-product-gallery -->

                    </div><!-- /.gallery-holder -->
                    <div class='col-sm-6 col-md-6 product-info-block'>
                        <div class="product-info">
                            <h1 class="name"><?php echo $prodactual->nom_producto?></h1>

                            <div class="description-container m-t-20">
                                <p><?php echo $prodactual->descripcion?></p>
                            </div><!-- /.description-container -->
                              <?php if (!empty($this->session->userdata('autorizado')))
                                    {
                                      $autorizado = $this->session->userdata('autorizado');
                                      if($autorizado == "S")
                                        {
                                        echo'<div class="product-price">';
                                          $nomprecio = "Precio: ";
                                          $linkprecio ='$'.$prodactual->precio;
                                          echo'<h5 class="name">'.$nomprecio.'<span class="fontFucsia">'.$linkprecio.' </span> </h5>';
                                        echo'</div>';
                                        }
                                      }
                                         ?>
                                      <div class="price-container info-container m-t-20">
                                                <h4>Colores disponibles</h4>
                                                   <?php
                                                  foreach($colores as $color)
                                                  {
                                                  echo'<a href="javascript:deleteEditProductoColor(\''.$color->idcolor.'\')"><div style="background:'.$color->codigo_color.'" class="colores" title="'.$color->nombre_color.' - '.$color->nombre_color.'"></div></a>';
                                                  }
                                              ?>
                                      </div>

                            <div class="quantity-container info-container">
                                <div class="row">
                                  <form action="pedidos/agregar" method="post" id="agregarform" name="agregarform">
                                   <div class="col-sm-12">
                                         <div class="col-sm-3">
                                            <span class="label">Colores :</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control fucsia" name="id_color" id="id_color" required >
                                                <option value="0">Elija el color...</option>
                                                <?php
                                                foreach($colores as $color)
                                                {
                                                echo '<option value="'.$color->idcolor.'"><span style="background:'.$color->codigo_color.'">'.$color->nombre_color.'</span></option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                   </div>
                                    </br>  </br>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <span class="label">Cantidad :</span>
                                        </div>
                                        <div class="col-sm-3">
                                           <div class="form-group">
                                            <input type="text" name="cantidad" id="cantidad" class="form-control unicase-form-control" size="3" value="1" required>
                                            </div>
                                        </div>
                                            <!--CAMPOS OCULTOS-->
                                          <input type="hidden" name="imagen" id="imagen" value="<?php echo $prodactual->imagen?>">
                                          <input type="hidden" name="nom_producto" id="nom_producto" value="<?php echo $prodactual->nom_producto?>">
                                          <input type="hidden" name="codigo" id="codigo" value="<?php echo $prodactual->id?>">
                                          <input type="hidden" name="id" id="id" value="<?php echo $prodactual->id?>">
                                          <input type="hidden" name="resumen" id="resumen" value="<?php echo $prodactual->resumen?>">
                                          <input type="hidden" name="precio" id="precio" value="<?php echo $prodactual->precio ?>">
                                          <input type="hidden" name="linkeditPedido" id="linkeditPedido" value="<?php echo $linkeditPedido;?>">

                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-fucsia color">AÑADIR</button>
                                        </div>
                                    </div>
                                 </form>
                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->

                        </div><!-- /.product-info -->
                    </div><!-- /.col-sm-7 -->

                </div><!-- /.row -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Productos Relacionados</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                     <?php
                      if(count($prodrelacionados)>0)
                        {
                         foreach($prodrelacionados as $prodrela)
                        {
                           $link = "productos".'/'.$prodrela->id.'-'.$prodrela->url;
                            echo'<div class="item item-carousel">';
                                echo'<div class="products">';
                                    echo'<div class="product">';
                                        echo'<div class="product-image">';
                                            echo'<div class="image">';
                                                echo'<a href="'.$link.'"><img  src="assets/frontend/img/preload-product.jpg" data-echo="files/productos/'.$prodrela->imagen.'" alt="" class="img-responsive"></a>';
                                            echo'</div>';
                                        echo'</div>';
                                        echo'<div class="product-info text-left">';
                                            echo'<h3 class="name"><a href="'.$link.'">'.$prodrela->nom_producto.'</a></h3>';
                                        echo'</div>';
                                    echo'</div>';
                                echo'</div>';
                            echo'</div>';
                         }
                         }
                         ?>
                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
            </div><!-- /.col -->

            <div class="clearfix"></div>

        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
