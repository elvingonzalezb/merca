<ul class="nav nav-tabs nav-stacked main-menu">
<?php
    switch( $this->session->userdata('nivel') )
    {
        case 1:
?>
   
    <li <?php if($current_section=='inicio' or $current_section=='banners'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/inicio"><i class="fa fa-home"></i><span class="hidden-tablet"> Inicio</span></a></li>

    <li <?php if($current_section=='bannerslateral' or $current_section=='bannerslateral'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/bannerslateral/listado"><i class="fa fa-home"></i><span class="hidden-tablet"> Banners Laterales</span></a></li>       

    <li <?php if($current_section=='nosotros'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/nosotros/listado" ><i class="fa fa-certificate"></i><span class="hidden-tablet"> Nosotros</span></a></li> 
   

   
    <li <?php if($current_section=='articulos'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/articulos/listado"><i class="fa fa-list"></i><span class="hidden-tablet"> Artículos</span></a></li>
    
    <li <?php if($current_section=='contactanos'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/contactanos/editTexto"><i class="fa fa-table"></i><span class="hidden-tablet"> Contáctanos</span></a></li>
   
    <li <?php if($current_section=='catalogo'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/catalogo/listadoCategoria"><i class="fa fa-shopping-cart"></i><span class="hidden-tablet"> Catálogo</span></a></li>

    <li <?php if($current_section=='colores'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/colores/listado"><i class="fa fa-paint-brush"></i><span class="hidden-tablet"> Colores</span></a></li>

    <li <?php if($current_section=='registro_usuarios'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/registro_usuarios/listado"><i class="fa fa-cogs"></i><span class="hidden-tablet"> Usuarios Registrados</span></a></li>

    <li <?php if($current_section=='stock'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/stock/listado"><i class="fa fa-cogs"></i><span class="hidden-tablet"> Stock</span></a></li>

    <li <?php if($current_section=='pedidos'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/pedidos/listado"><i class="fa fa-cogs"></i><span class="hidden-tablet"> Pedidos</span></a></li>

    <li class="nav-header hidden-tablet">CONFIGURACIÓN</li>

    <li <?php if($current_section=='configuracion'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/configuracion/listado"><i class="fa fa-cog"></i><span class="hidden-tablet"> Parámetros</span></a></li>

 
    <li <?php if($current_section=='usuarios'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/usuarios/listado"><i class="fa fa-user"></i><span class="hidden-tablet"> Usuarios</span></a></li>

<?php
    break;

    case 2:
    case 3:
?>
    <li class="nav-header hidden-tablet">SECCIONES</li>
    <li <?php if($current_section=='articulos'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/blog/listado"><i class="fa fa-thumbs-up"></i><span class="hidden-tablet"> Artículos</span></a></li>
<?php
    break;
}
?>

</ul>