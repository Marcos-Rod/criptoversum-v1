<?
include_once(URL_SERVIDOR . '/class/podcast.php');
$podcast = new podcast();

$arr_podcast = $podcast->lista_podcast();
echo $arr_podcast['titulo'];

if (isset($_GET['e'])) {
    if ($podcast->elimina_podcast($_GET['e'])) {
        $message = '<div class="alert alert-success" role="alert">
            El podcast se elimin&oacute; con &eacute;xito. Espere un momento...
        </div>
        <script>setTimeout( function() { window.location.href = "index.php?q=podcast"; }, 2000 );</script>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">
                Hubo un error al eliminar el podcast.
            </div>';
    }
}
?>
<div class="container">
    <div class="row">
        <h2 class="mb-4 float-start ">Listado de Podcast</h2>
        <?= $message ?>
        <p><a href="index.php?q=podcast_nuevo" class="btn btn-secondary">Crear nuevo podcast</a></p>
        <div class="table-responsive">
            <table id="usuarios_table" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 60px;"># ID</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th style="min-width: 200px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    foreach ($arr_podcast as $podcast) {
                        echo '<tr>
                            <td>
                                ' . $podcast['id'] . '
                            </td>
                            <td>
                                ' . $podcast['titulo'] . '
                            </td>
                            <td>
                                ' . $podcast['slug'] . '
                            </td>
                            <td class="text-center">
                                <a href="index.php?q=podcast_edita&id=' . $podcast['slug'] . '" class="btn btn-primary btn-sm">Editar</a>
                                <a href="../index.php?q=podcast&id=' . $podcast['slug'] . '" target="_blank" class="btn btn-info btn-sm mx-2 px-3">Ver</a>
                                <a href="#" class="btn btn-danger delreg btn-sm" data-url="index.php?q=podcast&e=' . $podcast['slug'] . '">Eliminar</a>
                            </td>
                        </tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>