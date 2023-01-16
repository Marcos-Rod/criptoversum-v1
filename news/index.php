<?
session_start();

include_once('../configuracion.php');

include_once(URL_SERVIDOR . '/class/generales.php');
$generales = new generales;

include_once(URL_SERVIDOR . '/class/contenido.php');
$contenido = new contenido;
$arr_configuracion = $contenido->configuracion_detalle();

include_once(URL_SERVIDOR . '/class/news.php');
$new = new news;
$arr_news = $new->lista_news_id($_GET['news']);

$url_new = strtolower($_GET["news"]);

$url_secciones = strtolower($_GET["q"]);
if (empty($_GET["q"])) {
    $url_secciones = "news";
}

$keywords = $arr_configuracion['keywords'];

if ($arr_news != "") {
    $keywords .= ' ' . $arr_news['keywords'];
}
$title = (!empty($arr_news['titulo'])) ? $arr_news['titulo'] : 'News';
$description = (!empty($arr_news['extracto'])) ? $arr_news['extracto'] : $arr_configuracion['descripcion'];
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - <?=$arr_configuracion['proyecto']?></title>

    <meta name="author" content="CriptoVersum">
    <meta name="title" content="<?= $title ?> - Criptoversum">
    <meta name="DC.Title" content="<?= $title ?> - Criptoversum">
    <meta http-equiv="title" content="<?= $title ?> - Criptoversum">
    <meta name="rating" content="General" />
    <meta name="abstract" content="<?= $description ?>" />
    <meta name="description" content="<?= $description ?>">
    <meta http-equiv="description" content="<?= $description ?>">
    <meta http-equiv="DC.Description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta http-equiv="keywords" content="<?= $keywords ?>">
    <meta name="Revisit" content="30">
    <meta name="REVISIT-AFTER" content="30">
    <meta http-equiv="Content-Language" content="es" />

    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $description ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="<?= $title ?>" />
    <meta property="og:image" content="<?= $arr_configuracion['url'] . 'userfiles/images/'.$arr_news['destacada']?>" />
    <meta property="og:url" content="<?= $_SERVER['SCRIPT_URI'] ?>?post=<?= $arr_news['slug'] ?>" />

    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../libs/aos-master/dist/aos.css">
    <link rel="stylesheet" href="../libs/animate/css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./css/news.css">

    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>

<body>
    <?
    if (!include_once(URL_SERVIDOR . "/template/header.php"))
        echo "<strong>Error:</strong> No se encontro el archivo de la cabecera";

    if (!isset($_GET['news'])) {
        if (!include_once(URL_SERVIDOR . "/news/template/contenido.php"))
            echo "<strong>Error:</strong> No se encontro el archivo con el contenido";
    } else {
        include_once(URL_SERVIDOR . "/news/template/news.php");
    }

    if (!include_once(URL_SERVIDOR . "/template/footer.php"))
        echo "<strong>Error:</strong> No se encontro el archivo del footer";
    ?>


    <script src="../libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="../libs/jquery-validate/dist/jquery.validate.js"></script>
    <script src="../libs/jquery-validate/src/additional/phoneUS.js"></script>
    <script src="../libs/aos-master/dist/aos.js"></script>
    <script type="text/javascript" src="../libs/animate/js/animate.js"></script>
    <script src="../js/user.js"></script>

    <script>
        AOS.init({
            easing: 'ease-in-out-sine',
            mirror: true,
            offset: 30
        });
    </script>
</body>

</html>