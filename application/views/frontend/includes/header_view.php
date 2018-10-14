<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="author" content="<?php echo $title; ?>">
    <!-- Favicon and Touch Icons -->
    <link href="assets/frontend/images/favicon.png" rel="shortcut icon" type="image/png">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/frontend/images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/frontend/images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/frontend/images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/frontend/images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/frontend/images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/frontend/images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/frontend/images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/frontend/images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/frontend/images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/frontend/images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/frontend/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/frontend/images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/frontend/images/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/frontend/images//ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

     <!-- Page Title -->
    <title><?php echo NOMBRE_SITIO; ?></title>
    <base href="<?php echo base_url(); ?>" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/frontend/img/favicon.ico">

    <!-- css -->
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="assets/frontend/css/main.css">
    <link rel="stylesheet" href="assets/frontend/css/custom.css">
    <link rel="stylesheet" href="assets/frontend/css/green.css">
    <link rel="stylesheet" href="assets/frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/frontend/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/frontend/css/owl.theme.css">-->
    <link rel="stylesheet" href="assets/frontend/css/lightbox.css">
    <link rel="stylesheet" href="assets/frontend/css/animate.min.css">
    <link rel="stylesheet" href="assets/frontend/css/rateit.css">
    <link rel="stylesheet" href="assets/frontend/css/bootstrap-select.min.css">
    <link href="assets/frontend/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
    <!-- Demo Purpose Only. Should be removed in production -->
    <link rel="stylesheet" href="assets/frontend/css/config.css">

    <link href="assets/frontend/css/green.css" rel="alternate stylesheet" title="Green color">
    <!--<link href="assets/frontend/css/blue.css" rel="alternate stylesheet" title="Blue color">-->
    <!--<link href="assets/frontend/css/red.css" rel="alternate stylesheet" title="Red color">-->
    <!--<link href="assets/frontend/css/orange.css" rel="alternate stylesheet" title="Orange color">-->
    <!--<link href="assets/frontend/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">-->
    <!-- Demo Purpose Only. Should be removed in production : END -->


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css">

        <!-- Fonts -->
   <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>-->

    <link rel="stylesheet" type="text/css" href="assets/frontend/plugins/fancybox/dist/jquery.fancybox.min.css">

    <link rel="stylesheet" type="text/css" href="assets/frontend/plugins/sweetalert/css/sweetalert.css">

</head>
<?php
if($seccion=="contactanos")
{
   $onload = 'initialize()';
}
else
{
    $onload = '';
}
  ?>
