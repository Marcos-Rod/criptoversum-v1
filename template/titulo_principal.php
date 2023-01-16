<div class="titulo_principal">
    <div class="container">
        <div class="row">
            <h1 class="mb-0">
                <?
                if (strpos($_SERVER['SCRIPT_URL'], 'blog')) {
                    echo 'Blog';
                } elseif (strpos($_SERVER['SCRIPT_URL'], 'news')) {
                    echo 'News';
                } else {
                    echo strtoupper($_GET['q']);
                }
                ?>
            </h1>
        </div>
    </div>
</div>