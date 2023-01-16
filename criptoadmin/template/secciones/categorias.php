<?
include_once(URL_SERVIDOR . '/class/categories.php');
$categorias = new categories();

$arr_categorias = $categorias->lista_categorias();
$arr_categoria = $categorias->lista_categoria_id($_GET['id']);

if (!empty($_POST) && $_GET['g'] == "nueva") {
    if ($response = $categorias->crear_categoria($_POST)) {
        if ($response === '2') {
            $message = '<div class="alert alert-danger" role="alert">
                La categor&iacute;a ya existe. Intente con otro.
            </div>';
        } else {
            $message = '<div class="alert alert-success" role="alert">
            La categor&iacute;a se cre&oacute; correctamente. Espere un momento...
            </div>
            <script>setTimeout( function() { window.location.href = "index.php?q=categorias"; }, 2000 );</script>';
        }
    } else {
        $message = '<div class="alert alert-danger" role="alert">
            Hubo un error al crear la categor&iaute;a.
        </div>';
    }
}

if (!empty($_POST) && $_GET['g'] == "editar" && $_GET["id"] != "") {
    if ($categorias->editar_categoria($_POST, $arr_categoria['id'])) {
        $message = '<div class="alert alert-success" role="alert">
            La categor&iacute;a se edit&oacute; correctamente. Espere un momento...
        </div>
        <script>setTimeout( function() { window.location.href = "index.php?q=categorias"; }, 2000 );</script>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">
            Hubo un error al editar la categor&iacute;a.
        </div>';
    }
}

if (isset($_GET['e']) && $_GET['e'] != '') {
    if ($categorias->elimina_categoria($_GET['e'])) {
        $message = '<div class="alert alert-success" role="alert">
            La categor&iacute;a se elimin&oacute; correctamente. Espere un momento...
        </div>
        <script>setTimeout( function() { window.location.href = "index.php?q=categorias"; }, 2000 );</script>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">
            Hubo un error al eliminar la categor&iacute;a.
        </div>';
    }
}

?>
<div class="container">
    <div class="row">
        <h2 class="mb-4 float-start ">Listado de categor&iacute;as</h2>
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
                    foreach ($arr_categorias as $categoria) {
                        echo '<tr>
                            <td>' . $categoria['id'] . '</td>
                            <td>' . $categoria['titulo'] . '</td>
                            <td>' . $categoria['slug'] . '</td>
                            <td class="text-center">
                                <a href="index.php?q=categorias&id=' . $categoria['slug'] . '" class="btn btn-primary btn-sm">Editar</a>
                                <a href="#" class="btn btn-danger delreg btn-sm" data-url="index.php?q=categorias&e=' . $categoria['slug'] . '">Eliminar</a>
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
                <form action="index.php?q=categorias&g=editar&id=<?= $_GET['id'] ?>" method="post" id="frm-categs">
                    <div class="mb-3">
                        <label for="titulo" class="fw-bold">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $arr_categoria['titulo'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Slug: </label>
                        <span id="slug-span" class="fw-normal text-secondary"><?= $arr_categoria['slug'] ?></span>
                        <input type="hidden" name="slug" id="slug" class="form-control" value="<?= $arr_categoria['slug'] ?>">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            <?
            } else {
            ?>
                <h3>A&ntilde;adir nueva</h3>
                <form action="index.php?q=categorias&g=nueva" method="post" id="frm-categs">
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