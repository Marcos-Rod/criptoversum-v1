<?
include_once(URL_SERVIDOR . '/class/db.php');
include_once(URL_SERVIDOR . '/class/generales.php');

class categories
{
    function __construct()
    {
        $this->db = new db();
        $this->generales = new generales();
    }

    public function lista_categorias(){
        $sql = sprintf("SELECT
            c.id,
            c.titulo,
            c.slug
        FROM
            categorias AS c
        WHERE
            c.status = 1
        ");

        if (!$arr_categorias = $this->db->db_query($sql, 1))
            return false;

        return $arr_categorias;
    }
    public function lista_categoria_id($slug)
    {
        if ($slug == "" || empty($slug))
            return false;

        $sql = sprintf(
            "SELECT
                    c.id,
                    c.titulo,
                    c.slug
                FROM
                    categorias AS c
                WHERE
                    c.slug = '%s'
            ",
            $slug
        );

        if (!$arr_tag = $this->db->db_query($sql, 1))
            return false;

        return $arr_tag[0];
    }

    public function crear_categoria($request)
    {
        $sql_verify = sprintf(
            "SELECT
                c.slug
            FROM
                categorias AS c
            WHERE
                c.slug = '%s'
        ",
            $request['slug']
        );

        if ($response = $this->db->db_query($sql_verify, 1))
            return '2';

        $sql = sprintf(
            "INSERT INTO categorias(titulo, slug, status, create_at, update_at)
            VALUES ('%s', '%s', 1, '%s', '%s')",
            $this->db->db_limpia_cadena_sql($request['titulo']),
            $this->db->db_limpia_cadena_sql($request['slug']),
            $this->generales->hoy(),
            $this->generales->hoy()
        );

        if (!$seccion = $this->db->db_query($sql, 2))
            return false;

        return true;
    }

    public function editar_categoria($request, $id)
    {
        if (empty($request) || !is_array($request) || $id == "")
            return false;

        $sql = sprintf(
            "UPDATE categorias
            SET
                titulo = '%s',
                slug = '%s',
                update_at = '%s'
            WHERE
                id = %d
            ",
            ($this->generales->limpia_caracteres_to_ascii($request['titulo'])),
            ($this->generales->limpia_caracteres_to_ascii($request['slug'])),
            $this->generales->hoy(),
            $id
        );

        if (!$response = $this->db->db_query($sql, 3))
            return false;

        return true;
    }

    public function elimina_categoria($slug)
    {
        if (empty($slug) || $slug == "")
            return false;

        $sql = sprintf(
            "UPDATE categorias
            SET 
                status = 2
            WHERE
                slug = '%s'",
            $slug
        );

        if ($response = $this->db->db_query($sql, 3))
            return true;
        
        return false;
    }
}