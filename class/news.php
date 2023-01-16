<?
include_once(URL_SERVIDOR . '/class/db.php');
include_once(URL_SERVIDOR . '/class/generales.php');

class news
{

    function __construct()
    {
        $this->db = new db();
        $this->generales = new generales();
    }

    public function lista_news()
    {
        $sql = sprintf(
            "SELECT * FROM news WHERE news.status = 2 ORDER BY news.create_at DESC"
        );

        if (!$response = $this->db->db_query($sql, 1))
            return false;

        return $response;
    }

    public function lista_news_id($slug)
    {
        $sql = sprintf(
            "SELECT
                n.id,
                n.titulo,
                n.slug,
                n.destacada,
                n.extracto,
                n.keywords,
                n.data_new,
                n.categoria_id,
                n.body
            FROM news AS n
            WHERE n.status = 2
            AND n.slug = '%s'",
            $slug
        );

        if (!$response = $this->db->db_query($sql, 1))
            return false;

        return $response[0];
    }

    public function lista_categorias()
    {
        $sql = sprintf(
            "SELECT
                c.id,    
                c.titulo,    
                c.slug
            FROM categorias AS c
            WHERE c.status = 1
            ORDER BY c.id
            "
        );

        if (!$arr_categorias = $this->db->db_query($sql, 1))
            return false;

        return $arr_categorias;
    }

    public function lista_categorias_news()
    {

        $sql = sprintf(
            "SELECT
                c.titulo AS categoria_titulo,    
                c.slug AS categoria_slug,
                n.titulo AS new_titulo,
                n.slug AS new_slug,
                n.destacada,
                n.create_at
            FROM categorias AS c
            LEFT JOIN news AS n
            ON n.categoria_id = c.id
            WHERE n.status = 2
            GROUP BY c.slug
            ORDER BY RAND()
            "
        );

        if (!$arr_categorias = $this->db->db_query($sql, 1))
            return false;

        return $arr_categorias;
    }

    public function lista_post_categoria($slug)
    {
        /* $sql = sprintf(
            "SELECT
                n.id,
                n.titulo,
                n.slug,
                n.destacada,
                n.extracto,
                n.data_new,
                n.categoria_id,
                n.body
            FROM news AS n
            LEFT JOIN categorias AS c
            ON c.id = n.categoria_id
            WHERE n.status = 2
            AND c.slug = '%s'",
            $slug
        ); */

        $sql = sprintf(
            "SELECT
                c.titulo AS categoria_titulo,    
                c.slug AS categoria_slug,
                n.id,
                n.titulo,
                n.slug,
                n.destacada,
                n.extracto,
                n.data_new,
                n.categoria_id,
                n.body
            FROM categorias AS c
            LEFT JOIN news AS n
            ON n.categoria_id = c.id
            WHERE n.status = 2
            AND c.slug = '%s'
            ",
            $slug
        );
        if (!$response = $this->db->db_query($sql, 1))
            return false;

        return $response;
    }
}
