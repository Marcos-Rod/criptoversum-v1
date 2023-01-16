<?
ini_set('display_errors', 'on');
ini_set('log_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('error_reporting', E_ALL);

session_start();

$mensaje = 0;

if ( !empty($_POST)) {
    define("URL_SERVIDOR", dirname(__FILE__));

    include_once( URL_SERVIDOR . "/class/admin.php" );
    $admin = new admin();
    
    $data = array();
    $data['mail'] = $_POST['mail'];
    $data['password'] = $_POST['password'];

    if ($response = $admin->login( $data )) {
        $_SESSION['anombre'] = $response[0]["nombre"];
        $_SESSION['admin_id'] = $response[0]["id"];
        $_SESSION['amail'] = $response[0]["correo"];
        $_SESSION['aauth'] = 1;

        header('Location: index.php');
        exit;

    }else{
        $mensaje = 1;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador CriptoVersum</title>

    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./css/user.css">
</head>
<body>
    <div class="vh-100 vw-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row ">
                
                <div class="login-form offset-md-3 col-md-6 offset-lg-4 col-lg-4 card py-5 px-4">
                    <p class="text-center mb-5"><img src="../img/logo.png" alt="Credito Financiera Mexicna" class="img-fluid" width="100"></p>
                    <form action="login.php" method="POST" id="login">
                        <div class="input-group mb-3">
                            <label for="mail">
                                <i class="bi bi-envelope-fill fs-4 px-2"></i>
                            </label>
                            <input type="email" name="mail" id="mail" placeholder="Correo" class="form-control" />
                        </div>
                        <div class="input-group mb-4">
                            <label for="folio">
                                <i class="bi bi-lock fs-4 px-2"></i>
                            </label>
                            <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control" />
                        </div>
                        <?
                        if ($mensaje == 1) {
                            echo '<p class="error mb-0">Correo o contrase&ntilde;a incorrectos</p>';
                        }
                        ?>
                        <div class="input-group text-center justify-content-center">
                            <input type="submit" value="Iniciar sesión" class="btn btn-form text-white" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="../libs/jquery-validate/dist/jquery.validate.min.js"></script>
    <script src="./js/validate.js"></script>
</body>
</html>