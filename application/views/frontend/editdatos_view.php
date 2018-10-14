 <!-- Comienzo mainContent -->
 <div class="body-content outer-top-xs" id="top-banner-and-menu">


<div class="sign-in-page inner-bottom-sm">
  <div class="container">
    <div class="terms-conditions-page inner-bottom-sm">
      <div class="row">



          <!-- create a new account -->
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 create-new-account">
          <h4 class="checkout-subtitle">Editar su cuenta</h4>

          <!--<p class="text title-tag-line">Create your own Unicase account.</p>-->
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
             <?php
              $resultado = $this->session->userdata("resultado");
              if( isset($resultado) )
              {
                switch( $resultado )
                {
                  case "exito":
                    echo '<div class="alert alert-success">';
                    echo $this->session->userdata("mensaje");
                    echo '</div>';
                  break;

                  case "error":
                    echo '<div class="alert alert-danger">';
                    echo $this->session->userdata("mensaje");
                    echo '</div>';
                  break;
                }
                $this->session->unset_userdata('resultado');
                    $this->session->unset_userdata('mensaje');
              }

            ?>
          <form class="register-form outer-top-xs" action="updatedatos" method="post" id="registerform" name="registerform">

            <div class="form-group">
              <label class="info-title" for="exampleInputEmail2">Nombres <span>*</span></label>
              <input type="text" class="form-control unicase-form-control text-input" name="nombres" id="nombres" value="<?php echo $usuarioactual->nombres?>">
            </div>

            <div class="form-group">
              <label class="info-title" for="exampleInputEmail2">Apellidos <span>*</span></label>
              <input type="text" class="form-control unicase-form-control text-input" name="apellidos" id="apellidos" value="<?php echo $usuarioactual->apellidos?>">
            </div>

            <div class="form-group">
              <label class="info-title" for="exampleInputEmail2">Teléfono <span>*</span></label>
              <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $usuarioactual->telefono?>" name="telefono" id="telefono" maxlength="12" onkeydown="return ( event.ctrlKey || event.altKey
                                || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                || (95<event.keyCode && event.keyCode<106)
                                || (event.keyCode==8) || (event.keyCode==9)
                                || (event.keyCode>34 && event.keyCode<40)
                                || (event.keyCode==46) )">
            </div>



            <div class="form-group">
              <label class="info-title" for="exampleInputEmail2">Password <span>*</span></label>
              <input type="password" class="form-control unicase-form-control text-input" value="<?php echo $usuarioactual->clave?>" name="clave" id="clave">
            </div>

            <div class="form-group">
              <label class="info-title" for="exampleInputEmail2">Confirmar Password <span>*</span></label>
              <input type="password" class="form-control unicase-form-control text-input" value="<?php echo $usuarioactual->clave?>" name="clave2" id="clave2">
            </div>

     
            <p class="text-right"><input type="submit" class="btn-upper btn btn-fucsia checkout-page-button bg" value="Editar"></p>

          </form>
           </div>
        </div><!-- create a new account -->



              <div class="col-lg3 col-xs-12 col-sm-3 col-md-3 sidebar">

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
