<?php
$dataTarCont = ControladorTarifarioContrato::ctrSeleccionarTarCont();

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestor Tarifario | Contrato
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor tarifario y contrato</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6">

                <div class="box box-primary ">

                    <div class="box-header with-border">
                        <h3 class="box-title">TARIFARIO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>

                    <div class="box-body">

                        <div class="form-group">

                            <label for="Active">Activo</label>
                            <input id="Active" type="radio" name="Active" value="1"<?php if ($dataTarCont['tarifarioEstado'] == 1): ?> checked = "checked"<?php endif; ?> />

                            <label for="Active">Inactivo</label>
                            <input id="Active" type="radio" name="Active" value="0"<?php if ($dataTarCont['tarifarioEstado'] != 1): ?> checked = "checked"<?php endif; ?> />
                        </div>



                        <div class="form-group">

                            <label for="comment">Descripción:</label>

                            <textarea class="form-control cambioScript" rows="5" id="tarifarioDesc" name="tarifarioDesc">

                                     <?php echo $dataTarCont["tarifario"]; ?>

          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarTarCont" class="btn btn-primary pull-right">Guardar</button>
                    </div>





                </div>
            </div>

            <div class="col-md-6">

                <div class="box box-warning ">

                    <div class="box-header with-border">
                        <h3 class="box-title">Descripción del tarifario</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>


                    <div class="box-body">
                        <div class="form-group">

                            <textarea type="text" class="form-control" id="activoProductivo" name="activoProductivo" rows="5">
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
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="vistas/js/gestorTarifario.js"></script>