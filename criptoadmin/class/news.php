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
        $sql = sprintf("SELECT
            n.id,
            n.titulo,
            n.slug
        FROM
            news AS n
        WHERE
            n.status != 3
        ");
        if (!$arr_tags = $this->db->db_query($sql, 1))
            return false;

        return $arr_tags;
    }

    public function lista_new_id($slug)
    {
        if ($slug == "" || empty($slug))
            return false;

        $sql = sprintf(
            "SELECT
                    n.id,
                    n.titulo,
                    n.slug,
                    n.destacada,
                    n.extracto,
                    n.keywords,
                    n.data_new,
                    n.body,
                    n.categoria_id,
                    n.status
                FROM
                    news AS n
                WHERE
                    n.slug = '%s'
            ",
            $slug
        );

        if (!$arr_tag = $this->db->db_query($sql, 1))
            return false;

        return $arr_tag[0];
    }

    public function crear_new($request, $file)
    {
        $sql_verify = sprintf(
            "SELECT
                n.slug
            FROM
                news AS n
            WHERE
                n.slug = '%s'
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
            "INSERT INTO news(titulo, slug, destacada, extracto, keywords, data_new, body, categoria_id, status, create_at, update_at)
            VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, %d, '%s', '%s')",
            trim($request['titulo']),
            trim($request['slug']),
            $name_file,
            trim($request['extracto']),
            trim($request['keywords']),
            $this->db->db_limpia_cadena_sql($request['data_new']),
            $this->db->db_limpia_cadena_sql($request['body']),
            intval($request['categoria_id']),
            intval($request['status']),
            $this->generales->hoy(),
            $this->generales->hoy()
        );
        
        if (!$new_id = $this->db->db_query($sql, 2))
            return false;
        
        return trim($request['slug']);
    }

    public function editar_new($request, $file)
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
            "UPDATE news
            SET
                titulo = '%s',
                slug = '%s',
                destacada = '%s',
                extracto = '%s',
                keywords = '%s',
                data_new = '%s',
                body = '%s',
                categoria_id = '%s',
                status = %d,
                update_at = '%s'
            WHERE
                id = %d",
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['titulo'])),
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['slug'])),
            $name_file,
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['extracto'])),
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['keywords'])),
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['data_new'])),
            $this->db->db_limpia_cadena_sql($request['body']),
            $this->db->db_limpia_cadena_sql($this->generales->limpia_caracteres_to_ascii($request['categoria_id'])),
            intval($request['status']),
            $this->generales->hoy(),
            $request['id_post']
        );

        if (!$response = $this->db->db_query($sql, 3))
            return false;


        return $response;
    }

    public function elimina_new($slug)
    {
        if (empty($slug) || $slug == "")
            return false;

        $sql = sprintf(
            "UPDATE news
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
