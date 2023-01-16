<?
$delay = 50;
foreach ($arr_news as $new) {
?>
    <div class="d-flex gap-4 align-items-start flex-column flex-md-row" data-aos="fade-right" data-aos-delay="<?= $delay ?>">
        <a href="index.php?news=<?= $new['slug'] ?>" class="destacada mx-auto">
            <img src="../userfiles/images/<?= $new['destacada'] ?>" alt="<?= $new['titulo'] ?>" class="img-fluid">
        </a>
        <div class="content-recent flex-fill col-12">
            <h3 class="fw-bold"><a href="index.php?news=<?= $new['slug'] ?>"><?= $new['titulo'] ?></a></h3>
            <p class="mb-2"><small><?=$new['data_new']?></small></p>
            <p><?= $generales->corta_cadena($new['extracto'], 200) ?></p>
        </div>
    </div>
<?
    $delay = $delay + 100;
}
?>