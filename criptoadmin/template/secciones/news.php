<?
include_once(URL_SERVIDOR . '/class/news.php');
$news = new news();

$arr_news = $news->lista_news();
echo $arr_news['titulo'];

if (isset($_GET['e'])) {
    if ($news->elimina_new($_GET['e'])) {
        $message = '<div class="alert alert-success" role="alert">
            El post se elimin&oacute; con &eacute;xito. Espere un momento...
        </div>
        <script>setTimeout( function() { window.location.href = "index.php?q=news"; }, 2000 );</script>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">
                Hubo un error al eliminar el post.
            </div>';
    }
}
?>
<div class="container">
    <div class="row">
        <h2 class="mb-4 float-start ">Listado de notas</h2>
        <?= $message ?>
        <p><a href="index.php?q=news_nuevo" class="btn btn-secondary">Crear nuevo post</a></p>
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
                    foreach ($arr_news as $new) {
                        echo '<tr>
                            <td>
                                ' . $new['id'] . '
                            </td>
                            <td>
                                ' . $new['titulo'] . '
                            </td>
                            <td>
                                ' . $new['slug'] . '
                            </td>
                            <td class="text-center">
                                <a href="index.php?q=news_edita&id=' . $new['slug'] . '" class="btn btn-primary btn-sm">Editar</a>
                                <a href="../news/index.php?news=' . $new['slug'] . '" target="_blank" class="btn btn-info btn-sm mx-2 px-3">Ver</a>
                                <a href="#" class="btn btn-danger delreg btn-sm" data-url="index.php?q=news&e=' . $new['slug'] . '">Eliminar</a>
                            </td>
                        </tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>