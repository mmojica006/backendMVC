
<?php
$dataCanales = ControladorCanales::ctrSeleccionarCanales();

$dataMarkers = ControladorCanales::ctrSeleccionarDireccion();
$apikey = "AIzaSyB8xnUNTHZQB3g1rhpIuDvHbsswXvSQl0M";
$lat = '-33,86103' ;
$long = '151,1719';
$zoom = 8;


?>
<style type="text/css">
    html { height: 100% }
    body { height: 100%; margin: 0; padding: 0 }
    #map-canvas { height: 100% }
</style>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=
          <?php echo $apikey; ?>&sensor=false">
</script>
<script type="text/javascript">
    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(<?php echo $lat.', '.$long; ?>),
            zoom: <?php echo $zoom; ?>
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


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
                <div id="map-canvas">Here</div>
            </div>
        </div>



    </section>

</div>

<script src="vistas/js/gestorCanales.js"></script>




