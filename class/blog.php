<?
include_once(URL_SERVIDOR . '/class/db.php');
include_once(URL_SERVIDOR . '/class/generales.php');

class blog
{
    function __construct()
    {
        $this->db = new db();
        $this->generales = new generales();
    }

    public function lista_post()
    {
        $sql = sprintf(
            "SELECT * FROM notas WHERE notas.status = 2 ORDER BY notas.id DESC"
        );

        if (!$response = $this->db->db_query($sql, 1))
            return false;

        return $response;
    }

    public function lista_etiquetas()
    {
        $html = "";

        $sql = sprintf(
            "SELECT 
                t.titulo,
                t.slug,
                COUNT(nt.tag_id) AS total
            FROM tags AS t 
            LEFT JOIN notas_tags AS nt
            ON t.id = nt.tag_id
            INNER JOIN notas as n
            ON n.id = nt.nota_id
            WHERE n.status = 2
            GROUP BY t.slug
            "
        );

        if (!$arr_tags = $this->db->db_query($sql, 1))
            return false;

        $html .= '<div class="d-flex flex-wrap gap-2 tags">';
        foreach ($arr_tags as $tag) {
            $html .= '<a href="index.php?q=tags&tag=' . $tag['slug'] . '">' . $tag['titulo'] . ' (' . $tag['total'] . ')</a>';
        }
        $html .= '</div>';

        return $html;
    }

    public function lista_post_tag($tag){
        if($tag == "")
            return false;
            
        $sql = sprintf(
            "SELECT 
                n.titulo,
                n.slug,
                n.destacada,
                n.extracto,
                t.slug as tag_slug
            FROM notas AS n 
            INNER JOIN notas_tags AS nt
            ON n.id = nt.nota_id
            INNER JOIN tags as t
            ON t.id = nt.tag_id
            WHERE n.status = 2
            AND t.slug = '%s'
            ",
            $tag
        );
        
        if (!$arr_post = $this->db->db_query($sql, 1))
            return false;

        return $arr_post;
    }

    public function lista_post_id($slug)
    {
        if (empty($slug) || $slug == "")
            return false;

        $sql = sprintf(
            "SELECT
                n.titulo,
                n.slug,
                n.destacada,
                n.body,                
                n.keywords,                
                n.extracto,                
                n.create_at
            FROM notas AS n
            WHERE
                n.slug = '%s'
            ",
            trim($slug)
        );

        if (!$arr_post = $this->db->db_query($sql, 1))
            return false;

        return $arr_post[0];
    }
    public function recent_post($activo)
    {
        $html = "";

        $sql = sprintf(
            "SELECT
                n.titulo,
                n.slug,
                n.destacada,
                n.extracto
            FROM notas AS n
            WHERE
                n.slug != '%s'
            AND n.status = 2
            ORDER BY n.create_at ASC
            LIMIT 6
        ",
            $activo
        );

        if (!$arr_recent = $this->db->db_query($sql, 1))
            return false;

        foreach ($arr_recent as $post) {
            $html .= '<div class="card-recent d-flex flex-row gap-3 mb-3 align-items-center">
                <div class="destacada">
                    <a href="index.php?post=' . $post['slug'] . '"><img src="../userfiles/images/' . $post['destacada'] . '" alt="' . $post['titulo'] . '" /></a>
                </div>
                <div class="content-recent flex-fill col-12">
                    <h3><a href="index.php?post=' . $post['slug'] . '">' . $post['titulo'] . '</a></h3>
                    <p class="mb-0">' . $this->generales->corta_cadena($post['extracto'], 90) . '</p>
                </div>
            </div>';
        }

        return $html;
    }
}
