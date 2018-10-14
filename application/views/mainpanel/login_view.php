<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Zona de Administración - MERCASUB</title>
 
    <base href="<?php echo base_url(); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Zona de Administración - KEMAPA">
	<meta name="author" content="AjaxPerú">
	<link rel="shortcut icon" href="assets/frontend/img/favicon.ico">
	<!-- The styles -->
	<link id="bs-css" href="assets/mainpanel/charisma/css/bootstrap-spacelab.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="assets/mainpanel/charisma/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="assets/mainpanel/charisma/css/charisma-app.css" rel="stylesheet">
	<link href="assets/mainpanel/charisma/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='assets/mainpanel/charisma/css/fullcalendar.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='assets/mainpanel/charisma/css/chosen.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/uniform.default.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/colorbox.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/jquery.noty.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/noty_theme_default.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/elfinder.min.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/elfinder.theme.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/opa-icons.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/uploadify.css' rel='stylesheet'>
	<link href='assets/mainpanel/charisma/css/custom_css.css' rel='stylesheet'>
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- The fav icon -->
</head>

<body>
<div class="row-fluid">
    <div class="span12 center login-header">
        <h2>Zona de Administración - MERCASUB</h2>
    </div><!--/span-->
</div><!--/row-->

<div class="row-fluid">
    <div class="well span5 center login-box">
        <?php
            if(isset($error))
            {
				echo '<div class="alert alert-error">';
				switch ($error) {
					case "estado":
						echo 'Su cuenta esta inactiva';
					break;

					case "password":
						echo 'Clave incorrecta';
					break;

					case "usuario":
						echo 'El usuario no existe';
					break;
				}
				echo '</div>';
            }
            else
            {
                echo '<div class="alert alert-info">';
                echo 'Ingrese sus datos de acceso';
                echo '</div>';
            }
        ?>
        <form class="form-horizontal" action="mainpanel/validar" method="post">
            <fieldset>
                <div class="input-prepend" title="Usuario" data-rel="tooltip">
                    <span class="add-on"><i class="icon-user icono_negro"></i></span><input autofocus class="input-large span7 input-login" name="username" id="username" type="text" value="" />
                </div>
                <div class="clearfix"></div>
                <div class="input-prepend" title="Password" data-rel="tooltip">
                    <span class="add-on"><i class="icon-lock icono_negro"></i></span><input class="input-large span7 input-login" name="password" id="password" type="password" />
                </div>
                <div class="clearfix"></div>
                <div class="input-prepend" title="Codigo" data-rel="tooltip">
                    <?php echo $recaptcha;?>
                </div>
                <div class="clearfix"></div>
                <p class="center span5">
                    <button type="submit" class="btn btn-primary">INGRESAR</button>
                </p>
            </fieldset>
        </form>
    </div><!--/span-->
</div><!--/row-->    
    <!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- jQuery -->
	<script src="assets/mainpanel/charisma/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="assets/mainpanel/charisma/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="assets/mainpanel/charisma/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="assets/mainpanel/charisma/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="assets/mainpanel/charisma/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="assets/mainpanel/charisma/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="assets/mainpanel/charisma/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="assets/mainpanel/charisma/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='assets/mainpanel/charisma/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='assets/mainpanel/charisma/js/jquery.dataTables.min.js'></script>
	<!-- chart libraries start -->
	<script src="assets/mainpanel/charisma/js/excanvas.js"></script>
	<script src="assets/mainpanel/charisma/js/jquery.flot.min.js"></script>
	<script src="assets/mainpanel/charisma/js/jquery.flot.pie.min.js"></script>
	<script src="assets/mainpanel/charisma/js/jquery.flot.stack.js"></script>
	<script src="assets/mainpanel/charisma/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="assets/mainpanel/charisma/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="assets/mainpanel/charisma/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="assets/mainpanel/charisma/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="assets/mainpanel/charisma/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="assets/mainpanel/charisma/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="assets/mainpanel/charisma/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="assets/mainpanel/charisma/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="assets/mainpanel/charisma/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="assets/mainpanel/charisma/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="assets/mainpanel/charisma/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="assets/mainpanel/charisma/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="assets/mainpanel/charisma/js/charisma.js"></script>
</body>
</html>