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
        $sql = sprintf("SELECT
            p.id,
            p.titulo,
            p.slug,
            p.destacada,
            p.descripcion,
            p.url_video,
            p.status
        FROM
            podcast AS p
        WHERE
            p.status != 3
        ");
        if (!$arr_tags = $this->db->db_query($sql, 1))
            return false;

        return $arr_tags;
    }

    public function lista_podcast_id($slug)
    {
        if ($slug == "" || empty($slug))
            return false;

        $sql = sprintf(
            "SELECT
                p.id,
                p.titulo,
                p.slug,
                p.destacada,
                p.descripcion,
                p.keywords,
                p.url_video,
                p.status
        FROM
            podcast AS p
                WHERE
                    p.slug = '%s'
            ",
            $slug
        );

        if (!$arr = $this->db->db_query($sql, 1))
            return false;

        return $arr[0];
    }

    public function crear_podcast($request, $file)
    {
        $sql_verify = sprintf(
            "SELECT
                p.slug
            FROM
                podcast AS p
            WHERE
                p.slug = '%s'
        ",
            $request['slug']
        );

        if ($response = $this->db->db_query($sql_verify, 1))
            return 'a';

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
                return 'b';

            if (!is_dir($dir))
                mkdir($dir, 0777, true);

            //Subir archivo al servidor
            if (!move_uploaded_file($temp, $dir . $name_file))
                return false;
        }

        $sql = sprintf(
            "INSERT INTO podcast(titulo, slug, destacada, descripcion, keywords, url_video, status, create_at, update_at)
            VALUES ('%s', '%s', '%s', '%s', '%s', '%s', %d, '%s', '%s')",
            trim($request['titulo']),
            trim($request['slug']),
            $name_file,
            trim($request['descripcion']),
            trim($request['keywords']),
            $this->db->db_limpia_cadena_sql($request['url_video']),
            intval($request['status']),
            $this->generales->hoy(),
            $this->generales->hoy()
        );

        if (!$new_id = $this->db->db_query($sql, 2))
            return false;

        return trim($request['slug']);
    }

    public function editar_podcast($request, $file)
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
            "UPDATE podcast
            SET
                titulo = '%s',
                slug = '%s',
                destacada = '%s',
                descripcion = '%s',
                keywords = '%s',
                url_video = '%s',
                status = %d,
                update_at = '%s'
            WHERE
                id = %d",
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['titulo'])),
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['slug'])),
            $name_file,
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['descripcion'])),
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['keywords'])),
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['url_video'])),
            intval($request['status']),
            $this->generales->hoy(),
            $request['id_post']
        );

        if (!$response = $this->db->db_query($sql, 3))
            return false;


        return $response;
    }

    public function elimina_podcast($slug)
    {
        if (empty($slug) || $slug == "")
            return false;

        $sql = sprintf(
            "UPDATE podcast
            SET 
                status = 3
            WHERE
                slug = '%s'",
            $slug
        );

        if (!$response = $this->db->db_query($sql, 3))
            return false;

        return true;
    }
}
