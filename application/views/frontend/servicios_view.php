  <div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 sidebar menulateral">

                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Servicios</div>      
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
                       
                          <?php   
                          $active="active";
                          foreach($servicios as $servicio)
                          {
                            $link = $servicio->id.'-'.$servicio->url.'/'."servicios";
                             echo'<li class="dropdown menu">';
                                 echo'<a href="'.$link.'"><!--<i class="icon fa fa-check fa-fw">--></i>'.$servicio->titulo.'</a>';
                            echo'</li>';
                            $active="";
                          }
                          ?>
                        
                        </ul>
                    </nav>
                </div>


              <div class="hidden-xs hidden-sm">
                    <div class="sidebar-widget hot-deals wow fadeInUp">
                        <!--<h3 class="section-title"></h3>-->
                        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products">
                                
                                </div>  
                            </div>                        
                        </div><!-- /.sidebar-widget -->
                    </div>
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


                <div class="sidebar-widget  wow fadeInUp outer-top-vs hidden-xs hidden-sm">
                    <div id="advertisement" class="advertisement">
                      <?php 
                      if(count($bannerslateral)>0)
                      {
                        echo '<ul class="bxslider">';
                      foreach($bannerslateral as $bannerlateral)
                        {
                               echo '<li><a href="#"><img src="files/bannerlateral/'.$bannerlateral->imagen.'" class="img-fluid" style="width: 270px; height: 434px;" /></a></li>';
                              }
                              echo '</ul>';
                            }
                          ?>
                    </div>
                </div>

            </div><!-- /.sidemenu-holder -->


           <div class='col-xs-12 col-sm-12 col-md-3 col-lg-9'>
                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">  
                        <div class="image">
                            <img src="files/servicios/<?php echo $textosweb->imagen?>" style="width: 870px; height: 255px;" class="img-responsive">
                        </div>
                    </div>
                </div>

                <div class="search-result-container">
                    <div>
                        <div>
                            <div class="category-product inner-top-vs">
                                <div class="row"> 
                                   <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 wow fadeInUp">
                                     <div class="products">
                                      <?php   
                                   foreach($servicios as $servicio)
                                  {
                                   $link = $servicio->id.'-'.$servicio->url.'/'."servicios";
                                           echo'<div class="product col-md-3 mgb-20 col-xs-6 col-sm-6"> ';      
                                                echo'<div class="product-image">';
                                                   echo'<div class="image">';

                                                        echo'<a href="'.$link.'"><img src="" data-echo="files/servicios/'.$servicio->imagen.'" width="190" height="240" alt="'.$servicio->titulo.'"></a>';

                                                    echo'</div> ';         
                                               echo'</div>';
                                               echo' <div class="product-info text-left">';
                                                echo' <h3 class="name"><a href="'.$link.'">'.$servicio->titulo.'</a></h3>';

                                               echo'</div>';
                                            echo'</div>';
                                                    }
                                     ?>
                                        </div><!-- /.products -->
                                    
                                    </div><!-- /.item -->
                         
                                

                                </div><!-- /.row -->

                            </div><!-- /.category-product -->

                        </div><!-- /.tab-pane -->

                    </div><!-- /.tab-content -->

                </div><!-- /.search-result-container -->

            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.container -->

</div><!-- /.body-content -->   