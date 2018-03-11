<?php
/**
 * Created by PhpStorm.
 * User: Mosses
 * Date: 13/02/2018
 * Time: 22:46
 */


require_once "../controladores/nosotros.controlador.php";
require_once "../modelos/nosotros.modelo.php";
require_once "../modelos/constante.modelo.php";

class AjaxNosotros
{

    public $imgNosotros;

    public function ajaxCambiarImgNosotros()
    {
        $item = "imgFondo";
        $valor = $this->imgNosotros;
        $respuesta = ControladorNosotros::ctrActualizarImgNosotros($item, $valor);
        echo json_encode($respuesta);

    }

    public $bannerTitulo;
    public $bannerDesc;

    public function ajaxCambiarDataBanner()
    {

        $datos = array("bannerTitulo" => $this->bannerTitulo, "bannerDesc" => $this->bannerDesc);
        $respuesta = ControladorNosotros::ctrActualizarBannerForm($datos);
        echo json_encode($respuesta);
    }

    public $titulo;
    public $descripcion;

    public function ajaxCambiarInfoInfo1()
    {

        $datos = array("titulo" => $this->titulo, "descripcion" => $this->descripcion);

        $respuesta = ControladorNosotros::ctrActualizarInfo1($datos);
        echo json_encode($respuesta);


    }

    public $mision;
    public $vision;
    public $valores;

    public function ajaxCambiarInfoInfo2()
    {
       // print_r($this->mision);
        $objClass = new AjaxNosotros();

        $valMision = str_replace('src="',  'src="'.substr(URL_SITE,0,-1) , $this->mision);
        $valVision = str_replace('src="',  'src="'.substr(URL_SITE,0,-1) , $this->vision);
        $valValores = str_replace('src="',  'src="'.substr(URL_SITE,0,-1) , $this->valores);

        //print_r($valVision);
        //exit;

        $datos = array("mision" => $this->mision, "vision" => $this->vision, "valores" => $this->valores);
        $respuesta = ControladorNosotros::ctrActualizarInfo2($datos);
        echo json_encode($respuesta);


    }
    function validateURL($url)
    {
        return (parse_url($url, PHP_URL_SCHEME)) ? $url : 'http://' . $url;
    }
    function validate_url($url) {
        $path = parse_url($url, PHP_URL_PATH);
        $encoded_path = array_map('urlencode', explode('/', $path));
        $url = str_replace($path, implode('/', $encoded_path), $url);

        return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
    }


    function extraerSRC($cadena) {
        preg_match('@src="([^"]+)"@', $cadena, $array);
        $src = array_pop($array);
        return $src;
    }


}


if (isset($_FILES["imgNosotros"])) {
    $obj = new AjaxNosotros();
    $obj->imgNosotros = $_FILES["imgNosotros"];
    $obj->ajaxCambiarImgNosotros();


}

if (isset($_POST["bannerTitulo"])) {
    $objDataBanner = new AjaxNosotros();
    $objDataBanner->bannerTitulo = $_POST["bannerTitulo"];
    $objDataBanner->bannerDesc = $_POST["bannerDesc"];
    $objDataBanner->ajaxCambiarDataBanner();

}


if (isset($_POST["titulo"])) {
    $objInfo1 = new AjaxNosotros();
    $objInfo1->titulo = $_POST["titulo"];
    $objInfo1->descripcion = $_POST["descripcion"];
    $objInfo1->ajaxCambiarInfoInfo1();

}


if (isset($_POST["mision"])) {
    $objInfo2 = new AjaxNosotros();
    $objInfo2->mision = $_POST["mision"];
    $objInfo2->vision = $_POST["vision"];
    $objInfo2->valores = $_POST["valores"];
    $objInfo2->ajaxCambiarInfoInfo2();

}

if (isset($_POST["action"]) && ($_POST["action"] == "RutaServidor")) {
    print_r("entro");

}

