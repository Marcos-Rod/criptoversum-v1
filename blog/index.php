<?
session_start();

include_once('../configuracion.php');

include_once(URL_SERVIDOR . '/class/generales.php');
$generales = new generales;

include_once(URL_SERVIDOR . '/class/blog.php');
$blog = new blog;

include_once(URL_SERVIDOR . '/class/contenido.php');
$contenido = new contenido;
$arr_configuracion = $contenido->configuracion_detalle();

$arr_post = $blog->lista_post_id($_GET['post']);

$url_secciones = strtolower($_GET["q"]);
if (empty($_GET["q"])) {
    $url_secciones = "blog";
}
$url_post = strtolower($_GET["post"]);

$keywords = $arr_configuracion['keywords'];

if ($arr_post != "") {
    $keywords = $arr_post['keywords'] . $arr_configuracion['keywords'];
}

$title = (!empty($arr_post['titulo'])) ? $arr_post['titulo'] : 'Blog';
$description = (!empty($arr_post['extracto'])) ? $arr_post['extracto'] : $arr_configuracion['descripcion'];

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - <?=$arr_configuracion['proyecto']?></title>

    <meta name="author" content="CriptoVersum">
    <meta name="title" content="<?= $arr_post['titulo'] ?> - <?=$arr_configuracion['proyecto']?>">
    <meta name="DC.Title" content="<?= $arr_post['titulo'] ?> - <?=$arr_configuracion['proyecto']?>">
    <meta http-equiv="title" content="<?= $arr_post['titulo'] ?> - <?=$arr_configuracion['proyecto']?>">
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

    <meta property="og:title" content="<?= $arr_post['titulo'] ?>" />
    <meta property="og:description" content="<?= $description ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="<?= $arr_post['titulo'] ?>" />
    <meta property="og:image" content="<?= $arr_configuracion['url'] . 'userfiles/images/'.$arr_post['destacada']?>" />
    <meta property="og:url" content="<?=$arr_configuracion['url']?>index.php?post=<?=$arr_post['slug']?>" />

    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../libs/aos-master/dist/aos.css">
    <link rel="stylesheet" href="../libs/animate/css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./css/blog.css">

    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>

<body>
    <?
    if (!include_once(URL_SERVIDOR . "/template/header.php"))
        echo "<strong>Error:</strong> No se encontro el archivo de la cabecera";

    if (!isset($_GET['post'])) {
        if (!include_once(URL_SERVIDOR . "/blog/template/contenido.php"))
            echo "<strong>Error:</strong> No se encontro el archivo con el contenido";
    } else {
        include_once(URL_SERVIDOR . "/blog/template/post.php");
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