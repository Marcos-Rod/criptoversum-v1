<?
$arr_post = $blog->lista_post();
?>
<div class="blog_bienvenida py-5 overflow-hidden">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="50">
                <p>En este espacio, tu espacio, podrás participar y enterarte de los últimos acontecimientos relacionados a este nuevo universo digital, redactado por nuestro equipo de forma transparente, ligera y fresca.</p>
            </div>
            <div class="offset-lg-1 col-lg-6 position-relative">
                <div class="hi" data-aos="fade-up" data-aos-delay="50">
                    Hi
                </div>
                <div class="text-end" data-aos="fade-left" data-aos-delay="50">
                    <img src="./img/img-bienvenida.jpg" alt="Blog" class="img-fluid w-75">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="post py-5 overflow-hidden">
    <div class="container">
        <div class="row">
            <h2 class="text-center fw-bold mb-5" data-aos="fade" data-aos-delay="50">Notas de Blog</h2>
        </div>
        <div class="d-flex flex-column flex-xl-row gap-5 gap-xl-3">
            <div class="flex-fill col-12">
                <div class="row">
                    <?
                    foreach ($arr_post as $post) {
                        echo '<div class="col-md-6 my-3" data-aos="fade-right" data-aos-delay="50">
                            <div class="card-post mx-auto mx-lg-0">
                                <div class="dest-post">
                                    <a href="index.php?post=' . $post['slug'] . '"><img src="../userfiles/images/' . $post['destacada'] . '" /></a>
                                </div>
                                <div class="cont-post">
                                    <p class="mt-3 fs-6 fst-italic">'. $generales->fecha_formato_humano($post['create_at']) .'</p>
                                    <h3 class="fw-bold "><a href="index.php?post=' . $post['slug'] . '">' . $post['titulo'] . '</a></h3>
                                    <p class="fst-italic">'.$generales->corta_cadena($post['extracto'], 160).'</p>
                                    <p><a href="" class="btn btn-mas-post">Leer M&aacute;s <i class="bi bi-heart "></i></a><p>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
            <div class="sidebar" data-aos="fade-left" data-aos-delay="50">
                <form action="" method="get">
                    <div class="input-group mb-5 buscador">
                        <input type="text" name="" id="" class="form-control">
                        <span class="input-group-text"><button type="submit">BUSCAR</button></span>
                    </div>
                </form>
                <h3 class="fw-bold mb-3">TAGS</h3>
                <?=$blog->lista_etiquetas()?>
            </div>
        </div>
    </div>
</div>