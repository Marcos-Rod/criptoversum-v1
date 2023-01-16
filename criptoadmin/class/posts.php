<?
include_once(URL_SERVIDOR . '/class/db.php');
include_once(URL_SERVIDOR . '/class/generales.php');

class post
{
    function __construct()
    {
        $this->db = new db();
        $this->generales = new generales();
    }

    public function lista_post()
    {
        $sql = sprintf(
            "SELECT * FROM notas WHERE notas.status != 3 ORDER BY notas.id DESC"
        );

        if (!$response = $this->db->db_query($sql, 1))
            return false;

        return $response;
    }

    public function lista_post_slug($request)
    {
        if ($request == "" || empty($request))
            return false;

        $sql = sprintf(
            "SELECT
                n.id,
                n.titulo,
                n.slug,
                n.destacada,
                n.extracto,
                n.keywords,
                n.body,
                n.status
            FROM
                notas AS n
            WHERE
                n.slug = '%s'
        ",
            $request
        );

        if (!$arr_post = $this->db->db_query($sql, 1))
            return false;

        return $arr_post[0];
    }
    public function lista_tags_id($id_post)
    {
        $sql = sprintf(
            "SELECT
                nt.id AS id_nota_titulo,
                t.titulo AS nota_titulo,
                t.slug AS tag_slug
            FROM
                notas AS n
            INNER JOIN notas_tags AS nt ON n.id = nt.nota_id
            INNER JOIN tags AS t ON t.id = nt.tag_id
            WHERE
                n.id = %d
        ",
            $id_post
        );

        if (!$arr_post = $this->db->db_query($sql, 1))
            return false;

        $new_arr_post = array();
        for ($i = 0; $i < count($arr_post); $i++) {
            $key = $arr_post[$i]['tag_slug'];

            $new_arr_post[$key] = $arr_post[$i];
        }

        return $new_arr_post;
    }

    public function nuevo_post($request, $file)
    {
        $sql_verify = sprintf(
            "SELECT
                n.slug
            FROM
                notas AS n
            WHERE
                n.slug = '%s'
        ",
            $request['slug']
        );

        if ($response = $this->db->db_query($sql_verify, 1))
            return '2';

        $name_file = "";
        //Validar si se envió un archivo
        if ($file['file']['name'] != '') {
            $aleatorio = md5(uniqid(rand(), true));
            $strUnica = substr($aleatorio, 0, 5);
            $name_file = $strUnica . '-' . $file['file']['name'];
            //Datos del archivo
            $type = $file['file']['type'];
            $size = $file['file']['size'];
            $temp = $file['file']['tmp_name'];
            $dir = URL_FILES . 'images/';

            //Comprobar extension y tamanio del archivo
            if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 614400)))
                return '3';

            if (!is_dir($dir))
                mkdir($dir, 0777, true);

            //Subir archivo al servidor
            if (!move_uploaded_file($temp, $dir . $name_file))
                return false;
        }

        $sql = sprintf(
            "INSERT INTO notas(titulo, slug, destacada, extracto, keywords, body, user_id, status, create_at, update_at)
            VALUES ('%s', '%s', '%s', '%s', '%s', '%s', %d, 1, '%s', '%s')",
            trim($request['titulo']),
            trim($request['slug']),
            $name_file,
            trim($request['extracto']),
            trim($request['keywords']),
            $this->db->db_limpia_cadena_sql($request['body']),
            intval($request['aid']),
            $this->generales->hoy(),
            $this->generales->hoy()
        );

        if (!$post_id = $this->db->db_query($sql, 2))
            return false;

        foreach ($request['check_slug'] as $slug) {

            $sql_notas_slug = sprintf(
                "INSERT INTO notas_tags(nota_id, tag_id)
                VALUES (%d, %d)",
                $post_id,
                $slug
            );

            if (!$this->db->db_query($sql_notas_slug, 2))
                return false;
        }

        return trim($request['slug']);
    }
    public function edita_post($request, $file)
    {
        if (empty($request))
            return false;

        $name_file = $request['imagen_destacada'];
        //Validar si se envió un archivo
        if ($file['file']['name'] != '') {
            $aleatorio = md5(uniqid(rand(), true));
            $strUnica = substr($aleatorio, 0, 5);
            $name_file = $strUnica . '-' . $file['file']['name'];
            //Datos del archivo
            $type = $file['file']['type'];
            $size = $file['file']['size'];
            $temp = $file['file']['tmp_name'];
            $dir = URL_FILES . 'images/';

            //Comprobar extension y tamanio del archivo
            if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 614400)))
                return false;

            if (!is_dir($dir))
                mkdir($dir, 0777, true);

            //Subir archivo al servidor
            if (!move_uploaded_file($temp, $dir . $name_file))
                return false;
        }

        $sql = sprintf(
            "UPDATE notas
            SET
                titulo = '%s',
                slug = '%s',
                destacada = '%s',
                extracto = '%s',
                keywords = '%s',
                body = '%s',
                status = %d,
                update_at = '%s'
            WHERE
                id = %d",
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['titulo'])),
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['slug'])),
            $name_file,
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['extracto'])),
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['keywords'])),
            $request['body'],
            intval($request['status']),
            $this->generales->hoy(),
            $request['id_post']
        );

        if (!$this->guarda_tags($request['check_slug'], $request['id_post']))
            return false;

        if (!$response = $this->db->db_query($sql, 3))
            return false;


        return $response;
    }

    function guarda_tags($slugs, $post_id)
    {
        $sql_delete = sprintf(
            "DELETE FROM notas_tags WHERE nota_id= %d;",
            $post_id
        );

        if (!$this->db->db_query($sql_delete, 3))
                return false;

        foreach ($slugs as $slug) {

            $sql = sprintf(
                "INSERT INTO notas_tags(nota_id, tag_id)
                VALUES (%d, %d)",
                $post_id,
                $slug
            );

            if (!$this->db->db_query($sql, 2))
                return false;
        }

        return true;
    }

    public function elimina_post($slug)
    {
        if (empty($slug) || $slug == "")
            return false;

        $sql = sprintf(
            "UPDATE notas
            SET 
                status = 3
            WHERE
                slug = '%s'",
            $slug
        );

        if ($response = $this->db->db_query($sql, 3))
            return true;

        return false;
    }
}
