<?php
$dataCanales = ControladorCanales::ctrSeleccionarCanales();

//$dataMarkers = ControladorCanales::ctrSeleccionarDireccion();
$apikey = "AIzaSyB8xnUNTHZQB3g1rhpIuDvHbsswXvSQl0M";


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

<!--                    <div class="box-header with-border">-->
<!--                        <h3 class="box-title">IMAGEN FONDO</h3>-->
<!--                        <div class="box-tools pull-right">-->
<!--                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"-->
<!--                                    title="Collapse">-->
<!---->
<!--                                <i class="fa fa-minus"></i>-->
<!---->
<!--                            </button>-->
<!---->
<!---->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="box-body">-->
<!---->
<!--                        <div class="form-group">-->
<!---->
<!--                            <label>Cambiar Fondo</label>-->
<!---->
<!--                            <p class="pull-right">-->
<!---->
<!--                                <img src="--><?php //echo $dataCanales["imgFondo"]; ?><!--"-->
<!--                                     class="img-thumbnail previsualizarImgCanales" width="200px">-->
<!---->
<!--                            </p>-->
<!---->
<!--                            <input type="file" id="subirImgCanales">-->
<!---->
<!--                            <p class="help-block">Tamaño recomendado 1200px * 625px</p>-->
<!---->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    <div class="box-footer">-->
<!--                        <button type="button" id="guardarImgCanales" class="btn btn-primary pull-right">Guardar Imagen-->
<!--                        </button>-->
<!--                    </div>-->


                    <div class="box-header with-border">

                        <h3 class="box-title">BANNER</h3>

                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="text" class="form-control" id="bannerTitulo" name="bannerTitulo"
                                   placeholder="Escriba el título" value=" <?php echo $dataCanales["bannertitulo"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Descripción</label>
                            <input type="text" class="form-control" id="bannerDesc"
                                   placeholder="Escriba una Descripción"
                                   value=" <?php echo $dataCanales["bannerdescripcion"]; ?>">
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
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">

                        <div class="form-group">

                            <label for="usr">Título:</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                                <input type="text" min="1" class="form-control cambioInformacion" name="titulo"
                                       id="titulo" value="<?php echo $dataCanales["titulo"]; ?>">

                            </div>

                        </div>
                        <div class="form-group">

                            <label for="comment">Descripción:</label>

                            <textarea class="form-control cambioScript" rows="5" id="contactDescripcion"
                                      name="contactDescripcion">

         <?php echo $dataCanales["descripcion"]; ?>

          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarInfoCanales" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>


            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="container box">


                        <div class="table-responsive">
                            <br/>
                            <div align="right">
                                <h3 class="box-title" align="center">Sucursales</h3>
                                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal"
                                        class="btn btn-info btn-lg">Nuevo
                                </button>
                            </div>
                            <br/><br/>
                            <table id="user_data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th >Id</th>
                                    <th >Nombre</th>
                                    <th >Latitud</th>
                                    <th >Longitud</th>
                                    <th ></th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>


                </div>


            </div>
        </div>


    </section>

</div>


<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Sucursal</h4>
                </div>
                <div class="modal-body">
                    <label>Sucursal</label>
                    <input type="text" name="sucursal" id="sucursal" class="form-control"/>
                    <br/>

                    <label>Latitud</label>
                    <input type="text" name="latitud" id="latitud" class="form-control"/>
                    <br/>
                    <label>Longitud</label>
                    <input type="text" name="longitud" id="longitud" class="form-control"/>
                    <br/>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="market_id" id="market_id"/>
                    <input type="hidden" name="operation" id="operation"/>
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="vistas/js/gestorCanales.js"></script>




