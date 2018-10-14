<!DOCTYPE html>
<html lang="es">
<head media="print">
	<meta charset="utf-8">
	<title>Zona de Administración</title>
    <base href="<?php echo base_url(); ?>" />
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Zona de Administración">
	<meta name="author" content="Eduardo Rosadio">
    <link rel="shortcut icon" href="assets/frontend/img/favicon.ico">
	<script src="assets/mainpanel/charisma/js/jquery-1.7.2.min.js"></script>
    <link href="assets/mainpanel/charisma/css/font-awesome.min.css" rel="stylesheet">
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
	<link href="assets/mainpanel/charisma/css/js_color_picker_v2.css" rel="stylesheet">    
	<link href="assets/mainpanel/charisma/css/custom_css.css" rel="stylesheet">   
    <link type="text/css" href="assets/mainpanel/charisma/css/JSCal2/jscal2.css" rel="stylesheet"/>
    <link type="text/css" href="assets/mainpanel/charisma/css/JSCal2/border-radius.css" 
    rel="stylesheet"/>       
   	
    <script src="assets/mainpanel/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/mainpanel/sweetalert/css/sweetalert.css">
    
    
</head>

<?php
	if( isset($current_section) )
	{
		if( ($current_section=="contactanos") )
		{
			$onload = ' onload="initialize()"';
		}
		else
		{
			$onload = '';
		}
	}
	else
	{
		$onload = '';
	}
?>
<body<?php echo $onload; ?>>


	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="./" target="_blank"><img src="assets/mainpanel/imagenes/logo_header.png" width="100" alt=""></a>
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user icono_negro"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
<!--						<li><a href="#">PERFIL</a></li>-->
						<li class="divider"></li>
						<li><a href="mainpanel/logout">SALIR</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->	
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="<?php echo base_url(); ?>" target="_blank">Cargar Web</a></li>
                        <li><a href="javascript:void(0)">Bienvenido: <?php echo $this->session->userdata('nombre_admin'); ?></a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<div class="container-fluid">
		<div class="row-fluid marginTop30">
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
                                <?php echo $menu; ?>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<div id="content" class="span10">
			<!-- content starts -->