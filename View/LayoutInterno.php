<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/InicioController.php';


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
function ImportCSS()
{
  echo '
        <head>
  <title>Ultras - Clothing Store eCommerce Store HTML Website Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">

  <meta name="description" content="">

  <link rel="stylesheet" type="text/css" href="../css/normalize.css">
  <link rel="stylesheet" type="text/css" href="../css/vendor.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <link rel="stylesheet" type="text/css" media="all"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <!-- script
    ================================================== -->
    <script src="../js/modernizr.js"></script>
</head>
    ';
}

function ImportJS()
{
  echo '
          <script src="../js/jquery-1.11.0.min.js"></script>
<script src="../js/plugins.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/script.js"></script>
    ';
}

function HeaderInfo()
{
  $nombreUsuario = "";
  $nombreRol = "";

  if (isset($_SESSION["NombreUsuario"])) {
    $nombreUsuario = $_SESSION["NombreUsuario"];
    $nombreRol = isset($_SESSION["NombreRol"]) ? $_SESSION["NombreRol"] : "";
  } else {
    header("Location: login.php");
    exit();
  }

  echo '
   <header id="header">

    <div id="header-wrap">

        <!-- Barra superior -->
        <nav class="secondary-nav border-bottom py-2">
            <div class="container">

                <div class="row align-items-center">

                    <!-- Contacto -->
                    <div class="col-lg-4 d-none d-lg-block">
                        <span class="text-muted">
                            <i class="fa fa-phone me-2"></i>
                            +506 8888-7777
                        </span>
                    </div>

                    <!-- Mensaje -->
                    <div class="col-lg-4 text-center">
                        <span class="fw-semibold">
                            🚚 Envío gratis en compras mayores a <strong>$200</strong>
                        </span>
                    </div>

                    <!-- Usuario -->
                    <div class="col-lg-4">

                        <ul class="d-flex justify-content-end align-items-center list-unstyled mb-0">

                            <li class="me-3">
                                <a href="cart.html" title="Carrito">
                                    <i class="fa fa-shopping-cart fa-lg"></i>
                                </a>
                            </li>

                            <li class="me-3">
                                <a href="wishlist.html" title="Favoritos">
                                    <i class="fa fa-heart fa-lg"></i>
                                </a>
                            </li>

                            <li class="me-3">
                                <a href="#" class="search-button" title="Buscar">
                                    <i class="fa fa-search fa-lg"></i>
                                </a>
                            </li>


                            
                        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle d-flex align-items-center text-decoration-none"
       href="#"
       id="dropdownUsuario"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false">
        <div class="rounded-circle bg-dark text-white d-flex justify-content-center align-items-center"
             style="width:40px;height:40px;">
            <i class="fa fa-user"></i>
        </div>
        <div class="ms-2 text-start">
            <div class="fw-bold" style="font-size:14px;">
                <?php echo $nombreUsuario; ?>
            </div>
            <small class="text-muted">
                <?php echo $nombreRol; ?>
            </small>
        </div>
    </a>

    <ul class="dropdown-menu dropdown-menu-end shadow p-2" aria-labelledby="dropdownUsuario">
        <li>
            <a class="dropdown-item rounded py-2" href="../vUsuario/CambiarPerfil.php">
                <i class="fa fa-user me-2"></i> Mi perfil
            </a>
        </li>
        <li>
            <a class="dropdown-item rounded py-2" href="../vUsuario/CambiarContrasenna.php">
                <i class="fa fa-lock me-2"></i> Seguridad
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <form method="POST" class="m-0">
                <button type="submit"
                        class="dropdown-item rounded py-2 w-100 text-start border-0 bg-transparent"
                        name="btnSalir">
                    <i class="fa fa-sign-out me-2"></i> Cerrar sesión
                </button>
            </form>
        </li>
    </ul>
</li>
                        </ul>

                    </div>

                </div>

            </div>
        </nav>

    </div>

</header>
    ';
}


function FooterInfo()
{



  echo '
        <footer id="footer">
    <div class="container">
      <div class="footer-menu-list">
        <div class="row d-flex flex-wrap justify-content-between">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h1 class="widget-title">Ultras</h1>
              <ul class="menu-list list-unstyled">
                
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Servicio al Cliente</h5>
              <p>
                Somos una marca de ropa comprometida con el estilo y la calidad.
                Para consultas o pedidos, puede escribirnos al correo: contacto@ultras.com
              </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Contáctanos</h5>
              <p>
                ¿Tienes alguna pregunta o sugerencia?
                <a href="#" class="email">nuestrosservicios@ultras.com</a>
              </p>
              <p>
                ¿Necesitas ayuda? Llámanos. <br />
                <strong>+506 2026 1182</strong>
              </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Desde 2026</h5>
              <p>
                Somos una marca de ropa que combina estilo moderno con comodidad.
                Diseñamos prendas únicas para quienes buscan expresar su personalidad
                a través de la moda, cuidando cada detalle y ofreciendo calidad en cada colección.
              </p>
              <div class="social-links">
                <ul class="d-flex list-unstyled">
                  <li>
                    <a href="#">
                      <i class="icon icon-facebook"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="icon icon-twitter"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="icon icon-youtube-play"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="icon icon-behance-square"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />
  </footer>

  <div id="footer-bottom">
    <div class="container">
      <div class="d-flex align-items-center flex-wrap justify-content-between">
        <div class="copyright">
          <p>
            ULTRAS &copy; 2026. Todos los derechos reservados.
          <p>Desarrollado por el equipo 3</p>
          <p></p>
          </p>
        </div>
        <div class="payment-method">
          <p>Opciones de Pago :</p>
          <div class="card-wrap">
            <img src="../images/visa-icon.jpg" alt="visa" />
            <img src="../images/mastercard.png" alt="mastercard" />
            <img src="../images/american-express.jpg" alt="american-express" />
          </div>
        </div>
      </div>
    </div>
  </div>

    ';
}
