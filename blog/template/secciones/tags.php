<?
$arr_post = $blog->lista_post_tag($_GET['tag']);
?>

<div class="tags_int py-5">
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column flex-xl-row gap-5 gap-xl-3">
                <div class="flex-fill col-12">
                    <?
                    foreach ($arr_post as $post) {
                        echo '<div class="d-flex gap-3 mb-3 flex-column flex-sm-row"  data-aos="fade-right" data-aos-delay="50">
                            <div class="destacada mx-auto">
                                <a href="index.php?post='.$post['slug'].'"><img src="../userfiles/images/'.$post['destacada'].'" alt="'.$post['titulo'].'"></a>
                            </div>
                            <div class="content-recent flex-fill col-12">
                                <h3>'.$post['titulo'].'</h3>
                                <p class="mb-0">'.$generales->corta_cadena($post['extracto'], 120).'</p>
                                <p ><a href="index.php?post='.$post['slug'].'" class="btn btn-mas-post fs-6">Leer Más</a></p>
                            </div>
                        </div>';
                    }
                    ?>                    
                </div>
                <div class="sidebar" data-aos="fade-left" data-aos-delay="50">
                    <h3 class="fw-bold mb-3">TAGS</h3>
                    <?= $blog->lista_etiquetas() ?>
                </div>
            </div>
        </div>
    </div>
</div>