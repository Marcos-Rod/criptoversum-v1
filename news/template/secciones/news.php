<pre>
<?
$arr_news = $new->lista_news();
$arr_categorias_detalle = $new->lista_categorias_news();
$arr_categorias = $new->lista_categorias();
/* print_r($arr_categorias_detalle); */
?>
</pre>
<div class="popular  overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column flex-xl-row justify-content-between gap-4 gap-xl-3 align-items-center">
                <div style="min-width: fit-content;">
                    <h2 class="text-center text-xl-start">Popular News</h2>
                </div>
                <div class="news-categories flex-fill col-12 pb-2 mb-3">
                    <ul class="d-flex flex-column flex-lg-row gap-2 gap-lg-4 float-xl-end text-center m-0 flex-wrap">
                        <?
                        foreach ($arr_categorias as $item) {
                            echo '<li><a href="index.php?q=categorias&id=' . $item['slug'] . '">' . $item['titulo'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-xl-6 p-1">
                <div class="news_recent" data-aos="zoom-in" data-aos-delay="50">
                    <img src="<?= $arr_configuracion['url'] . 'userfiles/images/' . $arr_news[0]['destacada'] ?>" alt="<?= $arr_news[0]['titulo'] ?>" class="img-news">
                    <div class="news_card_contenido">
                        <h2><a href="index.php?news=<?= $arr_news[0]['slug'] ?>"><?= $arr_news[0]['titulo'] ?></a></h2>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fs-4">
                                <i class="bi bi-share-fill"></i>
                            </div>
                            <div>
                                <small><?= $generales->fecha_formato_humano($arr_news[0]['create_at']) ?></small>
                            </div>
                        </div>

                    </div>
                    <a href="#recientes" class="flag_categoria">Nuevas</a>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row row-cols-1 row-cols-md-2 h-100">
                    <?
                    $contador = 0;
                    $delay = 50;
                    foreach ($arr_categorias_detalle as $categoria) {
                        if ($contador < 4) {
                            echo '<div class="col h-md-50 p-1">
                                <div class="news_categories_card" data-aos="zoom-in" data-aos-delay="' . $delay . '">
                                    <img src="' . $arr_configuracion['url'] . 'userfiles/images/' . $categoria['destacada'] . '" alt="' . $categoria['new_titulo'] . '" class="img-news">
                                    <div class="news_card_contenido">
                                        <h2 class="text "><a href="index.php?news=' . $categoria['new_slug'] . '">' . $generales->corta_cadena($categoria['new_titulo'], 50) . '</a></h2>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bi bi-share-fill"></i>
                                            </div>
                                            <div>
                                                <small>' . $generales->fecha_formato_humano($categoria['create_at']) . '</small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="index.php?q=categorias&id=' . $categoria['categoria_slug'] . '" class="flag_categoria"><small>' . $categoria['categoria_titulo'] . '</small></a>
                                </div>
                            </div>';
                        }
                        $contador++;
                        $delay = $delay + 100;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="recientes mt-5" id="recientes">
            <div class="row">
                <div class="d-flex flex-column flex-xl-row gap-5 gap-xl-3">
                    <div class="flex-fill col-12">
                        <div class="row gap-4">
                            <h2>M&aacute;s recientes</h2>
                            <?include_once(URL_SERVIDOR . '/news/template/secciones/partials/new-card.php')?>
                        </div>
                    </div>
                    <!-- <div class="sidebar px-5 d-flex align-items-center" data-aos="fade-left" data-aos-delay="50">
                        <a href="#"><img src="./img/banner-marvel.jpg" alt="Doctor Strange MULTVERSO B LOCURA" class="img-fluid"></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>