<?
include_once(URL_SERVIDOR . '/class/db.php');
include_once(URL_SERVIDOR . '/class/generales.php');

class contenido
{
    function __construct()
    {
        $this->db = new db();
        $this->generales = new generales();
    }

    public function configuracion_detalle(){
        $sql = sprintf(
            "SELECT * FROM configuracion"
        );

        if (!$array_configuracion = $this->db->db_query($sql, 1))
            return false;
        
        return $array_configuracion[0];
    }

    public function redes_sociales()
    {
        $url = $this->configuracion_detalle();
        $html = '<div>
                    <a href="https://www.facebook.com/Criptoversum" target="_blank" rel="noopener noreferrer">
                        <img src="'.$url['url'].'./img/ico-facebook.png" alt="Facebook" class="img-fluid" />
                    </a>
                </div>
                <div>
                    <a href="https://www.instagram.com/criptoversum/" target="_blank" rel="noopener noreferrer">
                        <img src="'.$url['url'].'./img/ico-instagram.png" alt="Instagram" class="img-fluid" />
                    </a>
                </div>
                <div>
                    <a href="https://www.tiktok.com/@criptoversum" target="_blank" rel="noopener noreferrer">
                        <img src="'.$url['url'].'./img/ico-tiktok.png" alt="Tiktok" class="img-fluid" />
                    </a>
                </div>
                <div>
                    <a href="https://www.youtube.com/channel/UC7-3hkEtZajGkK6oIJO8big" target="_blank" rel="noopener noreferrer">
                        <img src="'.$url['url'].'./img/ico-youtube.png" alt="Youtube" class="img-fluid" />
                    </a>
                </div>
                <div>
                    <img src="'.$url['url'].'./img/ico-spotify.png" alt="Spotify" class="img-fluid" />
                </div>';

        return $html;
    }
}
