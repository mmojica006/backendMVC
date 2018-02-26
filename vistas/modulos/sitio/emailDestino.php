<?php

$plantilla = ControladorContacto::ctrSeleccionarContacto();


?>

<div class="box box-success">

    <div class="box-header with-border">

        <h3 class="box-title">CUENTA DESTINO</h3>

        <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

                <i class="fa fa-minus"></i>

            </button>

        </div>

    </div>

    <div class="box-body">


        <div class="form-group">

            <label for="comment">Cuenta de correo destino de  mensajes:</label>

            <input class="form-control "  id="idEmailDestino" name ="idEmailDestino" value="<?php echo $plantilla["email"]; ?>" required>




        </div>

    </div>

    <div class="box-footer">

        <button type="button" id="guardarEmailContacto" class="btn btn-primary pull-right">Guardar</button>

    </div>

</div>