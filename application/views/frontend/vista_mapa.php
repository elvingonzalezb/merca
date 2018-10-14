									<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=<?php echo GOOGLEMAP_KEY; ?>"></script>
									<div>
										<div id="mapa" style="width: 98%; height: 400px; border: #ccc solid 1px; margin: 0 auto;"></div>
									</div>
									<script type="text/javascript"> 
								    function initialize() { 
								            var latlng = new google.maps.LatLng(<?php echo $mapa["latitud_centro"]; ?>, <?php echo $mapa["longitud_centro"]; ?>); 
								            var myOptions = { 
								                    zoom: <?php echo $mapa["zoom"]; ?>,
								                    center: latlng,
								                    scrollwheel: false,
								                    <?php
								                            switch($mapa["tipo_mapa"])
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