<?
include_once(URL_SERVIDOR . '/class/db.php');
include_once(URL_SERVIDOR . '/class/generales.php');

class admin
{
    function __construct()
    {
        $this->db = new db();
        $this->generales = new generales();
    }

    public function login($request = "")
    {
        if (!is_array($request) || empty($request['mail']) || empty($request['password']))
            return false;

        if (!$password = $this->pwd_verify($request['password'], $request['mail']))
            return false;

        $sql = sprintf(
            "SELECT
                    u.id,
                    u.nombre,
                    u.correo
                FROM
                    users AS u
                WHERE
                    u.correo = '%s'
                ",
            $this->db->db_limpia_cadena_sql($request['mail'])
        );

        if (!$response = $this->db->db_query($sql, 1))
            return false;

        return $response;
    }

    //Verificar pasword
    public function pwd_verify($password = '', $mail = '')
    {
        $sql_select = sprintf(
            "SELECT 
                    contrasena
                FROM
                    users 
                WHERE
                    correo = '%s'",
            $mail
        );

        if (!$array = $this->db->db_query($sql_select, 1))
            return false;

        $hash = trim($array[0]['contrasena']);
        $pass = trim($password);

        $verify = password_verify($pass, $hash);

        if (!$verify)
            return false;

        return true;
    }

    public function configuracion_detalle(){
        $sql = sprintf(
            "SELECT * FROM configuracion"
        );

        if (!$array_configuracion = $this->db->db_query($sql, 1))
            return false;
        
        return $array_configuracion[0];
    }

    public function configuracion_edita($request){
        
        $sql = sprintf(
            "UPDATE configuracion
            SET
                proyecto = '%s',
                url = '%s',
                keywords = '%s',
                descripcion = '%s'
            WHERE 
                id = 1",
            $request['nombre_proyecto'],
            $request['dominio'],
            $request['keywords'],
            $request['description']
        );

        if (!$response = $this->db->db_query($sql, 3))
            return false;
        
        return true;
    }
    
}
