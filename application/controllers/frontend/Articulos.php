<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Articulos extends CI_Controller {

		function __construct() {
		    parent::__construct();
			$this->load->model('frontend/Generales_model'); 
			$this->load->model('frontend/Articulos_model');
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
			$seccion = 'articulos';
			$contenido = $this->Generales_model->getSeccion('articulos');
			$dataPrincipal['banners'] = $this->Inicio_model->getBanners();
			$dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();
			$dataPrincipal['titulo'] = $contenido->titulo;
			$dataPrincipal['texto'] = $contenido->texto;

			$dataPrincipal['cuerpo'] = 'articulos_view';
	
			$dataPrincipal['textosweb'] = $this->Generales_model->getTextosWeb($seccion);
			
			/*********************** BEGIN PAGINACION ARTICULOS ***************/
			/*********************** BEGIN PAGINACION ARTICULOS ***************/
			/*********************** BEGIN PAGINACION ARTICULOS ***************/

			$num_total_articulos = $this->Articulos_model->numTotalArticulos();
			$dataPrincipal['num_total_resultados'] = $num_total_articulos;
		    $config['base_url']	= base_url().'/articulos/';
		    $config['total_rows'] = $num_total_articulos;
		    $config['per_page'] = getConfig('articulos_x_pagina');
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

		    $config['cur_tag_open'] = '<li class="active"><a class="page-link" href="frontend/articulos" tabindex="-1">';
		    $config['cur_tag_close'] = '</a></li>';

		    $config['num_tag_open'] = '<li class="">';
		    $config['num_tag_close'] = '</li>';

		    $config['attributes'] = array('class' => 'page-link');

		    $this->pagination->initialize($config);
		    $articulos = $this->Articulos_model->getArticulosxPagina($inicio, $config['per_page']);
		    $dataPrincipal["last_Articulos"]   = $articulos;
		    $dataPrincipal["paginacion"]  = $this->pagination->create_links();

		    /*********************** END PAGINACION ARTICULOS ***************/
		    /*********************** END PAGINACION ARTICULOS ***************/
		    /*********************** END PAGINACION ARTICULOS ***************/	
			
			$data = array();
			$data['seccion'] = $seccion;
			$data['title'] = $contenido->title;
			$data['keywords'] = $contenido->keywords;
			$data['description'] = $contenido->description;
		
			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);
			
			$this->load->view("frontend/includes/template", $dataPrincipal);
		}
		
	    public function individualArticulos() {
			$aux = $this->uri->segment(1);
			$aux2 = explode("-", $aux);
			$id_articulo = $aux2[0];
			$url_articulo = $aux2[1];
			$dataPrincipal = array();
			$dataPrincipal['articulo']  = $this->Articulos_model->getArticulos($id_articulo);
			$dataPrincipal['banners'] = $this->Inicio_model->getBanners();
			$dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();
			$dataPrincipal['last_Articulos'] = $this->Articulos_model->getLastArticulos(6);
			$dataPrincipal['Dest_Articulos'] = $this->Articulos_model->getArtDestacados(4);	
			$dataPrincipal['prueba'] = $id_articulo;
			$seccion = 'articulos';
			$dataPrincipal['seccion'] = $seccion;
			$dataPrincipal['titulo'] = 'articulo';
			$dataPrincipal['texto'] = "";
			$dataPrincipal['cuerpo'] = 'articulos_detalles_view';
			
			$dataPrincipal['textosweb'] = $this->Generales_model->getTextosWeb($seccion);
			$data = array();
			$data['title'] = 'articulo';
			$data['keywords'] = 'articulo';
			$data['description'] = 'articulo';
			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);
			
			$this->load->view("frontend/includes/template", $dataPrincipal);			
		}

		
	


	}
