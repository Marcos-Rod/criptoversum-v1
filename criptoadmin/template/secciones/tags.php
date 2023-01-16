<?
include_once(URL_SERVIDOR . '/class/tags.php');
$tags = new tags();

$arr_tags = $tags->lista_tags();
$arr_tag = $tags->lista_tag_id($_GET['id']);

if (!empty($_POST) && $_GET['g'] == "nueva") {
    if ($response = $tags->crear_tag($_POST)) {
        if($response === '2'){
            $message = '<div class="alert alert-danger" role="alert">
                El tag ya existe. Intente con otro.
            </div>';
        }else{
            $message = '<div class="alert alert-success" role="alert">
                El tag se cre&oacute; correctamente. Espere un momento...
            </div>
            <script>setTimeout( function() { window.location.href = "index.php?q=tags"; }, 2000 );</script>';
        }
    } else {
        $message = '<div class="alert alert-danger" role="alert">
            Hubo un error al crear el tag.
        </div>';
    }
}

if (!empty($_POST) && $_GET['g'] == "editar" && $_GET["id"] != "") {
    if ($tags->editar_tag($_POST, $arr_tag['id'])) {
        $message = '<div class="alert alert-success" role="alert">
        El tag se edit&oacute; correctamente. Espere un momento...
    </div>
    <script>setTimeout( function() { window.location.href = "index.php?q=tags"; }, 2000 );</script>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">
        Hubo un error al editar el tag.
    </div>';
    }
}

if(isset($_GET['e']) && $_GET['e'] != '')
{
    if($tags->elimina_tag($_GET['e'])){
        $message = '<div class="alert alert-success" role="alert">
            El tag se elimin&oacute; correctamente. Espere un momento...
        </div>
        <script>setTimeout( function() { window.location.href = "index.php?q=tags"; }, 2000 );</script>';
    }else {
        $message = '<div class="alert alert-danger" role="alert">
        Hubo un error al eliminar el tag.
    </div>';
    }
}

?>
<div class="container">
    <div class="row">
        <h2 class="mb-4 float-start ">Listado de etiquetas</h2>
        <hr>
        <?= $message ?>

        <div class="col-lg-7">
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
                    foreach ($arr_tags as $tag) {
                        echo '<tr>
                            <td>' . $tag['id'] . '</td>
                            <td>' . $tag['titulo'] . '</td>
                            <td>' . $tag['slug'] . '</td>
                            <td class="text-center">
                                <a href="index.php?q=tags&id=' . $tag['slug'] . '" class="btn btn-primary btn-sm">Editar</a>
                                <a href="#" class="btn btn-danger deltag btn-sm" data-url="index.php?q=tags&e=' . $tag['slug'] . '">Eliminar</a>
                            </td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-5">
            <?
            if (isset($_GET['id']) && $_GET['id'] != '') {
            ?>
                <h3>Editando etiqueta</h3>
                <form action="index.php?q=tags&g=editar&id=<?= $_GET['id'] ?>" method="post" id="frm-tags">
                    <div class="mb-3">
                        <label for="titulo" class="fw-bold">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $arr_tag['titulo'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Slug: </label>
                        <span id="slug-span" class="fw-normal text-secondary"><?= $arr_tag['slug'] ?></span>
                        <input type="hidden" name="slug" id="slug" class="form-control" value="<?= $arr_tag['slug'] ?>">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            <?
            } else {
            ?>
                <h3>A&ntilde;adir nueva</h3>
                <form action="index.php?q=tags&g=nueva" method="post" id="frm-tags">
                    <div class="mb-3">
                        <label for="titulo" class="fw-bold">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Slug: </label>
                        <span id="slug-span" class="fw-normal text-secondary"></span>
                        <input type="hidden" name="slug" id="slug" class="form-control">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-warning">Agregar</button>
                    </div>

                </form>
            <?
            }
            ?>
        </div>
    </div>
</div>