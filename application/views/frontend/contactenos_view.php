<div class="body-content outer-top-bd">
  <div class="container">
    <div class="row inner-bottom-sm">
      <div class="contact-page">
      
        
        <div class="col-md-9 contact-form">
            <div class="col-md-12 contact-title">
              <h4><?php echo $textosweb->titulo?></h4>
            </div>      <?php
            $resultado = $this->session->userdata("resultado");
            if( isset($resultado) )
            {
                switch( $resultado )
                {
                    case "exito":
                        echo '<div class="alert alert-success" role="alert">';
                        echo $this->session->userdata("mensaje");
                        echo '</div>';
                    break;

                    case "error":
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $this->session->userdata("mensaje");
                        echo '</div>';
                    break;
                }
                $this->session->unset_userdata('resultado');
                $this->session->unset_userdata('mensaje');
            }
        ?>
           

     
       <form method="post" id="contactform" name="contactform" action="frontend/contactanos/enviar" >
            <div class="col-md-4 ">
                <div class="form-group">
                    <label>Nombre <small>*</small></label>
                    <input name="nombre" id="nombre" class="form-control" type="text" placeholder="Ingrese su nombre" >
                </div>
            </div>
          
          <div class="col-md-4">
            <div class="form-group">
               <label>Correo <small>*</small></label>
               <input name="email" id="email" class="form-control" type="text" placeholder="Ingrese su correo">
            </div>
          </div>
        
          <div class="col-md-4">
            <div class="form-group">
              <label>Teléfono</label>
              <input name="telefono" id="telefono" class="form-control" type="text" placeholder="Ingrese su teléfono">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label>Asunto</label>
              <textarea name="asunto" id="asunto" class="form-control" rows="2" placeholder="Ingrese su asunto"></textarea>
            </div>
          </div>
          
          <div class="col-md-12">
            <div class="form-group">
              <label>Mensaje</label>
              <textarea name="mensaje" id="mensaje" class="form-control" rows="5" placeholder="Ingrese su mensaje"></textarea>
            </div>
          </div>
           
           <div class="col-md-12">
            <div class="form-group">
               <div class="g-recaptchamod">
                <?php echo $recaptcha;?>
               </div>
             </div>
          </div>
  
        <div class="col-md-12 outer-bottom-small m-t-20">
          <button type="submit" class="btn-upper btn btn-fucsia checkout-page-button">Envie su mensaje</button>
        </div>
      </form>
</div>



        <div class="col-md-3 contact-info">
          <div class="contact-title">
            <h4>INFORMACIÓN</h4>
          </div>
          <div class="clearfix address">
            <span class="contact-i"><i class="fa fa-map-marker"></i></span>
            <span class="contact-span"><?php echo getConfig('direccion');?></span>
          </div>
          <div class="clearfix phone-no">
            <span class="contact-i"><i class="fa fa-mobile"></i></span>
            <span class="contact-span"><?php echo getConfig('telefono_footer');?> <br></span>
          </div>
          <div class="clearfix email">
            <span class="contact-i"><i class="fa fa-envelope"></i></span>
            <span class="contact-span"><?php echo getConfig('correo');?></span>
          </div>
        </div>  

         <div class="col-md-12 contact-map outer-bottom-vs">
          <div id="mapa" style="width: 98%; height: 400px; border: #ccc solid 1px; margin: 0 auto;"></div>
        </div>
     </div><!-- /.contact-page -->
   </div>

          
              <!-- Google Map Javascript Codes -->

          <script src="http://maps.google.com/maps/api/js?key=<?php echo GOOGLEMAP_KEY; ?>"></script>
          <script > 
            function initialize(){ 
                       
                         var latlng = new google.maps.LatLng(<?php echo $mapa["latitud_centro"]; ?>, <?php echo $mapa["longitud_centro"]; ?>); 
                                var myOptions = { 
                                        zoom: <?php echo $mapa["zoom"]; ?>,
                                        center: latlng,
                                        scrollwheel: false,
                                        <?php
                                                switch($mapa["tipomapa"])
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
                                var myOffice = new google.maps.LatLng(<?php echo $mapa["latitud_punto"]; ?>, <?php echo $mapa["longitud_punto"]; ?>); 
                               
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
       
      </div>
    </section>
  </div>
  <!-- end main-content -->
