<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor perfiles
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor comercio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="container box">


                            <div class="table-responsive">
                                <br/>
                                <div align="right">
                                    <h3 class="box-title" align="center">Usuarios</h3>
                                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal"
                                            class="btn btn-info btn-lg">Nuevo
                                    </button>
                                </div>
                                <br/><br/>
                                <table id="user_data" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th >Id</th>
                                        <th >Fotos</th>
                                        <th >Usuario</th>
                                        <th >Correo</th>
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
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Nuevo Usuario</h4>
                </div>
                <div class="modal-body">
                    <label>Nombre</label>
                    <input type="text" name="usuario" id="usuario" class="form-control"/>
                    <br/>

                    <label>Contraseña</label>
                    <input type="text" name="password" id="password" class="form-control"/>
                    <br/>
                    <label>Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control"/>
                    <br/>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="market_id" id="market_id"/>
                    <input type="hidden" name="operation" id="operation"/>
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Agregar"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="vistas/js/gestorPerfiles.js"></script>