<?php
  session_start();
  require_once('Funciones/Funciones.php');
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
    $valores_campos=[
          'usuariooemail' => 'Usuario o Email',
          'contraseña' => 'Contraseña'
    ];
  
    $errores = validar($valores_campos);
  
    if(empty($errores)){
      $errores = login();
    }
}
  
  require_once('Bloques/P-arriba.php');
  require_once('conexion.php');

?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">UJI-SECURiTY</a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse navbar-right" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">INICIO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Contacto.php">CONTACTO</a>
                  </li>
                  
                  

                  <?php
                    if(isset($_SESSION['usuario'])) {
                      echo '
                        
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                USUARIO
                              </a>
                              <ul class="dropdown-menu">
                              
                                <li><a class="dropdown-item" href="perfil.php">Mi perfil</a></li>
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
 <div class="bg-primary text-white" id ="pagina de Login">
    <div class="row vh-100 justify-content-center">
      <div class="col-auto bg-ligth p-5">
        <h1 class="titulo-de-pagina">Pagina de Login</h1>

        <hr>

        <?php if(!empty($errores)){echo mostrarErrores($errores); }?>


        <form method="POST">
            
                <div class="input-group p-2">
                    <input type="text" class="form-control input-lg" name="usuariooemail" value ="<?php echo $_POST['usuariooemail'] ?? ''?>" placeholder="Nombre de Usuario o Email" tabindex="4" >
                </div>
                
                <div class="input-group p-2">
                    <input type="password" class="form-control input-lg" name="contraseña" placeholder="Contraseña" tabindex="5" >
                </div>
                   
                <hr>

                <div class ="row">
                    <button type="submit" class="btn.btn-success.btn-lg.btn-block" name="Registrar" tabindex="7">Iniciar sesion</button>
                </div>
        </form>
      </div>
    </div>
  </div>    
</header>
<?php   
 
require_once('Bloques\PiePag.php');
require_once('Bloques\P-abajo.php');

?>        
