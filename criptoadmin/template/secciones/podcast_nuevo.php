<pre>
<?
include_once(URL_SERVIDOR . '/class/podcast.php');
$podcast = new podcast();

if (!empty($_POST) && isset($_GET['g'])) {
    
    if ($response = $podcast->crear_podcast($_POST, $_FILES)) {
       
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
                <script>setTimeout( function() { window.location.href = "index.php?q=podcast_edita&id=' . $response . '"; }, 2000 );</script>';
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
    <h2>Nuevo podcast</h2>
    <hr>
</div>
<div class="col-md-12">
    <?= $message ?>
</div>
<form action="index.php?q=podcast_nuevo&g=g" method="post" id="form-podcast" enctype="multipart/form-data">
    <?include_once(URL_SERVIDOR . '/template/secciones/partials/podcast-form.php')?>
    <div class="row">
        <div class="col-md-9">
            <div class="mt-5 text-end">
                <button type="submit" class="btn btn-warning">Crear podcast</button>
            </div>
        </div>
    </div>
</form>