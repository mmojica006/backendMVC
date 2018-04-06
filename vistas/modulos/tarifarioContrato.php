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

                <div class="box box-success ">

                    <div class="box-header with-border">
                        <h3 class="box-title">CONTRATO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>


                    <div class="box-body">
                        <div class="form-group">

                            <label for="ActiveContrato">Activo</label>
                            <input id="ActiveContrato" type="radio" name="ActiveContrato" value="1"<?php if ($dataTarCont['contratoEstado'] == 1): ?> checked = "checked"<?php endif; ?> />

                            <label for="ActiveContrato">Inactivo</label>
                            <input id="ActiveContrato" type="radio" name="ActiveContrato" value="0"<?php if ($dataTarCont['contratoEstado'] != 1): ?> checked = "checked"<?php endif; ?> />
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarEstadoContrato" class="btn btn-primary pull-right">Guardar</button>

                    </div>
                    <div class="box-body">

                        <div class="form-group">

                            <label>Subir Archivo</label>

                            <p class="pull-right">

                                <img src="vistas/img/plantilla/pdf-icon.png"
                                     class=" previsualizarImgPdf" width="50px" <?php  if ($dataTarCont['contratoDesc']!=''): ?>style="display: block" <?php endif;?>>

                            </p>

                            <input type="file" id="subirPdf">



                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarPdf" name="guardarPdf" class="btn btn-primary pull-right">Guardar Archivo
                        </button>
                    </div>


                </div>

                <div class="box box-success ">

                    <div class="box-header with-border">
                        <h3 class="box-title">EEFF</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>


                    <div class="box-body">
                        <div class="form-group">

                            <label for="ActiveEEFF">Activo</label>
                            <input id="ActiveEEFF" type="radio" name="ActiveEEFF" value="1"<?php if ($dataTarCont['eeffEstado'] == 1): ?> checked = "checked"<?php endif; ?> />

                            <label for="ActiveEEFF">Inactivo</label>
                            <input id="ActiveEEFF" type="radio" name="ActiveEEFF" value="0"<?php if ($dataTarCont['eeffEstado'] != 1): ?> checked = "checked"<?php endif; ?> />
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarEstadoEEFF" class="btn btn-primary pull-right">Guardar</button>

                    </div>
                    <div class="box-body">

                        <div class="form-group">

                            <label>Subir Archivo</label>



                            <input type="file" id="archivosEEFF" name="archivosEEFF"  multiple=true class="file-loading">



                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarEEFF" name="guardarEEFF" class="btn btn-primary pull-right">Guardar Archivo
                        </button>
                    </div>


                </div>

                <div class="box box-primary">
                    <div class="container box">


                        <div class="table-responsive">
                            <br/>
                            <div align="right">
                                <h3 class="box-title" align="center">Estados Financieros</h3>

                            </div>
                            <br/><br/>
                            <table id="user_dataEEFF" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th >Id</th>
                                    <th >Nombre</th>
                                    <th ></th>


                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>


                </div>

            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
$directory = "../vistas/files/pdfFinancieros/";
$images = glob($directory . "*.*");
?>

<script src="vistas/js/gestorTarifario.js"></script>

