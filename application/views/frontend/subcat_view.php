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
                              {
                                    $link = 'subcategorias/'.$categoria['url'].'-'.$categoria['id'];
                              }
                            //  else
                              //{
                                //    $link = 'productos/'.$categoria['url'].'-'.$categoria['id'];
                              //}
                                  if($categoria['id']==$id_categoria_current)
                                  {
                                    echo'<li class="active">';
                                        echo'<a href="'.$link.'">'.$categoria['nom_cat'].'</a>';
                                    echo'</li>';
                                  }
                                  else
                                      {
                                          echo'<li class="dropdown menu-item">';
                                          echo'<a href="'.$link.'">'.$categoria['nom_cat'].'</a>';
                                          echo'</li>';
                                      }
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
                         echo '<li><a href="#"><img src="files/bannerlateral/'.$bannerlateral->imagen.'" class="" /></a></li>';
                        }
                      }
                      ?>
                    </div><!-- /.owl-carousel -->
                </div>

            </div><!-- /.sidemenu-holder -->


           <div class='col-xs-12 col-sm-12 col-md-3 col-lg-9'>
                <div id="category" class="category-carousel hidden-xs">
                    <div class="item text-left">
                      <?php
                        $cat = strtoupper($nomCategoria->nom_cat);
                         echo'<h3 class="fontFucsia">'.$cat.'</h3>';
                         ?>
                    </div>
                </div>

                <div class="search-result-container">
                            <div class="category-product inner-top-vs">
                                <div class="row">
                                   <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 wow fadeInUp">
                                     <div class="products">
                                      <?php
                                      foreach($subcategorias as $subcat)
                                      {
                                        $link = "subcat".'/'.$subcat->id_subcategoria.'-'.$subcat->url;
                                            echo'<div class="product col-md-4 mgb-20 col-xs-6 col-sm-6"> ';
                                              echo'<div class="product-image">';
                                                  echo'<div class="image">';
                                                      echo'<a href="'.$link.'"><img src="" data-echo="files/subcategorias/'.$subcat->imagen.'" width="190" height="240" alt="'.$subcat->nombre.'"></a>';

                                                      echo'<div class="product-cate text-center">';
                                                        echo'<h5 class="name"><a href="'.$link.'">'.$subcat->nombre.'</a></h5>';
                                                      echo'</div>';

                                                      echo' <div class="product-info text-left">';
                                                        echo' <h3 class="name"><a href="'.$link.'">'.$subcat->nombre.'</a></h3>';
                                                      echo'</div>';
                                                  echo'</div> ';
                                               echo'</div>';

                                            echo'</div>';
                                        }
                                       ?>
                                      </div><!-- /.products -->
                                    </div><!-- /.item -->
                                </div><!-- /.row -->
                            </div><!-- /.category-product -->


                </div><!-- /.search-result-container -->

            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.container -->

</div><!-- /.body-content -->
