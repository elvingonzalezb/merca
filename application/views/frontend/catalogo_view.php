  <div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row outer-bottom-sm'>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar">

                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <h3> Productos</h3>  
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">

                        <?php
                          foreach($productos as $ultimo)
                          {
                          $link = "productos".'/'.$ultimo->id.'-'.$ultimo->url;
                                echo'<li class="dropdown menu-item">';
                                    echo'<a href="'.$link.'"><!--<i class="icon fa fa-check fa-fw">--></i>'.$ultimo->nom_producto.'</a>';
                                echo'</li>';
                            }
                            ?>

                        </ul>
                    </nav>
                </div>


                <div class="sidebar-widget hot-deals wow fadeInUp">
                    <!--<h3 class="section-title"></h3>-->
                    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products">

                            </div>
                        </div>
                    </div><!-- /.sidebar-widget -->
                </div>

                <div class="sidebar-widget  wow fadeInUp outer-top-vs hidden-xs hidden-sm">
                    <div id="advertisement-2" class="advertisement">
                      <?php
                      if(count($bannerslateral)>0)
                      {

                      foreach($bannerslateral as $bannerlateral)
                        {
                         echo '<li><a href="#"><img src="files/bannerlateral/'.$bannerlateral->imagen.'" class="" style="width: 270px; height: 434px;" /></a></li>';
                        }
                      }
                    ?>
                    </div><!-- /.owl-carousel -->
                </div>




            </div><!-- /.sidemenu-holder -->


           <div class='col-xs-12 col-sm-12 col-md-9 col-lg-9'>
                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">
                        <div class="image">
                            <img src="files/stock/<?php echo $textosweb->imagen?>" style="width: 870px; height: 255px;" class="img-responsive">
                        </div>
                    </div>
                </div>

           <div class="search-result-container">
                    <div>
                        <div>
                            <div class="category-product inner-top-vs">
                                <div class="row">
                                   <?php
                                      foreach($catalogos as $catalogo)
                                      {

                                   echo' <div class="col-sm-6 col-md-3 wow fadeInUp">';
                                        echo'<div class="products">';
                                            echo'<div class="product">';
                                                echo'<div class="product-image">';
                                                    echo'<div class="image">';
                                                        echo'<a href="files/stock/'.$catalogo->archivo.'" target="_blank"><img  src="files/stock/'.$catalogo->imagen.'" data-echo="files/stock/'.$catalogo->imagen.'" class="img-responsive"></a>';
                                                    echo'</div>                                   ';
                                                echo'</div>';

                                                echo'<div class="product-info text-left">';
                                                    echo'<h3 class="name">'.$catalogo->titulo.'</h3>';
                                                    echo'<a class="btn btn-fucsia separador" href="files/stock/'.$catalogo->archivo.'" target="_blank" title="Ver Archivo">';
                                                       echo' Ver</a>';
                                                       echo'<a class="btn btn-fucsia separador" href="files/stock/'.$catalogo->archivo.'" download title="Detalles">';
                                                        echo' Descargar</a>';
                                                echo'</div>';

                                            echo'</div>';
                                        echo'</div>';
                                    echo'</div>';
                                                }
                                     ?>





                                </div><!-- /.row -->
                            </div><!-- /.category-product -->
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- /.search-result-container -->






            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.container -->

</div><!-- /.body-content -->
