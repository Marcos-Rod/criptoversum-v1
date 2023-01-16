<?
$arr_categorias = $new->lista_categorias();

?>
<div class="contenido-single text-white overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="news-categories flex-fill col-12 pb-2 mb-5">
                <ul class="d-flex flex-column flex-lg-row gap-2 gap-lg-4 float-xl-end text-center m-0 flex-wrap">
                    <?
                    foreach ($arr_categorias as $item) {

                        echo '<li class="';
                        if ($item['id'] === $arr_news['categoria_id'])
                            echo 'active';
                        echo '"><a href="index.php?q=categorias&id=' . $item['slug'] . '">' . $item['titulo'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <?
            if (!$arr_news) {
                echo '<div class="text-center">
                        <h2>P&aacute;gina no encontrada :(</h2>
                        <p>Lo sentimos, esta p&aacute;gina no existe</p>
                    </div>';
            } else {
            ?>
                <div class="d-flex flex-column flex-xl-row gap-5">
                    <div class="flex-fill col-12" data-aos="fade" data-aos-delay="50">
                        <h2 class="titulo-post"><?= $arr_news['titulo'] ?></h2>
                        <h5 class="create_at mb-4"><?= $arr_news['data_new'] ?></h5>
                        <?= $arr_news['body'] ?>
                    </div>
                    <!-- <div class="sidebar px-5 d-flex align-items-center" data-aos="fade-left" data-aos-delay="50">
                        <a href="#"><img src="./img/banner-marvel.jpg" alt="Doctor Strange MULTVERSO B LOCURA" class="img-fluid"></a>
                    </div> -->
                </div>

            <? } ?>

        </div>
    </div>
</div>