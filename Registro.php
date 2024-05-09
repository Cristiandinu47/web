<?php
  session_start();
  require_once('Funciones/Funciones.php');

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $valores_campos=[
        'nombre' => 'Nombre',
        'apellido' => 'Apellido',
        'usuario' => 'Usuario',
        'email' => 'Email',
        'contraseña' => 'Contraseña',
        'recontraseña' => 'Re-contraseña'
    ];

    $errores = validar($valores_campos);

    $errores = array_merge($errores, comparaclaves($_POST['contraseña'],$_POST['recontraseña']));

    if(empty($errores)){
      $errores = registro();
  }
}

  require_once('Bloques/P-arriba.php');
  require_once('Bloques/Navegador.php');
  require_once('conexion.php');

?>
<header>
  <div class="bg-primary bg-gradient text-white" id ="pagina de registro">
    <div class="row vh-100 justify-content-center">
      <div class="col-auto bg-ligth p-5">
        <h1 class="titulo-de-pagina">Pagina de Registro</h1>

        <hr>

        <?php if(!empty($errores)){echo mostrarErrores($errores); }?>



        <form method="POST">
                <h2> Registrate <small> para formar parte </small></h2>
                <hr>

                <div class ="row">
                  <div class="col-sm-6">
                    <div class="input-group p-2">
                    <input type="text" class="form-control input-lg" name="nombre" value ="<?php echo $_POST['nombre'] ?? ''?>" placeholder="Nombre" tabindex="1" autofocus>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group p-2">
                      <input type="text" class="form-control input-lg" name="apellido" value ="<?php echo $_POST['apellido'] ?? ''?>" placeholder="Apellido" tabindex="2" >
                    </div>
                  </div>
                </div>

                <div class ="row">
                  <div class="col-sm-12">
                    <div class="input-group p-2">
                    <input type="text" class="form-control input-lg" name="usuario" value ="<?php echo $_POST['usuario'] ?? ''?>" placeholder="Usuario" tabindex="3" >
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-group p-2">
                      <input type="email" class="form-control input-lg" name="email" value ="<?php echo $_POST['email'] ?? ''?>" placeholder="Email" tabindex="4" >
                    </div>
                  </div>
                </div>

                <div class ="row">
                  <div class="col-sm-6">
                    <div class="input-group p-2">
                    <input type="password" class="form-control input-lg" name="contraseña" placeholder="Contraseña" tabindex="5" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group p-2">
                      <input type="password" class="form-control input-lg" name="recontraseña" placeholder="ReContraseña" tabindex="6" >
                    </div>
                  </div>
                </div>

                <hr>

                  <div class="col-sm-6">
                    <button type="submit" class="btn.btn-success.btn-lg.btn-block" name="Registrar" tabindex="7">Registrar</button>
                  </div>
                </div>
          </form>
</header>
<?php               
require_once('Bloques\PiePag.php');
require_once('Bloques\P-abajo.php');

?>        
