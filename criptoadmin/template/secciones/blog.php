<?
include_once(URL_SERVIDOR . '/class/posts.php');
$post = new post();

$arr_notas = $post->lista_post();

if (isset($_GET['e'])) {
    if ($post->elimina_post($_GET['e'])) {
        $message = '<div class="alert alert-success" role="alert">
            El post se elimin&oacute; con &eacute;xito. Espere un momento...
        </div>
        <script>setTimeout( function() { window.location.href = "index.php?q=blog"; }, 2000 );</script>';
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
        <?=$message?>
        <p><a href="index.php?q=blog_nuevo" class="btn btn-secondary">Crear nuevo post</a></p>
        <div class="table-responsive">
            <table id="usuarios_table" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 60px;"># ID</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th style="min-width: 170px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    foreach ($arr_notas as $nota) {
                        echo '<tr>
                            <td>
                                ' . $nota['id'] . '
                            </td>
                            <td>
                                ' . $nota['titulo'] . '
                            </td>
                            <td>
                                ' . $nota['slug'] . '
                            </td>
                            <td class="text-center">
                                <a href="index.php?q=blog_edita&id=' . $nota['slug'] . '" class="btn btn-primary btn-sm">Editar</a>
                                <a href="../blog/index.php?b=' . $nota['slug'] . '" target="_blank" class="btn btn-info btn-sm mx-2">Ver</a>
                                <a href="#" class="btn btn-danger delpost btn-sm" data-url="index.php?q=blog&e=' . $nota['slug'] . '">Eliminar</a>
                            </td>
                        </tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>