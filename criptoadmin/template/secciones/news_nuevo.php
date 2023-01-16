<pre>
<?
include_once(URL_SERVIDOR . '/class/news.php');
$news = new news();

if (!empty($_POST) && isset($_GET['g'])) {
    
    if ($response = $news->crear_new($_POST, $_FILES)) {
       
        switch ($response) {
            case 'a':
                $message = '<div class="alert alert-danger" role="alert">
                    El nombre del post ya está en uso. Por favor escriba otro.
                </div>';
                break;
            case 'b':
                $message = '<div class="alert alert-danger" role="alert">
                    La extención o el tamaño del archivo no es correcto. Solo archivos .gif, .jpg, .png. y de 600 KB como máximo.
                </div>';
                break;
            default:
                $message = '<div class="alert alert-success" role="alert">
                    El post fu&eacute; creado con &eacute;xito. Espere un momento...
                </div>
                <script>setTimeout( function() { window.location.href = "index.php?q=news_edita&id=' . $response . '"; }, 2000 );</script>';
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
<form action="index.php?q=news_nuevo&g=g" method="post" id="form-post" enctype="multipart/form-data">
    <?include_once(URL_SERVIDOR . '/template/secciones/partials/news-form.php')?>
    <div class="row">
        <div class="col-md-9">
            <div class="mt-5 text-end">
                <button type="submit" class="btn btn-warning">Crear post</button>
            </div>
        </div>
    </div>
</form>