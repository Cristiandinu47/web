<?php
  session_start();
  //$_SESSION ['usuario'] = "Cristian";

require_once('Bloques\P-arriba.php');
require_once('Bloques\Navegador.php');
require_once('conexion.php');

?>

<header>
<div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-with-icon" 
  style="
    height: 100vh;
  "
>
 <!-- Masthead Avatar Image-->
 <img class="rounded-circle" alt="avatar1" src="imag/avatargif.gif" />
 <br>
</br>
<div class="card border-5 border-danger" 
         style="background-image: url('imag/segfondo.jpg');">
         <h1 class="font-weight-bold text-white">Bienvenido a tu perfil <?php
      if (isset($_SESSION['usuario'])) {
        echo'
          
          <p>' .$_SESSION['usuario'].'</p>';

      }
    ?> </h1>
           
</div>
</div>
</header>
<?php
 
require_once('Bloques\PiePag.php');
require_once('Bloques\P-abajo.php');

?>