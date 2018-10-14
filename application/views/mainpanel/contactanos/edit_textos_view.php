<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=<?php echo GOOGLEMAP_KEY; ?>"></script>
<div>
    <ul class="breadcrumb">
     <li><a href="mainpanel/contactanos/editTexto">Editar Texto</a> <span class="divider">/</span></li>
     <li><a href="mainpanel/contactanos/listado">Ver Mensajes</a> <span class="divider">/</span></li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar</h2>
            <div class="box-icon"> <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a> </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/contactanos/actualizarTexto/<?php echo $generales->seccion;?>" method="post" enctype="multipart/form-data" onsubmit="return validar_articulo()">
                <fieldset>
                    <legend>Ingrese la información que desea modificar</legend>
                    <?php 
                       if($this->session->userdata('success'))
                        { 
                            echo '<div class="alert alert-success">'; 
                            echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                            echo $this->session->userdata('success');    
                            echo '</div>';     
                            $this->session->unset_userdata('success');
                        }     
                        if($this->session->userdata('error'))  
                        {                        
                            echo '<div class="alert alert-error">';  
                            echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                            echo $this->session->userdata('error'); 
                            echo '</div>';    
                        }   
                        ?>
                     
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Título</label>
                            <div class="controls">
                                <input type="text" id="titulo" name="titulo" class="span8 typeahead" value="<?php echo $generales->titulo;?>" onkeyup="url_amigable('titulo', 'url', 'title'); cuentaChars(this.value, 'contador1', 155)" maxlength="155">
                                <?php  
                                    $aux = 155 - strlen($generales->titulo) + 1;  
                                 ?>
                                    <label><span id="contador1"><?php echo $aux; ?></span> caracteres restantes</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Url</label>
                            <div class="controls">
                                <input type="text" id="url" name="url" class="span8 typeahead" value="<?php echo $generales->url;?>"> </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Imagen</label>
                            <div class="controls">
                                <div class="span6"><img src="files/contactanos/<?php echo $generales->imagen; ?>" width="300" /></div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <div class="alert alert-success span10">
                                    <p><strong>La imagen a subir debe tener dimensiones de 1280 x 565 pixeles. Caso contrario la imagen se forzará al tamaño indicado.</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Imagen</label>
                            <div class="controls">
                                <input type="file" name="imagen" id="imagen"> </div>
                        </div>
                       
                       
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Descripción</label>
                                <div class="controls">
                                    <textarea id="fulltext" name="fulltext" rows="3">
                                        <?php echo $generales->fulltext;?>
                                    </textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('fulltext', {
                                            width: '800px',
                                            height: '300px'
                                        });
                                    </script>
                                </div>
                            </div>
                               
                            <div class="control-group">
                                <label class="control-label">Estado</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="state" id="estado1" value="1"
                                         <?php if($generales->state==1)
                                          echo ' checked="checked"';
                                         ?>> Activo
                                    </label>
                                    <div style="clear:both"></div>
                                    <label class="radio">
                                       <input type="radio" name="state" id="estado2" value="0"
                                        <?php if($generales->state==0)
                                         echo ' checked="checked"';
                                        ?>> Inactivo 
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Sección</label>
                                <div class="controls">
                                    <input type="text" id="seccion" name="seccion" class="span8 typeahead" value="<?php echo $generales->seccion;?>" readonly >
                                </div>
                            </div>
                               <legend> Parámetros SEO</legend>
                         <div class="control-group">
                            <label class="control-label" for="typeahead">Title</label>
                            <div class="controls">
                                <input type="text" id="title" name="title" class="span8 typeahead" value="<?php echo $generales->title;?> ">
                            </div>
                        </div>
                           <div class="control-group">
                            <label class="control-label" for="typeahead">Description</label>
                            <div class="controls">
                                <input type="text" id="description" name="description" class="span8 typeahead" value="<?php echo $generales->description;?>">
                                         
                            </div>
                        </div>
                         <div class="control-group">
                            <label class="control-label" for="typeahead">keywords</label>
                            <div class="controls">
                                <input type="text" id="keywords" name="keywords" class="span8 typeahead" value="<?php echo $generales->keywords;?>">
                            </div>
                        </div>
                               <legend>Ubicación en el mapa</legend> 
                    <div class="control-group">
                        <label class="control-label">Buscar direccion</label>
                        <div class="controls">
                            <label>Escriba la dirección,departamento,pais y presiones el botón BUSCAR</label>
                            <label class="">
                                <input id="address" placeholder="Direccion, Provincia, Departamento, Pais" type ="text" class="span8" />
                                <input id="search" class="span2 btn btn-info" type="button" value ="BUSCAR" /> 
                            </label>
                        </div>
                    </div>                     
                     
                    <div class="control-group">
                        <label class="control-label" for="typeahead"></label>
                        <div class="controls">
                            <label>O mueva el globo rojo a cualquier punto del mapa ubicando el lugar que usted busca.</label>
                            <div id="mapa" style="width: 90%; height: 400px; border: #000 solid 1px;"></div>
                        </div>
                    </div>  
                           
                        <div class="form-actions">
                         <input type="hidden" name="id" id="id" value="<?php echo $generales->id; ?>">
                         <input type="hidden" name="id_mapa" id="id_mapa" value="<?php echo $mapa->id_mapa; ?>">
                         <input type="hidden" name="latitud_centro" id="latitud_centro" value="<?php echo $mapa->latitud_centro; ?>">
                        <input type="hidden" name="longitud_centro" id="longitud_centro" value="<?php echo $mapa->longitud_centro; ?>">
                        <input type="hidden" name="latitud_punto" id="latitud_punto" value="<?php echo $mapa->latitud_punto; ?>">
                        <input type="hidden" name="longitud_punto" id="longitud_punto" value="<?php echo $mapa->longitud_punto; ?>">                        
                        <input type="hidden" name="zoom" id="zoom" value="<?php echo $mapa->zoom; ?>">                        
                        <input type="hidden" name="tipomapa" id="tipomapa" value="<?php echo $mapa->tipomapa; ?>">    
                         <input type="submit" class="btn btn-primary" value="ACTUALIZAR">
                        
                        </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript"> 
    function initialize() { 
            var latlng = new google.maps.LatLng(<?php echo $mapa->latitud_centro; ?>, <?php echo $mapa->longitud_centro; ?>); 
            var myOptions = { 
                    zoom: <?php echo $mapa->zoom; ?>,
                    center: latlng,
                    scrollwheel: false,
                    <?php
                            switch($mapa->tipomapa)
                            {
                                    case "roadmap": 
                    ?>
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                    <?php
                                    break;
                                    case "hybrid":
                    ?>
                                    mapTypeId: google.maps.MapTypeId.HYBRID
                    <?php               
                                    break;
                            }
                    ?>
            };
            var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
            var myOffice = new google.maps.LatLng(<?php echo $mapa->latitud_punto; ?>, <?php echo $mapa->longitud_punto; ?>); 
            var marker = new google.maps.Marker({
                    position: myOffice,
                    draggable: true,
                    map: map                         
            });
            var infowindow = new google.maps.InfoWindow({                        
                    size: new google.maps.Size(250,120)
            });
            google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
            });
            google.maps.event.addListener(map, 'dragend', function() {
                    var center = map.getCenter();
                    var texto_globoes = center.toString();
                    //alert(texto_globoes);
                    var latitud = extrae_latitud(texto_globoes);
                    var longitud = extrae_longitud(texto_globoes);
                    $("#latitud_centro").val(latitud);
                    $("#longitud_centro").val(longitud);
            });

            google.maps.event.addListener(map, 'zoom_changed', function() {
                    var newzoom = map.getZoom();
                    //alert('el zoom cambio:'+newzoom);
                    //document.nueva.zoom.value = newzoom;
                    $("#zoom").val(newzoom);
            });

            google.maps.event.addListener(map, 'maptypeid_changed', function() {
                    var tipomapa = map.getMapTypeId();
                    //alert('tipo de mapa:'+tipomapa);
                    $("#tipomapa").val(tipomapa);
            });

            google.maps.event.addListener(marker, 'dragend', function() {
                    var posicion = marker.getPosition();
                    var ubicacion = posicion.toString();
                    //alert(ubicacion);
                    var latitud2 = extrae_latitud(ubicacion);
                    var longitud2 = extrae_longitud(ubicacion);
                    $("#latitud_punto").val(latitud2);
                    $("#longitud_punto").val(longitud2);
                    //document.nueva.latitud_punto.value = latitud2;
                    //document.nueva.longitud_punto.value = longitud2;
            });
    }
    </script>
            
    <script type="text/javascript">
        function extrae_latitud(texto_globoes) {
                var aux = texto_globoes.split(",");
                var aux2 = aux[0].split("(");
                var latitud = aux2[1];
                return latitud;
        }

        function extrae_longitud(texto_globoes) {
                var aux = texto_globoes.split(",");
                var aux3 = aux[1].split(")");
                var longitud = aux3[0];
                return longitud;
        }
    </script>
    <script type="text/javascript">
  function ubica(address) {
    var geoCoder = new google.maps.Geocoder(address)
    var request = {address:address};
    geoCoder.geocode(request, function(result, status){
        var latlng = new google.maps.LatLng(result[0].geometry.location.lat(), result[0].geometry.location.lng());
        var myOptions = {
          zoom: 15,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("mapa"),myOptions);

        // TOMAMOS EL CENTRO Y EL PUNTO DE LA DIRECCION ENCONTRADA
        var center = map.getCenter();
        var texto_globoes = center.toString();
        //alert(texto_globoes);
        var latitud = extrae_latitud(texto_globoes);
        var longitud = extrae_longitud(texto_globoes);
        $("#latitud_centro").val(latitud);
        $("#longitud_centro").val(longitud);
        $("#latitud_punto").val(latitud);
        $("#longitud_punto").val(longitud);

        var marker = new google.maps.Marker({position:latlng,map:map,title:'title',draggable: true});
        google.maps.event.addListener(map, 'dragend', function() { 
                var center = map.getCenter();
                var texto_globoes = center.toString();
                //alert(texto_globoes);
                var latitud = extrae_latitud(texto_globoes);
                var longitud = extrae_longitud(texto_globoes);
                $("#latitud_centro").val(latitud);
                $("#longitud_centro").val(longitud);
        }); 

        google.maps.event.addListener(map, 'zoom_changed', function() {
                var newzoom = map.getZoom();
                //alert('el zoom cambio:'+newzoom);
                //document.nueva.zoom.value = newzoom;
                $("#zoom").val(newzoom);
        });

        google.maps.event.addListener(map, 'maptypeid_changed', function() {
                var tipomapa = map.getMapTypeId();
                //alert('tipo de mapa:'+tipomapa);
                $("#tipomapa").val(tipomapa);
        }); 

        google.maps.event.addListener(marker, 'dragend', function() { 
                var posicion = marker.getPosition();
                var ubicacion = posicion.toString();
                //alert(ubicacion);
                var latitud2 = extrae_latitud(ubicacion);
                var longitud2 = extrae_longitud(ubicacion);
                $("#latitud_punto").val(latitud2);
                $("#longitud_punto").val(longitud2);
                //document.nueva.latitud_punto.value = latitud2;
                //document.nueva.longitud_punto.value = longitud2;
        }); 
    })
  }
</script>
<script>
    $(document).ready(function(){
        //initialize('Lima Peru');
        $('#search').bind('click',function(){
            ubica($('#address').val());    
        })
    })
</script>