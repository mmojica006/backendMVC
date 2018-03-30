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
                    <div class="box-header with-border">

                        <h3 class="box-title">INICIO</h3>

                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="text" class="form-control" id="bannerTitulo" name="bannerTitulo"
                                   placeholder="Escriba el título" value=" <?php echo $dataProductos["titulo"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Descripción</label>
                            <input type="text" class="form-control" id="bannerDesc"
                                   placeholder="Escriba una Descripción"
                                   value=" <?php echo $dataProductos["descripcion"]; ?>">
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarDataBanner" class="btn btn-primary pull-right">Guardar</button>

                    </div>


                </div>

                <div class="box box-default ">

                    <div class="box-header with-border">
                        <h3 class="box-title">Capital de Trabajo</h3>
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

                            <textarea  class="required"  type="text" class="form-control" id="capitalTrabajo" name="capitalTrabajo">
                                 <?php echo $dataProductos["capitalTrabajo"]; ?>
                            </textarea>
                            </div>

                        </form>
                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarCapitalTrabajo" class="btn btn-primary pull-right">Guardar
                        </button>

                    </div>


                </div>

                <div class="box box-warning ">

                    <div class="box-header with-border">
                        <h3 class="box-title">Activo Productivo</h3>
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
                                 <?php echo $dataProductos["activoProductivo"]; ?>
                            </textarea>
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarActivoProductivo" name="guardarActivoProductivo" class="btn btn-primary pull-right">Guardar
                        </button>

                    </div>


                </div>




            </div>


            <div class="col-md-6">
                <!-- BLOQUE 2 -->


                <div class="box box-danger ">

                    <div class="box-header with-border">
                        <h3 class="box-title">Mejora de Negocio</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">


                        <div class="form-group">

                            <textarea class="form-control cambioScript" rows="5" id="mejoraNegocio" name="mejoraNegocio">
                                  <?php echo $dataProductos["mejoraNegocio"]; ?>
                          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarMejoraNegocio" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>

                <div class="box box-success ">

                    <div class="box-header with-border">
                        <h3 class="box-title">CrediActivos</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">


                        <div class="form-group">



                            <textarea class="form-control cambioScript" rows="5" id="crediActivo" name="crediActivo">

                                 <?php echo $dataProductos["crediActivos"]; ?>

                                  </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarCrediActivos" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>




            </div>

        </div>


    </section>

</div>

<script src="vistas/js/gestorProductos.js"></script>


