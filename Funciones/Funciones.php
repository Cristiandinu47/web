<?php

      function registro(){
            require_once('conexion.php');

            $errores=duplicacion($con);

            if (!empty($errores)) {
                return $errores;
            }

            $nombre = limpiar($_POST['nombre']);
            $apellido = limpiar($_POST['apellido']);
            $usuario = limpiar($_POST['usuario']);
            $email = limpiar($_POST['email']);
            $contraseña = limpiar($_POST['contraseña']);

            $pass = password_hash($contraseña,PASSWORD_DEFAULT);
            $dec = $con -> prepare ("INSERT INTO perfiles (Nombre,Apellido,Usuario,Contraseña,Email) VALUES(?,?,?,?,?)");
            $dec -> bind_param('sssss',$nombre,$apellido,$usuario,$pass,$email);
            $dec -> execute();
            $result = $dec -> affected_rows;
            $dec -> free_result();
            $dec -> close();
            $con -> close();

            if($result==1){
                  $_SESSION['usuario'] = $usuario;
                  header("Location: login.php");
                  }
                  else{
                      $errores[]="error";
            }
            return $errores;
      }
      

      function duplicacion($con){

            $errores=[];

            $usuario = limpiar($_POST['usuario']);
            $email = limpiar($_POST['email']);

            $dec = $con -> prepare ("SELECT Usuario,Email FROM perfiles WHERE (Usuario =?) or (Email =?)");
            $dec -> bind_param('ss',$usuario,$email);
            $dec -> execute();
            $result = $dec -> get_result();
            $cant = mysqli_num_rows($result);
            $lin = $result -> fetch_assoc();
            $dec -> free_result();
            $dec -> close();

            if($cant > 0) {

                  if($_POST['usuario']==$lin['Usuario']){
                        $errores[] = "Nombre de usuario ya en uso.";
                  }
                  if($_POST['email']==$lin['Email']){
                        $errores[] = "Correo electronico ya registrado.";
                  }

            }



            return $errores;
      }



      function login(){
            require_once('conexion.php');
            $errores=[];

            $usuario = limpiar($_POST['usuariooemail']);
            $contraseña = limpiar($_POST['contraseña']);

            $dec = $con -> prepare ("SELECT Usuario,Contraseña FROM perfiles WHERE (Usuario=?) or (Email=?)");
            $dec -> bind_param('ss',$usuario,$usuario);
            $dec -> execute();
            $result = $dec -> get_result();
            $cant = mysqli_num_rows($result);
            $lin = $result -> fetch_assoc();
            $dec -> free_result();
            $dec -> close();
            $con -> close();

            if($cant==1){
                  $_SESSION['usuario'] = $lin['Usuario'];
                  header("Location: 2FA.php");
            }
            else{
                  $errores[] = " El usuario o la contraseña no es correcta 2."; 
            }
            return $errores;
      }      
      

      function limpiar($datos) {
            $datos = trim($datos);
            $datos = stripcslashes($datos);
            $datos = htmlspecialchars($datos);
            return $datos;
      }

      function mostrarErrores($errores){
            $erroresmostrados='<div class="alert alert-danger errores"><ul>';
            foreach ($errores as $error){
                  $erroresmostrados.= '<li>'.htmlspecialchars($error).'</li>';
            }
            $erroresmostrados.= '</ul></div>';
            return $erroresmostrados;
      }

      function validar($valores_campos){

            $errores =[];
            foreach($valores_campos as $nombre => $mostrar_pantalla){
                  if(!isset($_POST[$nombre]) || $_POST[$nombre] == NULL){
                        $errores[] = $mostrar_pantalla . ' es un campo obligatorio';

                  }
                  else{
                        $val = campos();
                        foreach ($val as $campo => $opcion){
                              if($nombre == $campo){
                                    if(!preg_match($opcion['patron'], $_POST[$nombre])){

                                          $errores[]= $opcion['error'];


                                    }

                              }

                        }
                  }
            }

            return $errores;

      }


      function campos(){
            $validacion = [
                 'nombre' => [ 
                         'patron' => '/^[a-z\s]{2,50}$/i',
                         'error'  => 'Nombre solo puede contener letras y espacios en blanco.'
                 ],
                 'apellido' => [ 
                        'patron' => '/^[a-z\s]{2,50}$/i',
                        'error'  => 'Apellido solo puede contener letras y espacios en blanco.'
                  ],
                  'usuario' => [ 
                        'patron' => '/^[a-z][\w]{3,30}$/i',
                        'error'  => 'Usuario debe contener un minimo de 4 caracteres incluidos letras y espacios en blanco.'
                  ],
                  'contraseña' => [ 
                        'patron' => '/^[a-z\s]{5,30}$/i',
                        'error'  => 'La contraseña debe tener una longitud entre 5 y 30 palabraas.'
                  ],
                  'usuariooemail' => [ 
                        'patron' => '/(?=^[a-z]+[\w@\.]{2,50}$)/i',
                        'error'  => 'La contraseña debe tener una longitud entre 5 y 30 palabraas.'
                    ],

            ];

            return $validacion;
      }

      function comparaclaves($contraseña,$recontraseña){
            $errores=[];
            if($contraseña !== $recontraseña){
                  $errores[] = 'Las contraseñas no coinciden';
      }
      return $errores;
} 
?>

