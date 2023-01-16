<?
$errores = 0;

if( intval($errores) == 1)
{
    ini_set ('display_errors', 'on');
    ini_set ('log_errors', 'on');
    ini_set ('display_startup_errors', 'on');
    ini_set ('error_reporting', E_ALL);
}
else
{
    error_reporting(0);
}
/* echo '<pre>';
print_r($_SERVER);
echo '</pre>'; */
define("URL_SERVIDOR", dirname(__FILE__));
define("URL_FILES", dirname(__FILE__) . '/userfiles/');
define("URL_DOMINIO", $_SERVER['SCRIPT_URI']);

define("DB_SERVERNAME", "localhost");
define("DB_NAME", "");
define("DB_USERNAME", "");
define("DB_PASSWORD", "");