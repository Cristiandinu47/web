<?php
  session_start();
  //$_SESSION ['usuario'] = "Cristian";

require_once('Bloques/P-arriba.php');
require_once('Bloques/Navegador.php');
require_once('conexion.php');

?>

<br>
<div

class="d-flex align-items-center bg-primary bg-gradient p-2 text-white bg-opacity-60 ">
<h1 class="masthead-avatar mb-5 p-3 display-1 text-white">UJI SECURiTY</h1>
            <!-- Masthead Avatar Image-->
            <img class="rounded-circle" alt="avatar1" src="imag/security2.jpg" />
            <!-- Masthead Heading-->



</div>

<div

class="text-center bg-gradient bg-warning" >
<h3>
  <?php
      if (isset($_SESSION['usuario'])) {
        echo'
          
          <p> Bienvenido ' .$_SESSION['usuario'].'</p>';
      }
      else {
        echo'
          <p>Por favor <a href="Registro.php" class="text-succes" >Regístrate</a> 
          o haz <a href="Login.php" class="text-succes" >Login</a></p>';
      }
    ?>
</h3>
</div>
<?php
require_once('Bloques/PiePag.php');
require_once('Bloques/P-abajo.php');

?>        
