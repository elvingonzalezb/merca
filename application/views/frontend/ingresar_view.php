 <!-- Comienzo mainContent -->
 <div class="body-content outer-top-xs" id="top-banner-and-menu">


<div class="sign-in-page inner-bottom-sm">
  <div class="container">
    <div class="terms-conditions-page inner-bottom-sm">
      <div class="row">
     


          <!-- create a new account -->
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 create-new-account">
          <h4 class="checkout-subtitle">Ingresa a tu cuenta</h4>
             
          <!--<p class="text title-tag-line">Create your own Unicase account.</p>-->
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
             <?php
              $resultado = $this->session->userdata("resultado");
              if( isset($resultado) )
              {
                switch( $resultado )
                {
                  case "exito":
                    echo '<div class="alert alert-success" role="alert">';
                    echo $this->session->userdata("mensaje");
                    echo '</div>';
                  break;

                  case "error":
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $this->session->userdata("mensaje");
                    echo '</div>';
                  break;
                }
                $this->session->unset_userdata('resultado');
                    $this->session->unset_userdata('mensaje');
              }
            ?>  
          <form class="register-form outer-top-xs" action="frontend/ingresar/validarLogin" method="post" id="ingresarform" name="ingresarform">
        
           
            <div class="form-group">
              <label class="info-title" for="exampleInputEmail2">Email <span>*</span></label>
              <input type="text" class="form-control unicase-form-control text-input" name="emailLogin" id="emailLogin">
            </div>

            <div class="form-group">
              <label class="info-title" for="exampleInputEmail2">Password <span>*</span></label>
              <input type="password" class="form-control unicase-form-control text-input" name="claveLogin" id="claveLogin">
            </div>

           

           
           <div class="form-group">
               <div class="g-recaptchamod">
                <?php echo $recaptcha;?>
               </div>
             </div>


            <p class="text-right"><input type="submit" class="btn-upper btn btn-fucsia checkout-page-button bg" value="Ingresar"></p>
          
          </form>
           </div>
        </div><!-- create a new account -->
      
   

              <div class="col-lg3 col-xs-12 col-sm-3 col-md-3 sidebar">
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


         
           </div>

       </div>
     </div><!-- /.row -->
    </div>
  </div>
</div>

