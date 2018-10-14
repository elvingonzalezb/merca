<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['articulos/([0-9]+)'] = 'frontend/articulos';
$route['articulos'] = 'frontend/articulos';
$route['([0-9]+)-(.*)'] = 'frontend/articulos/individualArticulos';

$route['servicios'] = 'frontend/servicios';
$route['([0-9]+)-(.*)/servicios'] = 'frontend/servicios/individualServicios';

$route['subcategorias/(.*)-([0-9]+)'] = 'frontend/productos/subCat';
//$route['productos/(.*)-([0-9]+)'] = 'frontend/productos/catProd';

$route['(.*)-([0-9]+)'] = 'frontend/productos/subCat';
$route['subcategorias'] = 'frontend/productos/subCategorias';
$route['categoriasproductos'] = 'frontend/productos/categoriasProductos';

$route['subcat/([0-9]+)-(.*)'] = 'frontend/productos/productosSubcat';
$route['productos'] = 'frontend/productos';
$route['nuevosproductos'] = 'frontend/productos/nuevosProductos';
$route['productos/([0-9]+)'] = 'frontend/productos';
$route['productos/([0-9]+)-(.*)'] = 'frontend/productos/detallesProductos';

$route['editdatos'] = 'frontend/ingresar/editdatos';
$route['updatedatos'] = 'frontend/ingresar/actualizar';
$route['clientes'] = 'frontend/clientes';
$route['contactanos'] = 'frontend/contactanos';
$route['catalogo'] = 'frontend/catalogo';
$route['nosotros'] = 'frontend/nosotros';
$route['ingresar'] = 'frontend/ingresar';
$route['ingresar_registrate'] = 'frontend/ingresar_registrate';
$route['ingresar_registrate/validarLogin'] = 'frontend/ingresar_registrate/validarLogin';
$route['ingresar_registrate/enviar'] = 'frontend/ingresar_registrate/enviar';
$route['salir'] = 'frontend/ingresar/logout';
$route['registrate'] = 'frontend/registrate';
$route['registrate/enviar'] = 'frontend/registrate/enviar';
$route['registrate/activacion/([0-9]+)'] = 'frontend/registrate/activacion';

$route['verpedido'] = 'frontend/pedidos/verpedidos';
$route['verdetalles/([0-9]+)'] = 'frontend/pedidos/verdetalles';
$route['pedidos'] = "frontend/pedidos";
$route['pedidos/agregar'] = "frontend/pedidos/agregar";
$route['pedidos/continuar'] = "frontend/pedidos/continuar";
$route['pedidos/enviar'] = "frontend/pedidos/enviar";
$route['pedidos/error'] = "frontend/pedidos/error";
$route['pedidos/enviado'] = "frontend/pedidos/enviado";
$route['pedidos/borrar'] = "frontend/pedidos/borrar";
$route['pedidos/eliminaItemPedido/(:any)'] = "frontend/pedidos/eliminaItemPedido";


// ADMINISTRACION
$route['mainpanel'] = "mainpanel/login";
$route['mainpanel/validar'] = "mainpanel/login/validar";
$route['mainpanel/inicio'] = "mainpanel/inicio/index";

$route['mainpanel/logout'] = "mainpanel/login/logout";
$route['mainpanel/error/([a-z_-]+)'] = "mainpanel/login/index/$1";
