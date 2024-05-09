<?php
  session_start();
  //$_SESSION ['usuario'] = "Cristian";

require_once('Bloques/P-arriba.php');
require_once('Bloques/Navegador.php');
require_once('conexion.php');

?>
<br>
<div
class="container d-flex align-items-center flex-column">
<h1 class="masthead-avatar mb-5 p-3 display-1 text-black">NOTICIAS</h1>
<h3 class="masthead-avatar mb-5 p-3 text-black">Aquí podras leer algunas de nuestras noticias.</h3>
 
<table class="table">

<tr>
	<td><img src="imag/not1.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption text-center">Jun 13 2023 | Comentario (12)</figcaption>
  <figcaption class="figure-caption text-center text-warning bg-gradient bg-primary">LEER MÁS</figcaption></td>
	<td><img src="imag/not2.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption text-center">Nov 03 2023 | Comentario (8)</figcaption>
  <figcaption class="figure-caption text-center text-warning bg-gradient bg-primary">LEER MÁS</figcaption></td>
  <td><img src="imag/not3.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption text-center">Feb 19 2024 | Comentario (11)</figcaption>
  <figcaption class="figure-caption text-center text-warning bg-gradient bg-primary">LEER MÁS</figcaption></td>
</tr>
</table>



</div>
<?php
require_once('Bloques/P-abajo.php');

?>        
