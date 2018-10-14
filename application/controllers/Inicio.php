<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Inicio extends CI_Controller {

		function __construct()
		 {
		   parent::__construct();
			 $this->load->model('frontend/Generales_model');
			 $this->load->model('frontend/Inicio_model');
			 $this->load->library('validacion');
			}

		public function index()
		{
				$dataPrincipal = array();
				$seccion = 'inicio';
				$contenido = $this->Generales_model->getSeccion('inicio');
				$dataPrincipal['title'] = $contenido->title;
				$dataPrincipal['keywords'] = $contenido->keywords;
				$dataPrincipal['description'] = $contenido->description;
				$dataPrincipal['titulo'] = $contenido->titulo;
				$dataPrincipal['texto'] = $contenido->texto;

	  			if (!$this->session->userdata('usermercasub_registrado'))
					{
				 	 	$this->session->unset_userdata('total');
	        	$this->session->unset_userdata('carrito_items');
					}
					else
							{
								$this->session->userdata('carrito_items');
							}


				$dataPrincipal['cuerpo'] = 'inicio_view';
				$dataPrincipal['seccion'] = 'inicio';
	  		$dataPrincipal['banners'] = $this->Inicio_model->getBanners();
				$dataPrincipal['categorias'] = $this->Inicio_model->getCategorias(6);
	
				$dataPrincipal['last_articulos'] = $this->Inicio_model->getLast_Art(4);
		    $dataPrincipal['nosotros'] = $this->Inicio_model->getTextosGenerales('nosotros');
	      $dataPrincipal['tituloservicios'] = $this->Generales_model->getTextosWeb('servicios');
				$dataPrincipal['Dest_productos'] = $this->Inicio_model->getProDestacados(6);

	  		$data = array();
				$data['title'] = $contenido->title;
				$data['keywords'] = $contenido->keywords;
				$data['description'] = $contenido->description;
				$dataPrincipal['header'] = $this->load->view('frontend/includes/header_view', $data, true);
				$dataPrincipal['footer'] = $this->load->view('frontend/includes/footer_view', $data, true);

				$this->load->view("frontend/includes/template", $dataPrincipal);
		}

	}
