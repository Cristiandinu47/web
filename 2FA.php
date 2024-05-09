<?php
declare(strict_types=1);
require 'vendor/autoload.php';
$secret = 'XVQ2UIGO75XRUKJO';
$link = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('UJI-SECURiTY',
     $secret, '2FA');

$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

if(isset($_POST['submit'])){
    $code = $_POST['pass-code'];
    
    if($g->checkCode($secret, $code)){
      header('Location: perfil.php');
    }else{
      echo 'Invalid code';
    }
          
}


  session_start();
  //$_SESSION ['usuario'] = "Cristian";

require_once('Bloques\P-arriba.php');
require_once('conexion.php');



?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="">UJI-SECURITY</a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse navbar-right" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">INICIO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">CONTACTO</a>
                  </li>
                  
                  

                  <?php
                    if(isset($_SESSION['usuario'])) {
                      echo '
                        
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                USUARIO
                              </a>
                              <ul class="dropdown-menu">
                              
                                <li><a class="dropdown-item" href="">Mi perfil</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
                              </ul>
                        </li>
                      ';
                    }
                    else {
                      echo '
                          <li class="nav-item">
                          <a class="nav-link" href="Login.php">LOGIN</a>
                          </li>
                          <li class="nav-item">
                          <a class="nav-link" href="Registro.php">REGISTRO</a>
                          </li>
                      ';
                    }             
                  ?>
                
              
                </ul>
              </div>
            </div>
          </nav>

 <header>
    <title>Learn Web Coding > Two Factor Authentication using
    Google Authentication </title>
    <link rel="stylesheet" type="text/css" href="../library/css/
    bootstrap min.css"/>
     <script type= "text/javascript" src="../library/js/
    jquery-3.2.1.min.js"></script>
</header>
 <body>
    <div class= "container well">
         <h1 class="text-center">Bienvenido a la autentificación en dos pasos</h1>
        
        <div style="width: 50%; margin: 10px auto;">
                <center><img src="<?=$link;?>"> </center><br>
                 <p class-"text-justify"
                    Please install <strong>Descarga La aplicacion de Google Authentificator 
                      para tu telefono o tableta y escanea el QR. 
                      Una vez descargada y escaneado el QR introduce el codigo de verificacion.
                  </p>
                  
                  <form action="" method= "post" class= "form-horizontal">
                      <div class="form-group">
                      <div class= "input-group">
                          <div class=" input-group-addon addon-diff-color">
                              <span class="glyphicon glyphicon-lock"></span>
                          </div>
                          <input type= "text" autocomplete= "off"
                          class= "form-control" name= "pass-code"
                          placeholder="Introduce el codigo">
                      </div>
                    </div>
                    <div class="form-group text-center">
                      <input type ="submit" value ="Validar" class="btn btn-warning btn-block" name ="submit">
                      </div>
                  </form>
                </div>
                
</div>

<div style ="position: fixed; bottom: 10px; right: 10px; color: green;">

<strong>
  Learn Web Coding
</strong>
</div>

</body>

</html>
<?php
 
require_once('Bloques\PiePag.php');
require_once('Bloques\P-abajo.php');

?>        
   
