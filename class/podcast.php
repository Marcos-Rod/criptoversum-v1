<?
include_once(URL_SERVIDOR . '/class/db.php');
include_once(URL_SERVIDOR . '/class/generales.php');

class podcast
{

    function __construct()
    {
        $this->db = new db();
        $this->generales = new generales();
    }

    public function lista_podcast()
    {
        $sql = sprintf(
            "SELECT * FROM podcast WHERE podcast.status = 2 ORDER BY podcast.create_at ASC"
        );

        if (!$response = $this->db->db_query($sql, 1))
            return false;

        return $response;
    }

    public function lista_podcast_id($slug)
    {
        $sql = sprintf(
            "SELECT
                p.id,
                p.titulo,
                p.slug,
                p.destacada,
                p.descripcion,
                p.keywords,
                p.url_video
            FROM podcast AS p
            WHERE p.status = 2
            AND p.slug = '%s'",
            $slug
        );

        if (!$response = $this->db->db_query($sql, 1))
            return false;

        return $response[0];
    }
}