<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Productos extends CI_Controller {

		function __construct() {
		    parent::__construct();
			$this->load->model('frontend/Generales_model');
			$this->load->model('frontend/Productos_model');
			$this->load->model('frontend/Inicio_model');

		}

		public function index()
		{
			$aux = $this->uri->segment(2);
			if($aux!="")
			{
				$inicio = $aux;
			}
			else
			{
				$inicio = 0;
			}
			$dataPrincipal = array();
			$seccion = 'productos';
			$contenido = $this->Generales_model->getSeccion('productos');
			$dataPrincipal['banners'] = $this->Inicio_model->getBanners();
			$dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();
			$dataPrincipal['categorias'] = $this->Inicio_model->getCategorias(6);
			$dataPrincipal['titulo'] = $contenido->titulo;
			$dataPrincipal['texto'] = $contenido->texto;
			$dataPrincipal['cuerpo'] = 'productos_view';
			$dataPrincipal['textosweb'] = $this->Generales_model->getTextosWeb($seccion);



			/*********************** BEGIN PAGINACION PRODUCTOS ***************/
			/*********************** BEGIN PAGINACION PRODUCTOS ***************/
			/*********************** BEGIN PAGINACION PRODUCTOS ***************/

			$num_total_productos = $this->Productos_model->numTotalProductos();
			$dataPrincipal['num_total_resultados'] = $num_total_productos;
		    $config['base_url']	= base_url().'/productos/';
		    $config['total_rows'] = $num_total_productos;
		    $config['per_page'] = getConfig('productos_x_pagina');
		    $config['uri_segment'] = 2;
		    $config['num_links'] = 5;

		    $config['full_tag_open'] = '<ul class="pagination theme-colored">';
		    $config['full_tag_close'] = '</ul>';

		    $config['first_link'] = false;
		    $config['last_link'] = false;

		    $config['first_tag_open'] = '<li class="disabled">';
		    $config['first_tag_close'] = '</li>';

		    $config['prev_link'] = 'Anterior';
		    $config['prev_tag_open'] = '<li class="">';
		    $config['prev_tag_close'] = '</li>';

		    $config['next_link'] = 'Siguiente';
		    $config['next_tag_open'] = '<li class="">';
		    $config['next_tag_close'] = '</li>';

		    $config['last_tag_open'] = '<li class="disabled">';
		    $config['last_tag_close'] = '</li>';

		    $config['cur_tag_open'] = '<li class="active"><a class="page-link" href="frontend/productos" tabindex="-1">';
		    $config['cur_tag_close'] = '</a></li>';

		    $config['num_tag_open'] = '<li class="">';
		    $config['num_tag_close'] = '</li>';

		    $config['attributes'] = array('class' => 'page-link');

		    $this->pagination->initialize($config);
		    $aux = $this->Productos_model->getProductosxPagina($inicio, $config['per_page']);

		    //$aux = $this->Productos_model->getListaFilterSubCat();
            $productos = array();

                foreach($aux as $producto)
                {
                    $aux2 = array();

                    $aux2['id_producto'] = $producto->id;
                    $aux2['nom_producto'] = $producto->nom_producto;
                    $aux2['imagen'] = $producto->imagen;
                    $aux2['url'] = $producto->url;
                    $aux2['resumen'] = $producto->resumen;
                    $aux2['codigo'] = $producto->codigo;
                    $aux2['precio'] = $producto->precio;
                    $aux2['descripcion'] = $producto->descripcion;
                    $aux3 =  $this->Productos_model->getProductoColor($producto->id);
                    $prodxcolor = array();
                    foreach ($aux3 as $valu) {
                        $aux5=array();
                        $aux4=$this->Productos_model->getColor($valu->id_color);
                        $aux5['nombre_color']=$aux4->nombre_color;
                        $aux5['codigo_color']=$aux4->codigo_color;
                        $aux5['id_prodxcolor']=$valu->id;
                        $prodxcolor[]=$aux5;
                    }
                    $aux2['prodxcolor'] = $prodxcolor;
                    $productos[] = $aux2;
                }
               // $dataPrincipal["productos"] = $productos;


		    $dataPrincipal["productos"]   = $productos;
		    $dataPrincipal["paginacion"]  = $this->pagination->create_links();

		    /*********************** END PAGINACION PRODUCTOS ***************/
		    /*********************** END PAGINACION PRODUCTOS ***************/
		    /*********************** END PAGINACION PRODUCTOS ***************/

			$data = array();
			$data['seccion'] = $seccion;
			$data['title'] = $contenido->title;
			$data['keywords'] = $contenido->keywords;
			$data['description'] = $contenido->description;

			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);

			$this->load->view("frontend/includes/template", $dataPrincipal);
		}

		public function subCat()
		{

			$aux = $this->uri->segment(2);
			$aux2 = explode("-", $aux);
			$id_categoria = $aux2[(count($aux2) - 1)];

			$limite = 6;
			$dataPrincipal = array();
			$dataPrincipal['categorias'] = $this->Inicio_model->getCategorias(6);
			$dataPrincipal['id_categoria_current'] = $id_categoria;
			$dataPrincipal['nomCategoria'] =  $this->Productos_model->getNombreCategoria($id_categoria);
			$dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();

			$dataPrincipal['prueba'] = $id_categoria;
			$seccion = 'productos';
			$dataPrincipal['seccion'] = $seccion;
			$dataPrincipal['titulo'] = 'producto';
			$dataPrincipal['texto'] = "";
			$dataPrincipal['cuerpo'] = 'subcat_view';
			$dataPrincipal['textosweb'] = $this->Generales_model->getTextosWeb($seccion);

			$dataPrincipal['subcategorias']  = $this->Productos_model->getSubcat($id_categoria, $limite);

			$data = array();
			$data['title'] = 'producto';
			$data['keywords'] = 'producto';
			$data['description'] = 'producto';
			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);

			$this->load->view("frontend/includes/template", $dataPrincipal);
		}

		public function productosSubcat()
		{
			$aux = $this->uri->segment(2);
			$aux2 = explode("-", $aux);
			$id_subcategoria = $aux2[0];
			$url_subcategoria = $aux2[1];

			$dataPrincipal = array();
			$dataPrincipal['categorias'] = $this->Inicio_model->getCategorias(6);
			$dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();
			$dataPrincipal['prueba'] = $id_subcategoria;
			$seccion = 'productos';
			$dataPrincipal['seccion'] = $seccion;
			$dataPrincipal['titulo'] = 'producto';
			$dataPrincipal['texto'] = "";
			$dataPrincipal['cuerpo'] = 'productossubcat_view';
			$dataPrincipal['textosweb'] = $this->Generales_model->getTextosWeb($seccion);


		    $aux = $this->Productos_model->getProdxSubcat($id_subcategoria);

		    //$aux = $this->Productos_model->getListaFilterSubCat();
            $productos = array();

                foreach($aux as $producto)
                {
                    $aux2 = array();

                    $aux2['id_producto'] = $producto->id;
                    $aux2['nom_producto'] = $producto->nom_producto;
                    $aux2['codigo'] = $producto->codigo;
                    $aux2['imagen'] = $producto->imagen;
                    $aux2['url'] = $producto->url;
                    $aux2['resumen'] = $producto->resumen;
                    $aux2['descripcion'] = $producto->descripcion;
                    $aux2['precio'] = $producto->precio;
                    $aux3 =  $this->Productos_model->getProductoColor($producto->id);
                    $prodxcolor = array();
                    foreach ($aux3 as $valu) {
                        $aux5=array();
                        $aux4=$this->Productos_model->getColor($valu->id_color);
                        $aux5['nombre_color']=$aux4->nombre_color;
                        $aux5['codigo_color']=$aux4->codigo_color;
                        $aux5['id_prodxcolor']=$valu->id;
                        $prodxcolor[]=$aux5;
                    }
                    $aux2['prodxcolor'] = $prodxcolor;
                    $productos[] = $aux2;
                }
               // $dataPrincipal["productos"] = $productos;


		    $dataPrincipal["productos"]   = $productos;


			$data = array();
			$data['title'] = 'producto';
			$data['keywords'] = 'producto';
			$data['description'] = 'producto';
			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);

			$this->load->view("frontend/includes/template", $dataPrincipal);
		}

	    public function detallesProductos() {
			$aux = $this->uri->segment(2);
			$aux2 = explode("-", $aux);
			$id_producto = $aux2[0];
			$url_producto = $aux2[1];
			$dataPrincipal = array();
			$linkeditPedido = "productos".'/'.$id_producto.'-'.$url_producto;
			$dataPrincipal['linkeditPedido'] = $linkeditPedido;

			$limite = 3;
			$dataPrincipal['categorias'] = $this->Inicio_model->getCategorias(6);
			$prodactual  				 = $this->Productos_model->getProductos($id_producto);
			$dataPrincipal['prodactual'] = $prodactual;
			$dataPrincipal['productos']  = $this->Productos_model->Productos($limite);
			$dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();


			$dataPrincipal['prodrelacionados'] = $this->Productos_model->getProRelacionados($prodactual->id_subcategoria,$limite);

			$dataPrincipal['colores'] = $this->Productos_model->getColorProductos($id_producto);


			$dataPrincipal['prueba'] = $id_producto;
			$seccion = 'productos';
			$dataPrincipal['seccion'] = $seccion;
			$dataPrincipal['titulo'] = 'producto';
			$dataPrincipal['texto'] = "";
			$dataPrincipal['cuerpo'] = 'productos_detalles_view';

			$dataPrincipal['textosweb'] = $this->Generales_model->getTextosWeb($seccion);
			$data = array();
			$data['title'] = 'producto';
			$data['keywords'] = 'producto';
			$data['description'] = 'producto';
			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);

			$this->load->view("frontend/includes/template", $dataPrincipal);
		}





	}
