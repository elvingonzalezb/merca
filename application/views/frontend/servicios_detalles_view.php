<div class="body-content outer-top-bd">
    <div class="container">
        <div class="row">
            <div class="blog-page">

                <div class="col-md-9">

                    <div class="blog-post wow fadeInUp">
                        <img class="img-responsive" src="files/servicios/<?php echo $servicio->imagen?>" alt="regalos para profesionales de la salud">
                        <h1 class="fontFucsia"><?php echo $servicio->titulo?></h1>
                      
                        <p><?php echo $servicio->fulltext?></p>
                    </div>
                </div>

                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                        <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Servicios</div>      
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
                       
                           <?php
                            foreach($Dest_servicios as $ultimo)
                            {
                             $link = $ultimo->id.'-'.$ultimo->url.'/'."servicios";
                             echo'<li class="dropdown menu">';
                                 echo'<a href="'.$link.'"><i class="icon fa fa-check fa-fw"></i>'.$ultimo->titulo.'</a>';
                            echo'</li>';
                            $active="";
                          }
                          ?>
                        
                        </ul>
                    </nav>
                </div>

                        
                        </div><!-- /.sidebar-widget -->

                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Servicios destacados</h3>
                            <div class="">
                                <div class="m-t-20">
                                     <?php   
                                      foreach($Dest_servicios as $ultimo)
                                      {
                                        $link = $ultimo->id.'-'.$ultimo->url;
                                    echo'<div class="blog-post inner-bottom-30 " >';
                                        echo'<a href="'.$link.'"><img class="img-responsive" src="files/servicios/thumbs/'.$ultimo->imagen.'" alt="" width="270" height="255"></a>';
                                        echo'<h4><a href="'.$link.'">'.$ultimo->titulo.'</a></h4>';
                                 
                                        echo'<span class="date-time">'.$ultimo->created.'</span>';
                                    echo'</div>';
                                     }
                                     ?>
                            
                                </div>
                            </div>
                        </div>

         
                   </div>
                </div>

            </div>
        </div>
    </div>
</div>    
                        
          