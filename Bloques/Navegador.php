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