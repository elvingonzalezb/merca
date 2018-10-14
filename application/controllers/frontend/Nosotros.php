<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Nosotros extends CI_Controller {

		function __construct() {
		    parent::__construct();
			$this->load->model('frontend/Generales_model'); 
			$this->load->model('frontend/Inicio_model'); 
		}

		public function index()
		{
			$dataPrincipal = array();
			$seccion = 'nosotros';
			

			$contenido = $this->Generales_model->getSeccion($seccion);
			$dataPrincipal['titulo'] = $contenido->titulo;
			$dataPrincipal['texto'] = $contenido->texto;
			$dataPrincipal['cuerpo'] = 'nosotros_view';
			$dataPrincipal['banners'] = $this->Inicio_model->getBanners();
			$dataPrincipal['bannerslateral'] = $this->Inicio_model->getBannersLateral();
			$dataPrincipal['nosotros'] = $this->Generales_model->getTextosWeb('nosotros');
			$dataPrincipal['vision'] = $this->Generales_model->getTextosWeb('vision');
			$dataPrincipal['mision'] = $this->Generales_model->getTextosWeb('mision');
			$dataPrincipal['valores'] = $this->Generales_model->getTextosWeb('valores');

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
