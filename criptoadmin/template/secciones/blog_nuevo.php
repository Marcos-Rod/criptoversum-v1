<pre>
<?
include_once(URL_SERVIDOR . '/class/posts.php');
$post = new post();

if (!empty($_POST)) {
    
    if ($response = $post->nuevo_post($_POST, $_FILES)) {
        
        switch ($response) {
            case '2':
                $message = '<div class="alert alert-danger" role="alert">
                    El nombre del post ya está en uso. Por favor escriba otro.
                </div>';
                break;
            case '3':
                $message = '<div class="alert alert-danger" role="alert">
                    La extención o el tamaño del archivo no es correcto. Solo archivos .gif, .jpg, .png. y de 600 KB como máximo.
                </div>';
                break;
            default:
                $message = '<div class="alert alert-success" role="alert">
                    El post fu&eacute; creado con &eacute;xito. Espere un momento...
                </div>
                <script>setTimeout( function() { window.location.href = "index.php?q=blog_edita&id=' . $response . '"; }, 2000 );</script>';
                break;
        }
    } else {
        $message = '<div class="alert alert-danger" role="alert">
                    Hubo un error al crear el Post. Intente nuevamente
                </div>';
    }
    
}

?>
</pre>

<div class="col-md-12">
    <h2>Nuevo Post</h2>
    <hr>
</div>
<div class="col-md-12">
    <?= $message ?>
</div>
<form action="index.php?q=blog_nuevo" method="post" id="form-post" enctype="multipart/form-data">
    <?include_once(URL_SERVIDOR . '/template/secciones/partials/blog-form.php')?>
    <div class="row">
        <div class="col-md-9">
            <div class="mt-5 text-end">
                <button type="submit" class="btn btn-warning">Crear post</button>
            </div>
        </div>
    </div>
</form>