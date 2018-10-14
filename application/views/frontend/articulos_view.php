<div class="body-content outer-top-bd">
  <div class="container">
    <div class="row  outer-bottom-vs">
      <div class="blog-page">
        <div class="col-md-9">

           <?php
              foreach($last_Articulos as $ultimo)
              {
               $link = $ultimo->id.'-'.$ultimo->url;
               echo'<div class="blog-post outer-top-bd  wow fadeInUp">';
                  echo'<a href="'.$link.'"><img class="img-responsive" src="files/articulos/grandes/'.$ultimo->imagen.'" alt=""></a>';
                     echo'<h1><a href="'.$link.'">'.$ultimo->titulo.'</a></h1>';
                       if(strlen($ultimo->introtext) > 90){
                        $ultimo->introtext = substr($ultimo->introtext,0,90)."...";}
                     echo'<p>'.$ultimo->introtext.'</p>';
                     echo'<a href="'.$link.'" class="btn btn-fucsia">Leer mas</a>';
                   echo'</div>';
                   }
                  ?>

        <div class="clearfix blog-pagination filters-container  wow fadeInUp outer-top-bd">

               <div class="text-right">
                 <div class="col-md-12">
                    <?php echo $paginacion; ?>
                </div>
             </div><!-- /.text-right -->

      </div>
 </div>
        <div class="col-md-3 sidebar">
          <div class="sidebar-module-container">

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


          </div>
       </div>

      </div>
    </div>

 </div>
</div>