<body onload="<?php echo $onload ?>">

  </head>
  <body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

      <!-- ============================================== TOP MENU ============================================== -->
      <div class="top-bar animate-dropdown">
        <div class="container">
          <div class="header-top-inner">
            <div class="cnt-account">

              <ul class="list-unstyled">

                 <?php
               if($this->session->userdata('usermercasub_registrado'))

                {
              $telefonoUsuario = $this->session->userdata('usuario_telefono');
              $nombreUsuario   = $this->session->userdata('nombres_usuario');
              $apellidoUsuario = $this->session->userdata('apellidos_usuario');
              $autorizado      = $this->session->userdata('autorizado');
              $total      = $this->session->userdata('total');
                echo'<li><a href=""><i class="icon fa fa-user"></i>'.$apellidoUsuario.' '." ".' '.$nombreUsuario.'</a></li>';
                 echo'<li><a href="editdatos"><i class="icon fa fa-user"></i>Editar Datos</a></li>';
                 echo'<li><a href="verpedido"><i class="icon fa fa-user"></i>Pedidos Realizados</a></li>';

                echo'<li><a href="salir"><i class="icon fa fa-exit"></i>Salir</a></li>';

                 }
                 else{
               echo'<li><a href="ingresar"><i class="icon fa fa-user"></i>Ingresar</a></li>';

                echo'<li><a href="registrate"><i class="icon fa fa-user"></i>Regístrate</a></li>';
                 }
            ?>

              </ul>
            </div><!-- /.cnt-account -->


            <div class="cnt-account cnt-block">
              <ul class="list-unstyled">

               <div class="social-header">
                            <?php
              $fb = getConfig('enlace_facebook');
              if($fb!="")
              {
                 echo '<a href="'.$fb.'" target="_blank" class="active" ><i class="icon fa fa-facebook"></i></a>';
              }

              $tw = getConfig('enlace_twitter');
              if($tw!="")
              {
                 echo '<a href="'.$tw.'" target="_blank" ><i class="icon fa fa-twitter"></i></a>';
              }

              $pin = getConfig('enlace_pinterest');
              if($pin != "")
              {
                 echo'<a href="'.$pin.'" target="_blank" ><i class="icon fa fa-pinterest"></i></a>';
              }


              $ins = getConfig('enlace_instagram');
              if($ins!="")
              {
                 echo '<a href="'.$ins.'" target="_blank" ><i class="icon fa fa-instagram"></i></a>';
              }

             $you = getConfig('enlace_youtube');
              if($you!="")
              {
                 echo '<a href="'.$you.'" target="_blank" ><i class="icon fa fa-youtube"></i></a>';
              }

                 $sk = getConfig('enlace_skype');
              if($sk!="")
              {
                 echo '<a href="'.$sk.'" target="_blank" ><i class="icon fa fa-skype"></i></a>';
              }
            ?>


                          </div>

              </ul>
            </div><!-- /.cnt-account -->

            <div class="clearfix"></div>
          </div><!-- /.header-top-inner -->
        </div><!-- /.container -->
      </div><!-- /.header-top -->
      <!-- ============================================== TOP MENU : END ============================================== -->
      <div class="main-header">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
              <!-- ============================================================= LOGO ============================================================= -->
              <div class="logo">
                <a href="index.html">
                  <img src="assets/frontend/img/logo.png" alt="" width="181">
                </a>
              </div><!-- /.logo -->
              <!-- ============================================================= LOGO : END ============================================================= -->
            </div><!-- /.logo-holder -->

            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
              <div class="contact-row">
                  <div class="contact inline">
                     <!-- <i class="icon fa fa-envelope"></i> <?php echo getConfig('correo');?>-->
                  </div>
              </div><!-- /.contact-row -->
              <!-- ============================================================= SEARCH AREA ============================================================= -->
               <!--<div class="search-area">
                  <form action="productos/resultado" class="clearfix" method="post">
                      <div class="control-group">
                          <input class="search-field" name="search" id="search" placeholder="Buscar Producto..." />
                          <button type="submit" class="search-button"></button>
                      </div>
                  </form>
              </div>--><!-- /.search-area -->
              <!-- ============================================================= SEARCH AREA : END ============================================================= -->
            </div><!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
              <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
              <div class="dropdown dropdown-cart">
                <a href="pedidos" class="dropdown-toggle lnk-cart">
                  <div class="items-cart-inner">
                    <div class="total-price-basket">
                      <span class="lbl">Pedido:</span>
                      <span class="total-price">
                        <span class="sign" id="numItem">
                        <?php
                          if(! empty($this->session->userdata('carrito_items')))
                          {
                            $carrito=$this->session->userdata('carrito_items');
                            echo count($carrito);
                          }else
                            {
                              echo 0;
                            }
                        ?>
                        </span>
                        <span class="value">Items</span>
                      </span>
                    </div>
                    <div class="basket">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                    </div>
                    <!--<div class="basket-item-count"><span class="count" id="numItem">0</span></div>-->
                  </div>
                </a>
              </div><!-- /.dropdown-cart -->
              <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
            </div><!-- /.top-cart-row -->
          </div><!-- /.row -->

        </div><!-- /.container -->

      </div><!-- /.main-header -->

      <!-- ============================================== NAVBAR ============================================== -->
      <div class="header-nav animate-dropdown">
          <div class="container">
              <div class="yamm navbar navbar-default" role="navigation">
                  <div class="navbar-header">
                      <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                  </div>
                  <div class="nav-bg-class">
                      <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                          <ul class="nav navbar-nav">

                            <li
                              <?php if($seccion=="inicio") echo 'class="active"'; ?>><a href="./">Inicio</a>
                            </li>

                            <li
                              <?php if($seccion=="nosotros")echo'class="active"';?>><a href="nosotros">NOSOTROS</a>
                            </li>


                            <li
                              <?php if($seccion=="productos") echo 'class="active"'; ?>><a href="productos">Productos</a>
                            </li>

                            <li
                              <?php if($seccion=="articulos") echo 'class="active"'; ?>><a href="articulos">Artículos</a>
                            </li>

                             <li
                              <?php if($seccion=="catalogo") echo 'class="active"'; ?>><a href="catalogo">Catalogos</a>
                            </li>

                            <li
                              <?php if($seccion=="contactanos") echo 'class="active"';?>><a href="contactanos">Contáctanos</a>
                            </li>




                          </ul><!-- /.navbar-nav -->
                          <div class="clearfix"></div>
                        </div><!-- /.nav-outer -->
                      </div><!-- /.navbar-collapse -->
                  </div><!-- /.nav-bg-class -->
              </div><!-- /.navbar-default -->
          </div><!-- /.container-class -->

      </div><!-- /.header-nav -->
      <!-- ============================================== NAVBAR : END ============================================== -->
    </header>
    <!-- ============================================== HEADER : END ============================================== -->
