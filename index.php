<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/nosotros.controlador.php";
require_once "controladores/contacto.controlador.php";
require_once "controladores/mensajes.controlador.php";
require_once "controladores/perfiles.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/slide.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/canales.controlador.php";
require_once "controladores/sitio.controlador.php";
require_once "controladores/contacto.controlador.php";
require_once "controladores/tipPreguntas.controlador.php";



require_once "modelos/administradores.modelo.php";
require_once "modelos/nosotros.modelo.php";
require_once "modelos/contacto.modelo.php";
require_once "modelos/mensajes.modelo.php";
require_once "modelos/perfiles.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/slide.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/canales.modelo.php";
require_once "modelos/sitio.modelo.php";
require_once "modelos/contacto.modelo.php";
require_once "modelos/tipPreguntas.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla->plantilla();
