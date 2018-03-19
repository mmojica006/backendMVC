
<?php
$dataReclamo = ControladorReclamo::ctrSeleccionarreclamo();


?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor Reclamo</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor Reclamo</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <!-- BLOQUE 1 -->



                <div class="box box-primary ">




                    <div class="box-header with-border">

                        <h3 class="box-title">BANNER</h3>

                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="text" class="form-control" id="bannerTitulo" name="bannerTitulo" placeholder="Escriba el título" value=" <?php echo $dataReclamo["bannertitulo"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Descripción</label>
                            <input type="text" class="form-control" id="bannerDesc" placeholder="Escriba una Descripción" value=" <?php echo $dataReclamo["bannerdescripcion"]; ?>" >
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
                                <input type="text" min="1" class="form-control cambioInformacion" name="titulo" id="titulo" value="<?php echo $dataReclamo["titulo"]; ?>">

                            </div>

                        </div>
                        <div class="form-group">

                            <label for="comment">Descripción:</label>

                            <textarea class="form-control cambioScript" rows="5" id="reclamoDescripcion" name="reclamoDescripcion">

         <?php echo $dataReclamo["descripcion"]; ?>

          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarInfoReclamo" class="btn btn-primary pull-right">Guardar</button>
                    </div>





                </div>



            </div>

        </div>



    </section>

</div>

<script src="vistas/js/gestorReclamo.js"></script>



