<?php
$dataNosotros = ControladorNosotros::ctrSeleccionarNosotros();


?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor Nosotros</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor Nosotros</li>
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
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="text" class="form-control" id="bannerTitulo" name="bannerTitulo"
                                   placeholder="Escriba el título"
                                   value=" <?php echo $dataNosotros["bannertitulo"]; ?>">
                        </div>
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

                <div class="box box-warning ">

                    <div class="box-header with-border">
                        <h3 class="box-title">INFO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">

                                <i class="fa fa-minus"></i>

                            </button>


                        </div>

                    </div>


                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Misión</label>
                            <textarea type="text" class="form-control" id="mision" name="mision"
                                      placeholder="Escriba la misión">
                                 <?php echo $dataNosotros["mision"]; ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Visión</label>
                            <textarea type="text" class="form-control" id="vision" name="vision"
                                      placeholder="Escriba la visión"  >
                            <?php echo $dataNosotros["vision"]; ?>
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Valores</label>
                            <textarea type="text" class="form-control" id="valores" name="valores"
                                      placeholder="Escriba los valores">
                                <?php echo $dataNosotros["valores"]; ?>
                            </textarea>
                        </div>


                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarDataBanner" class="btn btn-primary pull-right">Guardar</button>

                    </div>


                </div>
            </div>


            <div class="col-md-6">
                <!-- BLOQUE 2 -->


                <div class="box box-danger ">

                    <div class="box-header with-border">

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
                                       id="titulo" value="<?php echo $dataNosotros["titulo"]; ?>">

                            </div>

                        </div>
                        <div class="form-group">

                            <label for="comment">Descripción:</label>

                            <textarea class="form-control cambioScript" rows="5" id="descripcion" name="descripcion">

         <?php echo $dataNosotros["descripcion"]; ?>

          </textarea>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" id="guardarInfoContacto" class="btn btn-primary pull-right">Guardar
                        </button>
                    </div>


                </div>


            </div>

        </div>


    </section>

</div>


