
<?php
$dataCanales = ControladorCanales::ctrSeleccionarCanales();

$dataMarkers = ControladorCanales::ctrSeleccionarDireccion();
$apikey = "AIzaSyB8xnUNTHZQB3g1rhpIuDvHbsswXvSQl0M";
$lat = '-33,86103' ;
$long = '151,1719';
$zoom = 8;


?>





<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor Canales de atención</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor Canales de atención</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <!-- BLOQUE 1 -->



                <div class="box box-primary ">

                    <div class="box-header with-border">
                        <h3 class="box-title">IMAGEN FONDO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">

                        <div class="form-group">

                            <label>Cambiar Fondo</label>

                            <p class="pull-right">

                                <img src="<?php  echo $dataCanales["imgFondo"]; ?>" class="img-thumbnail previsualizarImgCanales" width="200px">

                            </p>

                            <input type="file" id="subirImgCanales">

                            <p class="help-block">Tamaño recomendado 1200px * 625px</p>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarImgCanales" class="btn btn-primary pull-right">Guardar Imagen</button>
                    </div>



                    <div class="box-header with-border">

                        <h3 class="box-title">BANNER</h3>

                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="text" class="form-control" id="bannerTitulo" name="bannerTitulo" placeholder="Escriba el título" value=" <?php echo $dataCanales["bannertitulo"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Descripción</label>
                            <input type="text" class="form-control" id="bannerDesc" placeholder="Escriba una Descripción" value=" <?php echo $dataCanales["bannerdescripcion"]; ?>" >
                        </div>





                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarDataBanner" class="btn btn-primary pull-right">Guardar</button>

                    </div>


                </div>




            </div>


            <div class="col-md-6">
                <!-- BLOQUE 2 -->


                <div class="box box-primary ">

                    <div class="box-header with-border">
                        <h3 class="box-title">DATOS DEL FORMULARIO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">

                        <div class="form-group">

                            <label for="usr">Título:</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                                <input type="text" min="1" class="form-control cambioInformacion" name="titulo" id="titulo" value="<?php echo $dataCanales["titulo"]; ?>">

                            </div>

                        </div>
                        <div class="form-group">

                            <label for="comment">Descripción:</label>

                            <textarea class="form-control cambioScript" rows="5" id="contactDescripcion" name="contactDescripcion">

         <?php echo $dataCanales["descripcion"]; ?>

          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarInfoCanales" class="btn btn-primary pull-right">Guardar</button>
                    </div>





                </div>



            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Mapa</h3>

                    </div>

                </div>

                <div id="map"></div>

                <script>
                    var customLabel = {
                        restaurant: {
                            label: 'R'
                        },
                        bar: {
                            label: 'B'
                        }
                    };

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: new google.maps.LatLng(-33.863276, 151.207977),
                            zoom: 12
                        });
                        var infoWindow = new google.maps.InfoWindow;

                        // Change this depending on the name of your PHP or XML file
                        downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
                            var xml = data.responseXML;
                            var markers = xml.documentElement.getElementsByTagName('marker');
                            Array.prototype.forEach.call(markers, function(markerElem) {
                                var name = markerElem.getAttribute('name');
                                var address = markerElem.getAttribute('address');
                                var type = markerElem.getAttribute('type');
                                var point = new google.maps.LatLng(
                                    parseFloat(markerElem.getAttribute('lat')),
                                    parseFloat(markerElem.getAttribute('lng')));

                                var infowincontent = document.createElement('div');
                                var strong = document.createElement('strong');
                                strong.textContent = name
                                infowincontent.appendChild(strong);
                                infowincontent.appendChild(document.createElement('br'));

                                var text = document.createElement('text');
                                text.textContent = address
                                infowincontent.appendChild(text);
                                var icon = customLabel[type] || {};
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: point,
                                    label: icon.label
                                });
                                marker.addListener('click', function() {
                                    infoWindow.setContent(infowincontent);
                                    infoWindow.open(map, marker);
                                });
                            });
                        });
                    }



                    function downloadUrl(url, callback) {
                        var request = window.ActiveXObject ?
                            new ActiveXObject('Microsoft.XMLHTTP') :
                            new XMLHttpRequest;

                        request.onreadystatechange = function() {
                            if (request.readyState == 4) {
                                request.onreadystatechange = doNothing;
                                callback(request, request.status);
                            }
                        };

                        request.open('GET', url, true);
                        request.send(null);
                    }

                    function doNothing() {}
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8xnUNTHZQB3g1rhpIuDvHbsswXvSQl0M&callback=initMap">
                </script>

            </div>
        </div>



    </section>

</div>

<script src="vistas/js/gestorCanales.js"></script>




