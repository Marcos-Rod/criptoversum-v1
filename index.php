<?
session_start();

include_once(dirname(__FILE__) . "/configuracion.php");

include_once(URL_SERVIDOR . '/class/generales.php');
$generales = new generales;

include_once(URL_SERVIDOR . '/class/contenido.php');
$contenido = new contenido;
$arr_configuracion = $contenido->configuracion_detalle();

$url_seccion = strtolower($_GET["q"]);
if (empty($_GET["q"])) {
    $url_seccion = "inicio";
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=ucfirst($url_seccion)?> - <?=$arr_configuracion['proyecto']?></title>

    <meta name="author" content="Criptoversum">
    <meta name="title" content="<?=ucfirst($url_seccion)?> - Criptoversum">
    <meta name="DC.Title" content="<?=ucfirst($url_seccion)?> - Criptoversum">
    <meta http-equiv="title" content="<?=ucfirst($url_seccion)?> - Criptoversum">
    <meta name="rating" content="General" />
    <meta name="abstract" content="<?=$arr_configuracion['descripcion']?>" />
    <meta name="description" content="<?=$arr_configuracion['descripcion']?>">
    <meta http-equiv="description" content="<?=$arr_configuracion['descripcion']?>">
    <meta http-equiv="DC.Description" content="<?=$arr_configuracion['descripcion']?>">
    <meta name="keywords" content="<?=$arr_configuracion['keywords']?>">
    <meta http-equiv="keywords" content="<?=$arr_configuracion['keywords']?>">
    <meta name="Revisit" content="30">
    <meta name="REVISIT-AFTER" content="30">
    <meta http-equiv="Content-Language" content="es" />

    <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./libs/aos-master/dist/aos.css">
    <link rel="stylesheet" href="./libs/animate/css/animate.css">
    <link rel="stylesheet" href="./css/style.css">

    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
</head>

<body>
    <?
    if (!include_once(URL_SERVIDOR . "/template/header.php"))
        echo "<strong>Error:</strong> No se encontro el archivo de la cabecera";

    if (!include_once(URL_SERVIDOR . "/template/contenido.php"))
        echo "<strong>Error:</strong> No se encontro el archivo con el contenido";

    if (!include_once(URL_SERVIDOR . "/template/footer.php"))
        echo "<strong>Error:</strong> No se encontro el archivo del footer";
    ?>

    <a href="https://wa.me/" target="_blank" class="btn-whatsapp"><i class="bi bi-whatsapp"></i></a>
    <a href="http://m.me/Criptoversum" target="_blank" class="btn-messenger"><i class="bi bi-messenger"></i></a>


    <script src="./libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./libs/jquery-validate/dist/jquery.validate.js"></script>
    <script src="./libs/jquery-validate/src/additional/phoneUS.js"></script>
    <script src="./libs/aos-master/dist/aos.js"></script>
    <script type="text/javascript" src="./libs/animate/js/animate.js"></script>
    <script src="./js/user.js"></script>

    <script>
        AOS.init({
            easing: 'ease-in-out-sine',
            mirror: true,
            offset: 30
        });
    </script>
</body>

</html>