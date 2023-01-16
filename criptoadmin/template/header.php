<?
include_once(URL_SERVIDOR . '/class/generales.php');
$generales = new generales();

include_once(URL_SERVIDOR . '/class/admin.php');
$admin = new admin();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Dashboard - CriptoVersum</title>

    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="./libs/DataTables/datatables.min.css" />

    <link rel="stylesheet" href="./css/user.css">

    <?
    $url_seccion =  strtolower($_GET["q"]);
    if (empty($_GET["q"]))
        $url_seccion = "inicio";
    ?>
</head>

<body>
    <header>
        <div class="header bg-dark">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-10">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid justify-content-center justify-content-sm-between flex-column flex-sm-row">
                                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                                <div class="navbar-brand">
                                    <a href="../" target="_blank"><img src="../img/logo-int.png" alt="Admin Criptoversum" width="70px"></a>
                                </div>
                                <button class="navbar-toggler text-white border-white mt-4 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="bi bi-list"></i>
                                </button>
                                <div class="collapse navbar-collapse mt-lg-0 text-center" id="navbarNav">
                                    <ul class="navbar-nav text-uppercase gap-0 gap-lg-3 me-auto">
                                        <li class="nav-item">
                                            <a class="nav-link <?= $val = ($url_seccion == 'inicio') ? 'active' : ''; ?>" aria-current="page" href="index.php">Inicio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $val = ($url_seccion == 'blog' || $url_seccion == 'blog_nuevo' || $url_seccion == 'blog_edita') ? 'active' : ''; ?>" href="index.php?q=blog">Blog</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $val = ($url_seccion == 'tags' || $url_seccion == 'tags_nuevo' || $url_seccion == 'tags_edita') ? 'active' : ''; ?>" href="index.php?q=tags">Etiquetas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $val = ($url_seccion == 'categorias') ? 'active' : ''; ?>" href="index.php?q=categorias">Categor&iacute;as</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $val = ($url_seccion == 'news' || $url_seccion == 'news_nuevo' || $url_seccion == 'news_edita') ? 'active' : ''; ?>" href="index.php?q=news">News</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $val = ($url_seccion == 'podcast' || $url_seccion == 'podcast_nuevo' || $url_seccion == 'podcast_edita') ? 'active' : ''; ?>" href="index.php?q=podcast">Podcast</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $val = ($url_seccion == 'configuracion') ? 'active' : ''; ?>" href="index.php?q=configuracion">Configuraci&oacute;n</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-2 text-center">
                        <a href="logout.php" class="text-white"><i class="bi bi-box-arrow-left"></i> Cerrar sesi&oacute;n</a>
                    </div>
                </div>
            </div>
        </div>
    </header>