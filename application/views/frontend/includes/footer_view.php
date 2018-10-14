<footer id="footer" class="footer color-bg">
    <div class="footer-bottom links-social ">
        <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-3">
                 <!-- ============================================================= CONTACT INFO ============================================================= -->
                  <div class="contact-info">
                      <div class="footer-logo">
                          <div class="logo">
                              <a href="index.php?page=home">

                                    <img src="assets/frontend/images/logo.png" alt="">

                              </a>
                          </div><!-- /.logo -->

                      </div><!-- /.footer-logo -->

                       <div class="module-body m-t-20">
                          <p class="about-us"><?php echo getConfig('textoFooter');?>.</p>


                      </div><!-- /.module-body -->

                  </div><!-- /.contact-info -->
              </div><!-- /.col -->

             <div class="col-xs-12 col-sm-6 col-md-3">

              <div class="contact-timing">
                  <div class="">
                    <h4 class="module-title">HORARIO DE TRABAJO</h4>
                  </div><!-- /. -->

                  <div class="module-body outer-top-xs">
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <tr><td><?php echo getConfig('horario_especial');?></td></tr>

                        </tbody>
                      </table>
                    </div><!-- /.table-responsive -->

                  </div><!-- /.module-body -->
                </div><!-- /.contact-timing -->
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="contact-info">
                      <div class="">
                        <h4 class="module-title">REDES SOCIALES</h4>

                      </div><!-- /.footer-logo -->

                       <div class="module-body m-t-20">


                          <div class="social-icons">
                            <?php
              $fb = getConfig('enlace_facebook');
              if($fb!="")
              {
                 echo '<a href="'.$fb.'" target="_blank" class=""><i class="icon fa fa-facebook"></i></a>';
              }

              $tw = getConfig('enlace_twitter');
              if($tw!="")
              {
                 echo '<a href="'.$tw.'" target="_blank" class=""><i class="icon fa fa-twitter"></i></a>';
              }

              $pin = getConfig('enlace_pinterest');
              if($pin != "")
              {
                 echo'<a href="'.$pin.'" target="_blank" class=""><i class="icon fa fa-pinterest"></i></a>';
              }


              $ins = getConfig('enlace_instagram');
              if($ins!="")
              {
                 echo '<a href="'.$ins.'" target="_blank" class=""><i class="icon fa fa-instagram"></i></a>';
              }

             $you = getConfig('enlace_youtube');
              if($you!="")
              {
                 echo '<a href="'.$you.'" target="_blank" class=""><i class="icon fa fa-youtube"></i></a>';
              }

                 $sk = getConfig('enlace_skype');
              if($sk!="")
              {
                 echo '<a href="'.$sk.'" target="_blank" class=""><i class="icon fa fa-skype"></i></a>';
              }
            ?>


                          </div><!-- /.social-icons -->
                      </div><!-- /.module-body -->

                  </div><!-- /.contact-info -->
            </div><!-- /.col -->

              <div class="col-xs-12 col-sm-6 col-md-3">
                 <!-- ============================================================= INFORMATION============================================================= -->
                    <div class="contact-information">
                      <div class="">
                        <h4 class="module-title">INFORMACIÓN</h4>
                      </div><!-- /. -->

                      <div class="module-body outer-top-xs">
                            <ul class="toggle-footer" style="">
                                <li class="media">
                                    <div class="pull-left">
                                         <span class="icon fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x"></i>
                                          <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p><?php echo getConfig('direccion');?></p>
                                    </div>
                                </li>

                                  <li class="media">
                                    <div class="pull-left">
                                         <span class="icon fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x"></i>
                                          <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p><?php echo getConfig('telefono_footer');?></p>
                                    </div>
                                </li>

                                  <li class="media">
                                    <div class="pull-left">
                                         <span class="icon fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x"></i>
                                          <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                   <div class="">
                                        <p><?php echo getConfig('correo');?></p>
                                    </div>
                                </li>

                                </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.contact-timing -->
                  </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.links-social -->





      <div class="copyright-bar">
          <div class="container">
              <div class="col-xs-12 col-sm-6 no-padding">
                  <div class="copyright"><?php echo getConfig('copyright');?></div>
              </div>
              <div class="col-xs-12 col-sm-6 no-padding text-right fontgris">
                  <div class="copyright ">Desarrollado por <a href="http://www.ajaxperu.com/" target="_blank">Ajax Perú</a></div>
              </div>
          </div>
      </div>
    </footer>
 <!-- ============================================================= FOOTER : END============================================================= -->
  <!-- JavaScripts placed at the end of the document so the pages load faster -->
  <script src="assets/frontend/js/jquery-1.11.1.min.js"></script>

  <script src="assets/frontend/js/bootstrap.min.js"></script>

  <script src="assets/frontend/js/bootstrap-hover-dropdown.min.js"></script>
  <script src="assets/frontend/js/owl.carousel.min.js"></script>
  <script src="assets/frontend/jquery.bxslider/jquery.bxslider.min.js"></script>
  <script src="assets/frontend/js/echo.min.js"></script>
  <script src="assets/frontend/js/jquery.easing-1.3.min.js"></script>
  <script src="assets/frontend/js/bootstrap-slider.min.js"></script>
  <script src="assets/frontend/js/jquery.rateit.min.js"></script>
  <script type="text/javascript" src="assets/frontend/js/lightbox.min.js"></script>
  <script src="assets/frontend/js/bootstrap-select.min.js"></script>
  <script src="assets/frontend/js/wow.min.js"></script>
  <script src="assets/frontend/js/scripts.js"></script>

  <script src="assets/frontend/plugins/fancybox/dist/jquery.fancybox.min.js"></script>

  <script src="assets/frontend/plugins/sweetalert/js/sweetalert.min.js"></script>
  <script src='assets/frontend/js/jquery.dataTables.min.js'></script>

  <script src="assets/frontend/js/validation.js"></script>

  <script src="assets/frontend/plugins/is/is.min.js"></script>

  <script src="assets/frontend/js/me.js"></script>

  <script src="assets/frontend/js/google-map.js" type="text/javascript"></script>

</body>


</html>
