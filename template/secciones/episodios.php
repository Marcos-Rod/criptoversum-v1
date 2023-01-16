<?
$arr_detalle = $podcast->lista_podcast_id($_GET['id']);
?>
<div class="episodios py-5">
    <div class="container">
        <div class="row">
            <h2 class="text-center mb-5"><?= $arr_detalle['titulo'] ?></h2>
            <div class="col-md-5">
                <p><iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= $arr_detalle['url_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
            </div>
            <div class="col-md-7">
                <?= $arr_detalle['descripcion'] ?>
            </div>
        </div>
    </div>
</div>