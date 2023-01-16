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
                <div class="mb-3">
                    <label for="titulo" class="fw-bold mb-1 w-100">Titulo del podcast</label>
                    <span id="slug-span" class="fw-normal text-secondary"></span>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $arr_post['titulo'] ?>">
                </div>
                <div class="mb-3">
                    <label for="url_video" class="fw-bold mb-1 w-100">ID del video <small class="fw-light text-muted">https://www.youtube.com/watch?v=<strong class="fw-bold">fLCthAdsatU</strong></small></label>
                    <input type="text" name="url_video" id="url_video" class="form-control" value="<?= $arr_post['url_video'] ?>">
                </div>

                <input type="hidden" name="slug" id="slug" value="<?= $arr_post['slug'] ?>">
                <input type="hidden" name="aid" id="aid" value="<?= $_SESSION['admin_id'] ?>">
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="titulo" class="fw-bold mb-1 w-100">Descripci&oacute;n del podcast</label>
                <textarea name="descripcion" id="body"><?= $arr_post['descripcion'] ?></textarea>
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

        <h4 class="mb-1">Meta etiquetas</h4>
        <p class="mb-0 text-muted"><small>Separadas por ,</small></p>
        <textarea name="keywords" id="keywords" rows="4" class="form-control" placeholder="Separadas por ,"><?= $arr_post['keywords'] ?></textarea>

    </div>
</div>