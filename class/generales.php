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

    function fecha_formato_humano ( $fecha = "" )
	{
		if($fecha == "" )
			return false;
	
		$arr_fechafull = explode(" ",$fecha);
	
		$arr_fecha = explode("-",$arr_fechafull[0]);
		
		$arr_dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$arr_meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		 
		return $arr_dias[$arr_fecha[2]]." ".$arr_fecha[2]." de ".$arr_meses[$arr_fecha[1]-1]. " del ".$arr_fecha[0] ;
	}

    //Limpia una cadena
    public function limpia_string($string = "")
    {
        if ($string == "")
            return false;

        return mb_eregi_replace("[^ A-Za-z0-9_\.]", "", $string);
    }

    public function keys_to_works($array)
    {
        $key_name = array_keys($array);

        for ($i = 0; $i < count($key_name); $i++) {
            $format_name = str_replace('_', ' ', $key_name[$i]);
            $nombres_label[] = ucfirst($format_name);
        }

        return $nombres_label;
    }

    //Corta una cadena sin cortar palabras
    public function corta_cadena( $txt = "" , $long = 0, $break = " ", $pad="...")
	{
		if(strlen($txt) <= $long)
		return $txt;
		// is $break present between $long and the end of the txt?
		if(false !== ($breakpoint = strpos($txt, $break, $long))) {
		if($breakpoint < (strlen($txt) - 1) ) {
		$txt = substr($txt, 0, $breakpoint) . $pad;
		}
		}
		return $txt;
	}
    
}
