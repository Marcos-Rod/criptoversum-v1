
<div class="contenido-single">
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column flex-xl-row gap-5">
                <div class="flex-fill col-12" data-aos="fade" data-aos-delay="50">
                    <h2><?=$arr_post['titulo']?></h2>
                    <h5 class="create_at mb-4"><?=$generales->fecha_formato_humano($arr_post['create_at'])?></h5>
                    <?=$arr_post['body']?>
                </div>
                <div class="sidebar" data-aos="fade-left" data-aos-delay="50">
                    <h3 class="fw-bold mb-3">Publicaciones recientes</h3>
                    <?= $blog->recent_post($arr_post['slug']) ?>
                    <!-- <h3 class="fw-bold mb-3 mt-5">TAGS</h3>
                    <?=$blog->lista_etiquetas()?> -->
                </div>
            </div>
        </div>
    </div>
</div>