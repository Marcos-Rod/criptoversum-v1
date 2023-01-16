<pre>
<?
$arr_news = $new->lista_post_categoria($_GET['id']);
$arr_categorias = $new->lista_categorias();
?>

</pre>
<div class="categoria py-5">
    <div class="container">
        <div class="row">
            <div class="news-categories flex-fill col-12 pb-2 mb-5">
                <ul class="d-flex flex-column flex-lg-row gap-2 gap-lg-4 float-xl-end text-center m-0 flex-wrap">
                    <?
                    foreach ($arr_categorias as $item) {
                        echo '<li class="';
                        if ($item['id'] === $arr_news[0]['categoria_id'])
                            echo 'active';
                        echo '"><a href="index.php?q=categorias&id=' . $item['slug'] . '">' . $item['titulo'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column flex-xl-row gap-5 gap-xl-3">
                <div class="flex-fill col-12">
                    <div class="row gap-4">
                        <h2>Categor&iacute;a de <?= $arr_news[0]['categoria_titulo'] ?></h2>
                        <? include_once(URL_SERVIDOR . '/news/template/secciones/partials/new-card.php') ?>
                    </div>
                </div>
                <!-- <div class="sidebar px-5 d-flex align-items-center" data-aos="fade-left" data-aos-delay="50">
                    <a href="#"><img src="./img/banner-marvel.jpg" alt="Doctor Strange MULTVERSO B LOCURA" class="img-fluid"></a>
                </div> -->
            </div>
        </div>
    </div>
</div>