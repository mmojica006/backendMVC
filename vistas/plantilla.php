<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tienda Online | Panel de Control</title>
    <link rel="icon" href="vistas/img/plantilla/icono.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">

    <!-- Morris chart -->
    <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">

    <!-- bootstrap slider -->
    <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/slider.css">

<!--     Google Font-->
    <link rel="stylesheet"        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- CSS PERSONALIZADOS -->
    <link rel="stylesheet" href="vistas/css/plantilla.css">
    <link rel="stylesheet" href="vistas/css/slide.css">
    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- iCheck -->
    <script src="vistas/plugins/iCheck/icheck.min.js"></script>
    <!-- Morris.js charts -->
    <script src="vistas/bower_components/raphael/raphael.min.js"></script>
    <script src="vistas/bower_components/morris.js/morris.min.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- jvectormap -->
    <script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- ChartJS -->
    <script src="vistas/bower_components/Chart.js/Chart.js"></script>
    <!-- SweetAlert 2 https://sweetalert2.github.io/-->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- bootstrap color picker https://farbelous.github.io/bootstrap-colorpicker/v2/-->
    <script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- Bootstrap slider http://seiyria.com/bootstrap-slider/-->
    <script src="vistas/plugins/bootstrap-slider/bootstrap-slider.js"></script>
    <!-- DataTables -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- CK Editor -->
    <script src="vistas/bower_components/ckeditor/ckeditor.js"></script>

    <!-- JQUERY VALIDATOR -->
    <script src="vistas/plugins/jquery.validate.js"></script>
</head>

<body class="hold-transition skin-blue  sidebar-mini login-page">

<?php
session_start();
if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok") {
    echo '<div class="wrapper">';

    /*=============================================
     CABEZOTE
     =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
     LATERAL
     =============================================*/

    include "modulos/lateral.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    //print_r($_GET);
    if (isset($_GET["ruta"])) {

        if (
            $_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "sitio" ||
            $_GET["ruta"] == "contacto" ||
            $_GET["ruta"] == "slide" ||
            $_GET["ruta"] == "categorias" ||
            $_GET["ruta"] == "subcategorias" ||
            $_GET["ruta"] == "productos" ||
            $_GET["ruta"] == "nosotros" ||
            $_GET["ruta"] == "canales" ||
            $_GET["ruta"] == "tipPreguntas" ||
            $_GET["ruta"] == "tarifarioContrato" ||
            $_GET["ruta"] == "mensajes" ||
            $_GET["ruta"] == "perfiles" ||
            $_GET["ruta"] == "perfil" ||
            $_GET["ruta"] == "salir"
        ) {


            include "modulos/" . $_GET["ruta"] . ".php";

        }

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";


    echo '</div>';

} else {

    include "modulos/login.php";

}


?>
<!-- JS PERSONALIZADO -->


<script src="vistas/js/sitio.js"></script>
<script src="vistas/js/gestorSitio.js"></script>
<script src="vistas/js/gestorSlide.js"></script>


</body>
</html>