<?php
class Catalogo extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion_mainpanel');
        $this->load->model('mainpanel/Catalogo_model');
        $this->load->library('My_upload');
    }

    public function index() {
        $this->validacion_mainpanel->validacion_login();
    }

      ////////////////////BEGIN CATEGORIAS///////////////
     ////////////////////BEGIN CATEGORIAS///////////////
     ////////////////////BEGIN CATEGORIAS///////////////
    public function listadoCategoria()
        {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="catalogo/index_categoria_view";
            $dataPrincipal['categorias'] = $this->Catalogo_model->getListadoCategorias();
      
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

    public function nuevacategoria() {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] = "catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = '';
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="catalogo/nueva_categoria_view";

            $resultado = $this->uri->segment(4);
            if($resultado=="error")
            {
                $error = $this->uri->segment(5);
            }
            else
            {
                $error = '';
            }
            $dataPrincipal["resultado"] = $resultado;
            $dataPrincipal["error"] = $error;
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

    public function grabarCategoria()
        {
            $this->validacion_mainpanel->validacion_login();

            $data["id_categoria"]  = $this->input->post('id_categoria');
            $data["nom_cat"]       = $this->input->post("nom_cat");
            $data["url"]           = $this->input->post("url");
            $data["orden"]         = $this->input->post('orden');
            $data["estado"]        = $this->input->post("estado");
            $data["title"]         = $this->input->post('title');
            $data["keywords"]      = $this->input->post('keywords');
            $data["description"]   = $this->input->post('description');

            $this->my_upload->upload($_FILES["imagen"]);
            if($this->my_upload->uploaded == true)
            {
                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 600;
                $this->my_upload->image_y               = 600;
                $this->my_upload->process('./files/categorias/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 400;
                $this->my_upload->image_y               = 300;
                $this->my_upload->process('./files/categorias/medianas/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 255;
                $this->my_upload->image_y               = 194;
                $this->my_upload->process('./files/categorias/pequeñas/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 75;
                $this->my_upload->image_y               = 75;
                $this->my_upload->process('./files/categorias/thumbs/');

                if($this->my_upload->processed == true)
                {
                    $data["imagen"] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error= $this->my_upload->error;
                    $this->session->set_userdata("error", 'IMAGEN:'.$error);
                    redirect("mainpanel/catalogo/nuevacategoria");
                }
            }
            else
            {
            }
            $last_id = $this->Catalogo_model->grabarCategoria($data);


            if($last_id>0)
            {
                $this->session->set_userdata("success", "Se proceso correctamente la información");
                redirect("mainpanel/catalogo/listadoCategoria");
            }
            else
            {
                $error="Ocurrio un error al procesar la información";
                $this->session->set_userdata("error", $error);
                redirect("mainpanel/catalogo/nuevacategoria");
            }
        }

    public function editCategoria($id) {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] = "catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = '';
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="catalogo/edit_categoria_view";

            $id_cat = $this->uri->segment(4);
            $categoria = $this->Catalogo_model->getCategoria($id_cat);
            $dataPrincipal['categoria'] = $categoria;
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }


    public function actualizarCategoria()
        {
            $this->validacion_mainpanel->validacion_login();

            $data = array();
            $data["nom_cat"]       = $this->input->post("nom_cat");
            $data["url"]           = $this->input->post("url");
            $data["orden"]         = $this->input->post('orden');
            $data["estado"]        = $this->input->post("estado");
            $data["title"]         = $this->input->post('title');
            $data["keywords"]      = $this->input->post('keywords');
            $data["description"]   = $this->input->post('description');
            $id_categoria          = $this->input->post('id');

            $this->my_upload->upload($_FILES["imagen"]);
            if ( $this->my_upload->uploaded == true  )
            {
                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 600;
                $this->my_upload->image_y               = 600;
                $this->my_upload->process('./files/categorias/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 400;
                $this->my_upload->image_y               = 300;
                $this->my_upload->process('./files/categorias/medianas/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 255;
                $this->my_upload->image_y               = 194;
                $this->my_upload->process('./files/categorias/pequeñas/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 75;
                $this->my_upload->image_y               = 75;
                $this->my_upload->process('./files/categorias/thumbs/');
                if ($this->my_upload->processed == true )
                {
                    $data['imagen'] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error = $this->my_upload->error;
                    $this->session->set_userdata("error",'FOTO: '.$error);
                    redirect('mainpanel/catalogo/editCategoria/'.$id_categoria);
                }
            }
            $result=$this->Catalogo_model->updateCategoria($id_categoria, $data);

            if($result==true)
            {
                $this->session->set_userdata("success",'Se procesó correctamente la información');
                redirect('mainpanel/catalogo/editCategoria/'.$id_categoria);
            }
            else
            {
                $error='Ocurrió un error al procesar su información '.$error;
                $this->session->set_userdata("error",$error);
                redirect('mainpanel/catalogo/editCategoria/'.$id_categoria);
            }
        }

    public function borrarCategoria($id_categoria)
        {
            $this->validacion_mainpanel->validacion_login();
            $id_categoria = $this->uri->segment(4);
            $secciones= $this->Catalogo_model->getCatDel($id_categoria);
            $imagen = $secciones->imagen;
            @unlink("files/categorias/".$imagen);
            @unlink("files/categorias/medianas".$imagen);
            @unlink("files/categorias/pequeñas".$imagen);
            @unlink("files/categorias/thumbs".$imagen);
            $result = $this->Catalogo_model->deleteCategoria($id_categoria);
            if($result==true)
            {
                $this->session->set_userdata("success", "Su información se procesó correctamente");
                redirect("mainpanel/catalogo/listadoCategoria");
            }
            else
            {
                $this->session->set_userdata("error", "Ocurrió un error al procesar su información");
                redirect("mainpanel/catalogo/listadoCategoria");
            }
        }


          //////////////////////////BEGIN SUBCATEGORIAS /////////////////////////
          //////////////////////////BEGIN SUBCATEGORIAS /////////////////////////
          //////////////////////////BEGIN SUBCATEGORIAS /////////////////////////
    public function listadoSubCategoria()
        {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="catalogo/index_subcat_view";
            $dataPrincipal['subcategorias'] = $this->Catalogo_model->getListaSubCategorias();

            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

    public function listadoSubCategoriaFilter($id_categoriafilter)
        {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="catalogo/index_subcat_view";
            $dataPrincipal['subcategorias'] = $this->Catalogo_model->getListaSubCategoriasFilter($id_categoriafilter);

            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }



    public function nuevaSubcategoria() {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] = "catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = '';
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["categorias"] = $this->Catalogo_model->categorias();
            $dataPrincipal["cuerpo"]="catalogo/nueva_subcat_view";

            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

    public function grabarSubCategoria()
        {
            $this->validacion_mainpanel->validacion_login();
            // grabar los datos

            $data["id_categoria"]  = $this->input->post('id_categoria');
            $data["nombre"]        = $this->input->post("nombre");
            $data["url"]           = $this->input->post("url");
            $data["orden"]         = $this->input->post('orden');
            $data["estado"]        = $this->input->post('estado');
            $data["title"]         = $this->input->post('title');
            $data["keywords"]      = $this->input->post('keywords');
            $data["description"]   = $this->input->post('description');

            $this->my_upload->upload($_FILES["imagen"]);
            if($this->my_upload->uploaded == true)
            {
                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 600;
                $this->my_upload->image_y               = 600;
                $this->my_upload->process('./files/subcategorias/');



                if($this->my_upload->processed == true)
                {
                    $data["imagen"] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error= $this->my_upload->error;
                    $this->session->set_userdata("error", 'IMAGEN:'.$error);
                    redirect("mainpanel/catalogo/nuevaSubcategoria");
                }
            }
            else
            {
            }
            $result = $this->Catalogo_model->grabarSubCategoria($data);


            if($result>0)
            {
                $this->session->set_userdata("success", "Se proceso correctamente la información");
                redirect("mainpanel/catalogo/nuevaSubcategoria");
            }
            else
            {
                $error="Ocurrio un error al procesar la información";
                $this->session->set_userdata("error", $error);
                redirect("mainpanel/catalogo/nuevaSubcategoria");
            }
        }

    public function editSubCategoria($id) {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] = "catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = '';
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="catalogo/edit_subcat_view";

            $id_subcat = $this->uri->segment(4);
            $subcategoria = $this->Catalogo_model->getSubCategoria($id_subcat);
            $dataPrincipal['subcategoria'] = $subcategoria;
            $dataPrincipal["categorias"] = $this->Catalogo_model->categorias();
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }


   public function actualizarSubCategoria()
        {
            $this->validacion_mainpanel->validacion_login();
            // EDITAR Clientes
            $data = array();
            $data["id_categoria"]  = $this->input->post("id_categoria");
            $data["nombre"]        = $this->input->post("nombre");
            $data["url"]           = $this->input->post("url");
            $data["orden"]         = $this->input->post('orden');
            $data["estado"]        = $this->input->post("estado");
            $data["title"]         = $this->input->post('title');
            $data["keywords"]      = $this->input->post('keywords');
            $data["description"]   = $this->input->post('description');
            $id_subcategoria          = $this->input->post('id');
            //$name_image = date("YmdHis");
            $this->my_upload->upload($_FILES["imagen"]);
            if ( $this->my_upload->uploaded == true  )
            {
                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 600;
                $this->my_upload->image_y               = 600;
                $this->my_upload->process('./files/subcategorias/');


                if ($this->my_upload->processed == true )
                {
                    $data['imagen'] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error = $this->my_upload->error;
                    $this->session->set_userdata("error",'FOTO: '.$error);
                    redirect('mainpanel/catalogo/editSubCategoria/'.$id_subcategoria);
                }
            }
            $result=$this->Catalogo_model->updateSubCategoria($id_subcategoria, $data);

            if($result==true)
            {
                $this->session->set_userdata("success",'Se procesó correctamente la información');
                redirect('mainpanel/catalogo/editSubCategoria/'.$id_subcategoria);
            }
            else
            {
                $error='Ocurrió un error al procesar su información '.$error;
                $this->session->set_userdata("error",$error);
                redirect('mainpanel/catalogo/editSubCategoria/'.$id_subcategoria);
            }
        }

    public function borrarSubCategoria($id_subcategoria)
        {
            $this->validacion_mainpanel->validacion_login();
            $id_subcategoria = $this->uri->segment(4);
            $secciones= $this->Catalogo_model->getSubCatDel($id_subcategoria);
            $imagen = $secciones->imagen;
            @unlink("files/subcategorias/".$imagen);

            $result = $this->Catalogo_model->deleteSubCategoria($id_subcategoria);
            if($result==true)
            {
                $this->session->set_userdata("success", "Su información se procesó correctamente");
                redirect("mainpanel/catalogo/listadoSubCategoria");
            }
            else
            {
                $this->session->set_userdata("error", "Ocurrió un error al procesar su información");
                redirect("mainpanel/catalogo/listadoSubCategoria");
            }
        }

    //////////////////////PRODUCTOS///////////////////////////
    //////////////////////PRODUCTOS///////////////////////////
    //////////////////////PRODUCTOS///////////////////////////

    public function listado()
        {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="catalogo/index_producto_view";
            $productos = $this->Catalogo_model->getLista();
            $dataPrincipal["productos"] = $productos;
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

    public function listadoFiltersubCat($id_filter)
        {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="catalogo/index_producto_color_view";

           $aux = $this->Catalogo_model->getListaFilterSubCat($id_filter);
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
                    $aux2['descripcion'] = $producto->descripcion;
                    $aux3 =  $this->Catalogo_model->getProductoColor($producto->id);
                    $prodxcolor = array();
                    foreach ($aux3 as $valu) {
                        $aux5=array();
                        $aux4=$this->Catalogo_model->getColor($valu->id_color);
                        $aux5['nombre_color']=$aux4->nombre_color;
                        $aux5['codigo_color']=$aux4->codigo_color;
                        $aux5['id_prodxcolor']=$valu->id;
                        $prodxcolor[]=$aux5;
                    }
                    $aux2['prodxcolor'] = $prodxcolor;
                    $productos[] = $aux2;
                }
                $dataPrincipal["productos"] = $productos;

                $dataPrincipal["id_subcategoria"] = $id_filter;
                $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }


    public function nuevo() {
        $this->validacion_mainpanel->validacion_login();

        $theme = $this->config->item('admin_theme');
        $data['theme'] = $theme;
        $datos2 = array();
        $datos2["current_section"] ="catalogo";
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = '';
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
        $dataPrincipal["cuerpo"]="catalogo/nuevo_producto_view";
        // LISTA CATEGORIAS PARA COMBO*********************************
        $dataPrincipal["categorias"] = $this->Catalogo_model->categorias();

        $this->load->view("mainpanel/includes/template", $dataPrincipal);
      }

    public function grabar()
        {
            $this->validacion_mainpanel->validacion_login();
            // grabar los datos
            $data["id_categoria"]  = $this->input->post('id_categoria');
            $data["id_subcategoria"]  = $this->input->post('id_subcategoria');
            $data["nom_producto"]        = $this->input->post("nom_producto");
            $data["url"]           = $this->input->post("url");
            $data["codigo"]           = $this->input->post("codigo");
            $data["precio"]           = $this->input->post("precio");
            $data["resumen"]     = $this->input->post("resumen");
            $data["descripcion"]      = $this->input->post("descripcion");
            $data["state"]         = $this->input->post("state");
            $data["orden"]         = $this->input->post('orden');
            $data["destacado"]     = $this->input->post('destacado');
            $data["title"]         = $this->input->post('title');
            $data["keywords"]      = $this->input->post('keywords');
            $data["description"]   = $this->input->post('description');
            //$name_image = date("YmdHis");
            $this->my_upload->upload($_FILES["imgprod"]);
            if($this->my_upload->uploaded == true)
            {
                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 900;
                $this->my_upload->image_y               = 600;
                $this->my_upload->process('./files/productos/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 450;
                $this->my_upload->image_y               = 300;
                $this->my_upload->process('./files/productos/medianas/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 255;
                $this->my_upload->image_y               = 194;
                $this->my_upload->process('./files/productos/pequeñas/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 75;
                $this->my_upload->image_y               = 75;
                $this->my_upload->process('./files/productos/thumbs/');

                if($this->my_upload->processed == true)
                {
                    $data["imagen"] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error= $this->my_upload->error;
                    $this->session->set_userdata("error", 'IMAGEN:'.$error);
                    redirect("mainpanel/catalogo/nuevo");
                }
            }
            else
            {
            }
            $last_id = $this->Catalogo_model->grabar($data);


            if($last_id>0)
            {
                $this->session->set_userdata("success", "Se proceso correctamente la información");
                redirect("mainpanel/catalogo/listado");
            }
            else
            {
                $error="Ocurrio un error al procesar la información";
                $this->session->set_userdata("error", $error);
                redirect("mainpanel/catalogo/nuevo");
            }
        }

    public function edit($id)
        {
        $this->validacion_mainpanel->validacion_login();

        $theme = $this->config->item('admin_theme');
        $data['theme'] = $theme;
        $datos2 = array();
        $datos2["current_section"] ="catalogo";
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
        $dataPrincipal["cuerpo"]="catalogo/edit_producto_view";

        $id_producto = $this->uri->segment(4);
        $producto = $this->Catalogo_model->getProductos($id_producto);
        $dataPrincipal['producto'] = $producto;

        $dataPrincipal["categorias"] = $this->Catalogo_model->categorias();
        $dataPrincipal["subcategorias"] = $this->Catalogo_model->subCategoriasFilter($producto->id_categoria);

        $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

    public function actualizar()
        {
            $this->validacion_mainpanel->validacion_login();

            $data = array();
            $data["id_categoria"]    = $this->input->post('id_categoria');
            $data["id_subcategoria"] = $this->input->post('id_subcategoria');
            $data["nom_producto"]    = $this->input->post("nom_producto");
            $data["url"]             = $this->input->post("url");
            $data["codigo"]          = $this->input->post("codigo");
            $data["precio"]           = $this->input->post("precio");
            $data["resumen"]         = $this->input->post("resumen");
            $data["descripcion"]     = $this->input->post("descripcion");
            $data["state"]         = $this->input->post("state");
            $data["orden"]         = $this->input->post('orden');
            $data["destacado"]     = $this->input->post('destacado');
            $data["title"]         = $this->input->post('title');
            $data["keywords"]      = $this->input->post('keywords');
            $data["description"]   = $this->input->post('description');
            $id_producto           = $this->input->post('id');

            $this->my_upload->upload($_FILES["imagen"]);
            if ( $this->my_upload->uploaded == true  )
            {
                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 900;
                $this->my_upload->image_y               = 600;
                $this->my_upload->process('./files/productos/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 450;
                $this->my_upload->image_y               = 300;
                $this->my_upload->process('./files/productos/medianas/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 255;
                $this->my_upload->image_y               = 194;
                $this->my_upload->process('./files/productos/pequeñas/');

                $this->my_upload->allowed               = array('image/*');

                $this->my_upload->image_resize          = true;
                $this->my_upload->image_ratio_crop      = true;
                $this->my_upload->image_x               = 75;
                $this->my_upload->image_y               = 75;
                $this->my_upload->process('./files/productos/thumbs/');
                if ($this->my_upload->processed == true )
                {
                    $data['imagen'] = $this->my_upload->file_dst_name;
                    $this->my_upload->clean();
                }
                else
                {
                    $error = $this->my_upload->error;
                    $this->session->set_userdata("error",'FOTO: '.$error);
                    redirect('mainpanel/catalogo/edit/'.$id_producto);
                }
            }
            $result=$this->Catalogo_model->update($id_producto, $data);


            if($result==true)
            {
                $this->session->set_userdata("success",'Se procesó correctamente la información');
                redirect('mainpanel/catalogo/edit/'.$id_producto);
            }
            else
            {
                $error='Ocurrió un error al procesar su información '.$error;
                $this->session->set_userdata("error",$error);
                redirect('mainpanel/catalogo/edit/'.$id_producto);
            }
        }

    public function borrarProducto($id)
        {
            $this->validacion_mainpanel->validacion_login();
            $secciones= $this->Catalogo_model->getProDel($id);
            $imagen = $secciones->imagen;
                @unlink("files/productos/".$imagen);
                @unlink("files/productos/medianas/".$imagen);
                @unlink("files/productos/thumbs/".$imagen);
                $result = $this->Catalogo_model->delete($id);
            if($result==true)
            {
                $this->session->set_userdata("success", "Su información se procesó correctamente");
                redirect("mainpanel/catalogo/listado");
            }
            else
            {
                $this->session->set_userdata("error", "Ocurrió un error al procesar su información");
                redirect("mainpanel/catalogo/listado");
            }
        }

    //////////////////////VARIEDAD DE COLORES///////////////////////////
    //////////////////////VARIEDAD DE COLORES///////////////////////////
    //////////////////////VARIEDAD DE COLORES///////////////////////////
    public function nuevaVarColor() {
        $this->validacion_mainpanel->validacion_login();

        $theme = $this->config->item('admin_theme');
        $data['theme'] = $theme;
        $datos2 = array();
        $datos2["current_section"] ="catalogo";
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = '';
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
        $dataPrincipal["cuerpo"]="catalogo/nuevo_varcolor_view";
        // LISTA CATEGORIAS PARA COMBO*********************************
        $dataPrincipal["categorias"] = $this->Catalogo_model->categorias();

        $dataPrincipal["colores"] = $this->Catalogo_model->colores();
        $this->load->view("mainpanel/includes/template", $dataPrincipal);

      }

    public function grabarColor()
        {
            $this->validacion_mainpanel->validacion_login();
            // grabar los datos
            $data["id_categoria"]    = $this->input->post('id_categoria');
            $data["id_subcategoria"] = $this->input->post('id_subcategoria');
            $data["id_producto"]     = $this->input->post("id_producto");
            $data["id_color"]        = $this->input->post("id_color");

            $result = $this->Catalogo_model->grabarColor($data);

            if($result>0)
            {
                $this->session->set_userdata("success", "Se proceso correctamente la información");
                redirect("mainpanel/catalogo/listadoFiltersubCat/".$data["id_subcategoria"]);
            }
            else
            {
                $error="Ocurrio un error al procesar la información";
                $this->session->set_userdata("error", $error);
               redirect("mainpanel/catalogo/listadoFiltersubCat/".$data["id_subcategoria"]);
            }
        }

    public function editVariedadColor()
        {
            $this->validacion_mainpanel->validacion_login();

            $theme = $this->config->item('admin_theme');
            $data['theme'] = $theme;
            $datos2 = array();
            $datos2["current_section"] ="catalogo";
            $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
            $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
            $data['modal'] = $this->load->view('mainpanel/includes/modal_delete', $datos2, true);
            $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true);
            $dataPrincipal["cuerpo"]="catalogo/edit_varcolor_view";

            $id_prodxcolor = $this->uri->segment(4);

            $productoxcolor = $this->Catalogo_model->getidProd($id_prodxcolor);
            $dataPrincipal["productoxcolor"] = $productoxcolor;

            $dataPrincipal["colores"] = $this->Catalogo_model->colores();
            $this->load->view("mainpanel/includes/template", $dataPrincipal);
        }

    public function actualizarVariedadColor()
        {
            $this->validacion_mainpanel->validacion_login();

            $data["id_color"]  = $this->input->post("id_color");
            $id                = $this->input->post('id');
            $id_subcategoria       = $this->input->post('id_subcategoria');

            $result = $this->Catalogo_model->updateColores($id, $data);

            if($result>0)
            {
                $this->session->set_userdata("success", "Se proceso correctamente la información");
                 redirect("mainpanel/catalogo/listadoFiltersubCat/".$id_subcategoria);
            }
            else
            {
                $error="Ocurrio un error al procesar la información";
                $this->session->set_userdata("error", $error);
                 redirect("mainpanel/catalogo/listadoFiltersubCat/".$id_subcategoria);
            }
        }


    public function borrarVariedadColor()
        {
            $this->validacion_mainpanel->validacion_login();
            $id_prodxcolor = $this->uri->segment(4);
            //Obtener id_producto para devolver a la view
            $productoxcolor = $this->Catalogo_model->getidProd($id_prodxcolor);
            $id_subcategoria = $productoxcolor->id_subcategoria;
            // Eliminar el registro
            $result = $this->Catalogo_model->deleteColor($id_prodxcolor);
            if($result>0)
            {
                $this->session->set_userdata("success", "Su información se procesó correctamente");
                redirect('mainpanel/catalogo/listadoFiltersubCat/'.$id_subcategoria);
            }
            else
            {
                $this->session->set_userdata("error", "Ocurrió un error al procesar su información");
                redirect('mainpanel/catalogo/listadoFiltersubCat/'.$id_subcategoria);
            }
        }
    }
?>
