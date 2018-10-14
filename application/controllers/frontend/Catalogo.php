<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Catalogo extends CI_Controller {

		function __construct() {
		    parent::__construct();
			$this->load->model('frontend/Catalogo_model'); 
		    $this->load->model('frontend/Productos_model'); 
			$this->load->model('frontend/Generales_model');
			$this->load->model('frontend/Inicio_model'); 
		}

		public function index()
		{
			$dataPrincipal = array();
			$seccion = 'catalogo';
			$dataPrincipal['seccion'] = $seccion;

			$contenido = $this->Generales_model->getSeccion($seccion);
			$dataPrincipal['titulo'] = $contenido->titulo;
			$dataPrincipal['texto'] = $contenido->texto;
			$dataPrincipal['cuerpo'] = 'catalogo_view';
		    $dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();
			$dataPrincipal['catalogos'] = $this->Catalogo_model->getCatalogo();
			$dataPrincipal['productos'] = $this->Productos_model->Productos(6);
			$dataPrincipal['textosweb'] = $this->Generales_model->getTextosWeb($seccion);

			$data = array();
			$data['seccion'] = $seccion;
			$data['title'] = $contenido->title;
			$data['keywords'] = $contenido->keywords;
			$data['description'] = $contenido->description;
			
			$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
			$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);
			
			$this->load->view("frontend/includes/template", $dataPrincipal);
		}
	}
