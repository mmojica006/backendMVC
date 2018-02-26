<?php
$data = ControladorTipPreguntas::ctrSeleccionarTipPreguntas();


?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestor
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor comercio</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tips Financieros</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">

                            <i class="fa fa-minus"></i>

                        </button>


                    </div>

                </div>

                <div class="box-body">
                    <form id="formBannerTips">
                        <form id="formCrediPyme">
                            <div class="form-group">

                            <textarea  class="required"  type="text" class="form-control" id="tipsFinan" name="tipsFinan" rows="5">
                                 <?php echo $data["tipsFinanc"]; ?>
                            </textarea>
                            </div>

                        </form>

                    </form>
                </div>
                <div class="box-footer">

                    <button type="button" id="guardarTips" class="btn btn-primary pull-right">Guardar</button>

                </div>


            </div>




        </div>

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Preguntas Frecuentes</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">

                            <i class="fa fa-minus"></i>

                        </button>


                    </div>

                </div>

                <div class="box-body">
                    <form id="formBannerTips">
                        <form id="formCrediPyme">
                            <div class="form-group">

                            <textarea  class="required"  type="text" class="form-control" id="preguntas" name="preguntas" rows="5">
                                 <?php echo $data["preguntas"]; ?>
                            </textarea>
                            </div>

                        </form>

                    </form>
                </div>
                <div class="box-footer">

                    <button type="button" id="guardarPreguntas" class="btn btn-primary pull-right">Guardar</button>

                </div>


            </div>

        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="vistas/js/gestorTipsPreguntas.js"></script>
