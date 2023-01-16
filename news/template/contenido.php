<div class="contenido text-white">
    <?
    if (file_exists(URL_SERVIDOR . "/news/template/secciones/" . strtolower($url_secciones) . ".php")) {
        include_once(URL_SERVIDOR  . "/news/template/secciones/" . strtolower($url_secciones) . ".php");
    } else {
        echo '<div class="text-center">
                <h2>P&aacute;gina no encontrada :(</h2>
                <p>Lo sentimos, esta p&aacute;gina no existe</p>
            </div>';
    }
    ?>
</div>