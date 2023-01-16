<?
class generales
{

    //Hash para pasword
    public function pwd_generate($data = '')
    {
        $options = [
            $cost = 10,
        ];
        $password = trim($data);
        $password = password_hash($password, PASSWORD_DEFAULT);

        return $password;
    }


    //fecha actual
    public function hoy()
    {
        date_default_timezone_set('America/Mexico_City');
        return date('Y-m-d H:i:s', time());
    }

    //Limpia una cadena
    public function limpia_string($string = "")
    {
        if ($string == "")
            return false;

        return mb_eregi_replace("[^ A-Za-z0-9_\.]", "", $string);
    }

    //Limpia una cadena
	public function limpia_cadena($cadena = "")
	{
		if ( $cadena == "" )
			return false;
		
		return mb_eregi_replace("[^ A-Za-z0-9_\.]", "", $cadena);
	}

    //Sanitiza caracteres ascii
    function limpia_caracteres_to_ascii( $cadena = "" )
	{
		if( empty($cadena) )
			return false;

		$mensaje = str_replace("=","",$cadena);
		$mensaje = str_replace("\"","",$mensaje); 
		$mensaje = str_replace("'","&#39;",$mensaje); 

		return $mensaje;
	}

}
