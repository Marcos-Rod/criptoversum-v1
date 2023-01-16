
<?
include_once(URL_SERVIDOR . '/class/posts.php');
$post = new post();
$arr_post = $post->lista_post_slug($_GET['id']);
$arr_tag = $post->lista_tags_id($arr_post['id']);

if (!empty($_POST)) {

    if ($response = $post->edita_post($_POST, $_FILES)) {
        $message = '<div class="alert alert-success" role="alert">
                El post fu&eacute; editado con &eacute;xito. Espere un momento...
            </div>
            <script>setTimeout( function() { window.location.href = "index.php?q=blog_edita&id=' . $_POST['slug'] . '"; }, 2000 );</script>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">
                    Hubo un error al editar el Post. Intente nuevamente
                </div>';
    }
}
?>

<div class="col-12 d-flex justify-content-between">
    <h2><?= $arr_post['id'] . ' - ' . $arr_post['titulo'] ?></h2>
    <p class="text-warning"><a href="../blog/index.php?b=<?= $arr_post['slug'] ?>" target="_blank"><i class="bi bi-link"></i> <?= $arr_post['slug'] ?></a></p>
</div>
<hr>
<div class="col-md-12">
    <?= $message ?>
</div>
<form action="index.php?q=blog_edita&id=<?= $_GET['id'] ?>&g=g" method="post" id="form-post" enctype="multipart/form-data">
    <input type="hidden" name="imagen_destacada" value="<?= $arr_post['destacada'] ?>">
    <input type="hidden" name="id_post" value="<?= $arr_post['id'] ?>">
    <? include_once(URL_SERVIDOR . '/template/secciones/partials/blog-form.php') ?>
    <div class="row">
        <div class="col-md-9">
            <div class="mt-5 text-end">
                <button type="submit" class="btn btn-warning">Editar post</button>
            </div>
        </div>
    </div>
</form>