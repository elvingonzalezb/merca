 <!-- Comienzo mainContent -->
 <div class="body-content outer-top-xs" id="top-banner-and-menu">


<div class="body-content outer-top-bd">
  <div class="container">
    <div class="terms-conditions-page inner-bottom-sm">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 terms-conditions">
          <h2><?php echo $nosotros->titulo?></h2>

            <h3>NUESTRA EMPRESA</h3>
            <p><?php echo $nosotros->fulltext?></p>

            <h3><?php echo $mision->titulo?></h3>
            <p><?php echo $mision->fulltext?>.</p>

            <h3><?php echo $vision->titulo?></h3>
            <p><?php echo $vision->fulltext?></p>

            <h3><?php echo $valores->titulo?></h3>
            <p><?php echo $valores->fulltext?>.</p>
          </div>



              <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
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
                         echo '<li><a href="#"><img src="files/bannerlateral/'.$bannerlateral->imagen.'"/></a></li>';
                        }

                      }
                    ?>
                    </div><!-- /.owl-carousel -->
                </div>



           </div>

       </div>
     </div><!-- /.row -->
    </div>
  </div>
</div>
