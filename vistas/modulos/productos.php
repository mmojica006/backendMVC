<?php
$dataProductos = ControladorProductos::ctrSeleccionarProductos();


?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor Productos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor Producto</li>
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

<!--                    <div class="box-body">-->
<!---->
<!--                        <div class="form-group">-->
<!---->
<!--                            <label>Cambiar Fondo</label>-->
<!---->
<!--                            <p class="pull-right">-->
<!---->
<!--                                <img src="--><?php //echo $dataProductos["imgFondo"]; ?><!--"-->
<!--                                     class="img-thumbnail previsualizarImgProducto" width="200px">-->
<!---->
<!--                            </p>-->
<!---->
<!--                            <input type="file" id="subirImgProducto">-->
<!---->
<!--                            <p class="help-block">Tamaño recomendado 1200px * 625px</p>-->
<!---->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    <div class="box-footer">-->
<!--                        <button type="button" id="guardarImgProducto" class="btn btn-primary pull-right">Guardar-->
<!--                            Imagen-->
<!--                        </button>-->
<!--                    </div>-->


                    <div class="box-header with-border">

                        <h3 class="box-title">BANNER</h3>

                    </div>


                    <div class="box-body">
                        <form id="formBannerInfo">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Titulo</label>
                                <input required type="text" class="form-control" id="bannerTitulo" name="bannerTitulo"
                                       placeholder="Escriba el título"
                                       value=" <?php echo $dataProductos["bannertitulo"]; ?> ">
                            </div>

                            <div class="form-group">
                                <label>Descripción</label>
                                <input required type="text" class="form-control" id="bannerDesc" name="bannerDesc"
                                       placeholder="Escriba una Descripción"
                                       value=" <?php echo $dataProductos["bannerdescripcion"]; ?>">
                            </div>

                        </form>
                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarDataBanner" class="btn btn-primary pull-right">Guardar</button>

                    </div>


                </div>

                <div class="box box-default ">

                    <div class="box-header with-border">
                        <h3 class="box-title">CREDIPYME</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>


                    <div class="box-body">

                        <form id="formCrediPyme">
                            <div class="form-group">

                            <textarea  class="required"  type="text" class="form-control" id="credipyme" name="credipyme">
                                 <?php echo $dataProductos["crediPyme"]; ?>
                            </textarea>
                            </div>

                        </form>
                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarCrediPyme" class="btn btn-primary pull-right">Guardar
                        </button>

                    </div>


                </div>

                <div class="box box-warning ">

                    <div class="box-header with-border">
                        <h3 class="box-title">CREDINEGOCIOS</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>


                    <div class="box-body">
                        <div class="form-group">

                            <textarea type="text" class="form-control" id="crediNegocio" name="crediNegocio">
                                 <?php echo $dataProductos["crediNegocios"]; ?>
                            </textarea>
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarCrediNegocio" class="btn btn-primary pull-right">Guardar
                        </button>

                    </div>


                </div>

                <div class="box box-warning ">

                    <div class="box-header with-border">
                        <h3 class="box-title">ACTIVO PRODUCTIVO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>


                    <div class="box-body">
                        <div class="form-group">

                            <textarea type="text" class="form-control" id="activoProductivo" name="activoProductivo">
                                 <?php echo $dataProductos["productivo"]; ?>
                            </textarea>
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarActivo" class="btn btn-primary pull-right">Guardar
                        </button>

                    </div>


                </div>


            </div>


            <div class="col-md-6">
                <!-- BLOQUE 2 -->


                <div class="box box-danger ">

                    <div class="box-header with-border">
                        <h3 class="box-title">MICROTURBO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">


                        <div class="form-group">

                            <textarea class="form-control cambioScript" rows="5" id="microTurbo" name="microTurbo">
                                  <?php echo $dataProductos["microturbo"]; ?>
                          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarMicroTurbo" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>

                <div class="box box-success ">

                    <div class="box-header with-border">
                        <h3 class="box-title">TURBO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">


                        <div class="form-group">



                            <textarea class="form-control cambioScript" rows="5" id="turbo" name="turbo">

         <?php echo $dataProductos["turbo"]; ?>

          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarTurbo" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>

                <div class="box box-info ">

                    <div class="box-header with-border">
                        <h3 class="box-title">MEGA TURBO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">


                        <div class="form-group">



                            <textarea class="form-control cambioScript" rows="5" id="activoMegaTurbo"
                                      name="activoMegaTurbo">

         <?php echo $dataProductos["megaturbo"]; ?>

          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarMegaTurbo" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>


            </div>

        </div>


    </section>

</div>

<script src="vistas/js/gestorProductos.js"></script>


