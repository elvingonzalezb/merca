<div>
    <ul class="breadcrumb">
        <li><a href="mainpanel/inicio">Inicio</a> <span class="divider">/</span></li>
        <li><a href="mainpanel/banners/homeTextos">Texto Home </a> <span class="divider">/</span></li>
        <li><a href="mainpanel/banners/listado">Lista de Banners </a> <span class="divider">/</span></li>
        <li><a href="mainpanel/banners/nuevo">Nuevo Banner</a></li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Nuevo Banner</h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
        </div>

        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/banners/grabar" method="post" enctype="multipart/form-data" onsubmit="return validaBanner()">
                <fieldset>
                    <legend>Ingrese los datos del nuevo banner</legend>
                    <?php
                        if( isset($resultado) )
                        {
                            if($resultado=="success")
                            {
                                echo '<div class="alert alert-success">';
                                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                echo '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente';
                                echo '</div>';
                            }
                            if($resultado=="error")
                            {
                                echo '<div class="alert alert-error">';
                                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                echo '<strong>RESULTADO:</strong> '.str_replace("%20", " ", $error);
                                echo '</div>';                                
                            }
                        }
                    ?>                    
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Título</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="titulo" name="titulo" value="" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Subtítulo</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="subtitulo" name="subtitulo" value="" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Sumilla</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="sumilla" name="sumilla" value="" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Texto boton</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="boton" name="boton" value="" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2" for="typeahead">Enlace</label>
                        <div class="controls span10">
                            <input type="text" class="span6 typeahead" id="enlace" name="enlace" value="" >
                        </div>

                    </div>

                    <div class="control-group">

                        <label class="control-label span2" for="typeahead">Orden</label>

                        <div class="controls span10">

                            <input type="text" class="span1 typeahead" id="orden" name="orden" value="<?=$orden?>" >

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="control-label span2">Orientacion de los textos</label>

                        <div class="controls span10">

                            <label class="radio">

                                <input type="radio" name="posicion" id="posicion1" value="right" checked="checked">

                                Derecha

                            </label>

                            <div style="clear:both"></div>

                            <label class="radio">

                                <input type="radio" name="posicion" id="posicion2" value="center">

                                Centro

                            </label>

                            <div style="clear:both"></div>

                            <label class="radio">

                                <input type="radio" name="posicion" id="posicion2" value="left">

                                Izquierda

                            </label>

                        </div>

                    </div>



                    <div class="control-group">

                        <label class="control-label span2">Estado</label>

                        <div class="controls span10">

                            <label class="radio">

                                <input type="radio" name="estado" id="estado1" value="A" checked="checked">

                                Activo

                            </label>

                            <div style="clear:both"></div>

                            <label class="radio">

                                <input type="radio" name="estado" id="estado2" value="I">

                                Inactivo

                            </label>

                        </div>

                    </div>     

                    <div class="control-group">

                        <div class="controls">

                            <div class="alert alert-success ">

                            <p><strong>La imagen a subir debe tener dimensiones de 1920 x 1280 pixeles. Caso contrario la imagen se forzará al tamaño indicado.</strong></p>

                            </div> 

                        </div>

                    </div>                       

                    <div class="control-group">

                    <label class="control-label span2">Banner</label>

                        <div class="controls span10">

                          <input type="file" name="banner" id="banner">

                        </div>

                    </div>

                    <div class="form-actions">

                        <input type="submit" class="btn btn-primary" value="GRABAR">

                    </div>

                </fieldset>

            </form>   



        </div>

    </div><!--/span-->



</div><!--/row-->