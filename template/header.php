<?
if (strpos($_SERVER['SCRIPT_URL'], 'blog')) {
    $links_blog = '../';
    $blog_active = ' active';
    $es_blog = true;
}
if (strpos($_SERVER['SCRIPT_URL'], 'news')) {
    $links_news = '../';
    $news_active = ' active';
    $es_news = true;
}
?>
<header class="">
    <div class="header py-4">
        <div class="container">
            <div class="row">

                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid justify-content-center justify-content-sm-between flex-column flex-sm-row">
                        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                        <div class="navbar-brand mb-3 mb-sm-0 me-0">
                            <div class="d-flex social gap-2 flex-wrap">
                                <?=$contenido->redes_sociales()?>
                            </div>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="bi bi-list"></i>
                        </button>
                        <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
                            <ul class="navbar-nav text-uppercase gap-3 ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link <?=$val = ($url_seccion == 'inicio') ? 'active' : '' ;?>" aria-current="page" href="<?=$arr_configuracion['url']?>index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?=$val = ($url_seccion == 'criptoversum') ? 'active' : '' ;?>" href="<?=$arr_configuracion['url']?>index.php?q=criptoversum">Criptoversum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?=$blog_active?>" href="<?=$arr_configuracion['url']?>blog">Blogs</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link <?=$news_active?>" href="<?=$arr_configuracion['url']?>news">News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?=$val = ($url_seccion == 'comunidad') ? 'active' : '' ;?>" href="#">Comunidad</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?=$val = ($url_seccion == 'podcast') ? 'active' : '' ;?>" href="<?=$arr_configuracion['url']?>index.php?q=podcast">Podcast</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <?
    if ($url_seccion == "inicio")
        include_once(URL_SERVIDOR . '/template/slide.php');
    else
        include_once(URL_SERVIDOR . '/template/titulo_principal.php');
    ?>
</header>