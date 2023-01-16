<?
include_once(URL_SERVIDOR . '/class/podcast.php');
$podcast = new podcast;

if(isset($_GET['id'])){
    include_once(URL_SERVIDOR . '/template/secciones/episodios.php');
}else{

?>
<div class="podcast_banner py-5 text-center text-md-start">
    <div class="container">
        <div class="row py-5">
            <p class="mb-0">La evoluci&oacute;n del mundo <!-- <img src="./img/ico-microfono.png" alt="Evolucion" class="img-fluid ms-0 ms-sm-5"> --></p>
        </div>
    </div>
</div>
<div class="podcast_int py-5">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 row-cols-1 row-cols-md-2 row-cols-lg-3 d-flex flex-wrap">
                <div class="col text-center">
                    <p><img src="./img/invitados.png" alt="Invitados Especiales" width="100"></p>
                    <h4>Invitados Especiales</h4>
                    <p>Dando sus mejores consejos</p>
                </div>
                <div class="col text-center">
                    <p><img src="./img/graficos.png" alt="Invitados Especiales" width="100"></p>
                    <h4>Invitados Especiales</h4>
                    <p>Dando sus mejores consejos</p>
                </div>
                <div class="col text-center">
                    <p><img src="./img/piezas.png" alt="Invitados Especiales" width="100"></p>
                    <h4>Invitados Especiales</h4>
                    <p>Dando sus mejores consejos</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="offset-lg-1 col-lg-10 row-cols-1 row-cols-lg-2 d-flex align-items-center flex-wrap">
                <div class="col">
                    <h2><span class="clip-pink"></span> Transmisiones en vivo</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta dolores minima dolorem quasi tempora impedit exercitationem eveniet ullam quaerat minus incidunt eaque esse quis ipsum tempore placeat est necessitatibus aut repudiandae, dignissimos veritatis iste quas. Quis, fugit. Reprehenderit laboriosam repellat neque corporis nesciunt eligendi in distinctio. Modi maiores aut accusantium.</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim odio laboriosam, fugiat esse exercitationem consequuntur est at nam consequatur ea reprehenderit commodi eum autem tempora obcaecati. Itaque praesentium odit ipsum.</p>
                    <p><a href="#" class="btn btn-registro">Registrate</a></p>
                </div>
                <div class="col">
                    <iframe width="100%" height="325" src="https://www.youtube.com/embed/fLCthAdsatU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row mt-5 py-5">
            <h2 class="fw-bold fs-1">Transmisiones en vivo</h2>
            <div class="col-lg-8">
                <p class="fw-bold fs-4 d-flex align-items-center">Disfruta de nuestros podcast más populares, con invitados especiales que han compartido su experiencia y consejos. <img src="./img/spotify.png" alt="Spotify" class="img-fluid float-end" width="100"></p>
            </div>
        </div>
        <div class="row g-4">
            <?

            $arr_podcast = $podcast->lista_podcast();
            $delay = 50;
            $contador = 0;

            foreach ($arr_podcast as $podcast) {
                echo '<div class="col-md-6 col-lg-4 overflow-hidden">
                    <div class="position-relative card-podcast h-100 bg-white" data-aos="zoom-in" data-aos-delay="' . $delay . '">
                        <a href="index.php?q=podcast&id='.$podcast['slug'].'"><img src="./userfiles/images/'.$podcast['destacada'].'" alt="'.$podcast['titulo'].'" class="position-relative top-0 w-100"></a>
                        <div class="card-contenido p-3 pb-5 text-center">
                            <h3 class="fs-6 fw-bold"><a href="index.php?q=podcast&id='.$podcast['slug'].'">'.$podcast['titulo'].'</a></h3>
                            '.$generales->corta_cadena($podcast['descripcion'], 210).'
                        </div>
                    </div>
                </div>';
                $contador ++;

                if($contador < 3){
                    $delay = $delay + 100;
                }
                else{
                    $delay = 50;
                    $contador = 0;
                }
            }
            ?>
        </div>
    </div>
</div>
<?}?>