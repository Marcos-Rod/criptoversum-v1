<?
include_once(URL_SERVIDOR . '/class/categories.php');
$categories = new categories();
$arr_categories = $categories->lista_categorias();
?>
<div class="row">
    <div class="col-lg-9 mt-5">
        <div class="row mb-5">
            <div class="col-lg-5 text-center">
                <label for="img_destacada" class="text-start w-100 fw-bold">Imagen destacada</label>
                <div class="img-destacada my-4 mx-auto">
                    <img src="<?= $retVal = (isset($arr_post['destacada']) && $arr_post['destacada'] != "") ? '../userfiles/images/' . $arr_post['destacada'] : './img/default-1200-x-700.jpg'; ?>" alt="Destacada" id="picture">
                </div>
                <input type="file" name="file" id="file" class="form-control-file" />
            </div>
            <div class="col-lg-7">
                <label for="titulo" class="fw-bold mb-1 w-100">Titulo del post</label>
                <span id="slug-span" class="fw-normal text-secondary"></span>
                <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $arr_post['titulo'] ?>">

                <input type="hidden" name="slug" id="slug" value="<?= $arr_post['slug'] ?>">
                <input type="hidden" name="aid" id="aid" value="<?= $_SESSION['admin_id'] ?>">

                <label for="extracto" class="fw-bold mb-2">Descripci&oacute;n (extracto)</label>
                <textarea name="extracto" id="extracto" rows="7" class="form-control"><?= $arr_post['extracto'] ?></textarea>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4">
                    <label for="data_new" class="fw-bold mb-2">Datos del post</label>
                    <input type="text" name="data_new" id="data_new" class="form-control" value="<?= $arr_post['data_new'] ?>">
                </div>
                
                <textarea name="body" id="body"><?= $arr_post['body'] ?></textarea>

            </div>
        </div>

    </div>
    <div class="col-lg-3 mt-5">
        <h4>Estatus</h4>
        <select name="status" id="status" class="form-select">
            <option value="1" <?= $select = ($arr_post['status'] == 1) ? 'selected' : ''; ?>>Borrador</option>
            <option value="2" <?= $select = ($arr_post['status'] == 2) ? 'selected' : ''; ?>>Publicado</option>
        </select>
        <br>
        <h4>Categor&iacute;as</h4>
        <?
        foreach ($arr_categories as $categorie) {
            echo '<div class="form-check">
                <input class="form-check-input" type="radio" value="' . $categorie['id'] . '" id="' . $categorie['slug'] . '" name="categoria_id" ';
            if ($categorie['id'] == $arr_post['categoria_id'])
                echo 'checked';
            echo '>
                <label class="form-check-label" for="' . $categorie['slug'] . '">
                    ' . $categorie['titulo'] . '
                </label>
            </div>';
        }
        ?>
        <br>
        <h4 class="mb-1">Meta etiquetas</h4>
        <p class="mb-0 text-muted"><small>Separadas por ,</small></p>
        <textarea name="keywords" id="keywords" rows="4" class="form-control" placeholder="Separadas por ,"><?= $arr_post['keywords'] ?></textarea>

    </div>
</div>