<!-- =============================================== -->

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
                <div class="box box-warning ">

                    <div class="box-header with-border">
                        <h3 class="box-title">Estados</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>


                    <div class="box-body">
                        <div class="form-group col-md-4">
                            <label for="inputState">Tarifario</label>
                            <select id="inputState" class="form-control">
                                <option selected>Elegir</option>
                                <option>Activo</option>
                                <option>Desactivado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Contrato</label>
                            <select id="inputState" class="form-control">
                                <option selected>Elegir</option>
                                <option>Activo</option>
                                <option>Desactivado</option>
                            </select>
                        </div>




                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarActivo" class="btn btn-primary pull-right">Guardar
                        </button>

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