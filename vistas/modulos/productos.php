<?php
$dataNosotros = ControladorNosotros::ctrSeleccionarNosotros();


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

                    <div class="box-header with-border">
                        <h3 class="box-title">IMAGEN FONDO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">

                        <div class="form-group">

                            <label>Cambiar Fondo</label>

                            <p class="pull-right">

                                <img src="<?php echo $dataNosotros["imgFondo"]; ?>"
                                     class="img-thumbnail previsualizarImgNosotros" width="200px">

                            </p>

                            <input type="file" id="subirImgNosotros">

                            <p class="help-block">Tamaño recomendado 1200px * 625px</p>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarImgNosotros" class="btn btn-primary pull-right">Guardar
                            Imagen
                        </button>
                    </div>


                    <div class="box-header with-border">

                        <h3 class="box-title">BANNER</h3>

                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Descripción</label>
                            <input type="text" class="form-control" id="bannerDesc"
                                   placeholder="Escriba una Descripción"
                                   value=" <?php echo $dataNosotros["bannerdescripcion"]; ?>">
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarDataBanner" class="btn btn-primary pull-right">Guardar</button>

                    </div>


                </div>

                <div class="box box-default ">

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

                            <textarea type="text" class="form-control" id="turbo" name="turbo">
                                 <?php echo $dataNosotros["mision"]; ?>
                            </textarea>
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarTurbo" class="btn btn-primary pull-right">Guardar
                        </button>

                    </div>


                </div>

                <div class="box box-warning ">

                    <div class="box-header with-border">
                        <h3 class="box-title">DESARROLLO EMPRESARIAL</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>


                    <div class="box-body">
                        <div class="form-group">

                            <textarea type="text" class="form-control" id="empresarial" name="empresarial">
                                 <?php echo $dataNosotros["mision"]; ?>
                            </textarea>
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarEmpresa" class="btn btn-primary pull-right">Guardar
                        </button>

                    </div>


                </div>


            </div>


            <div class="col-md-6">
                <!-- BLOQUE 2 -->


                <div class="box box-danger ">

                    <div class="box-header with-border">
                        <h3 class="box-title">MICROCREDITO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">


                        <div class="form-group">

                            <textarea class="form-control cambioScript" rows="5" id="microcredito" name="microcredito">
                                  <?php echo $dataNosotros["descripcion"]; ?>
                          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarMicroCredito" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>

                <div class="box box-success ">

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



                            <textarea class="form-control cambioScript" rows="5" id="microturbo" name="microturbo">

         <?php echo $dataNosotros["descripcion"]; ?>

          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarMicroTurbo" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>

                <div class="box box-info ">

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



                            <textarea class="form-control cambioScript" rows="5" id="activoProductivo"
                                      name="activoProductivo">

         <?php echo $dataNosotros["descripcion"]; ?>

          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarInfoActivo" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>


            </div>

        </div>


    </section>

</div>


