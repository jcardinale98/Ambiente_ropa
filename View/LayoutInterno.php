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
  echo '<script src="/Ambiente_ropa/View/js/jquery-1.11.0.min.js"></script>
        <script src="/Ambiente_ropa/View/js/plugins.js"></script>
        <script src="/Ambiente_ropa/View/js/script.js?v=2"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  ';
}

function HeaderInfo()
{
  $nombreUsuario = "";
  $nombreRol = "";
  $nombreProducto = "";
  $menuAdministracion = "";

if (
    !isset($_SESSION["ConsecutivoUsuario"])
    || !isset($_SESSION["NombreUsuario"])
    || !isset($_SESSION["RolUsuario"])
)
{
    header("Location: /Ambiente_ropa/View/vInicio/login.php");
    exit();
}

$nombreUsuario = $_SESSION["NombreUsuario"];
$nombreRol = $_SESSION["RolUsuario"];
  if (isset($_POST["nombreProducto"])) {
    $nombreProducto = $_POST["nombreProducto"];
  }
 
  echo '
   <header id="header">

    <div id="header-wrap">

        <!-- Barra superior -->
        <nav class="secondary-nav border-bottom py-2">
            <div class="container-fluid px-5">

                <div class="row align-items-center">

                    <!-- Contacto -->
                    <div class="col-lg-2 d-none d-xl-block">
                        <span class="text-muted">
                            <i class="fa fa-phone me-2"></i>
                            +506 8888-7777
                        </span>
                    </div>

                    <!-- Mensaje -->
                    <div class="col-lg-3 text-center text-nowrap">
                        <span class="fw-semibold">
                            🚚 Envío gratis en compras mayores a <strong>$200</strong>
                        </span>
                    </div>
                      <div class="col-lg-3 d-flex align-items-center">

                          <form class="buscador-navbar d-flex align-items-center w-100 mb-0"
                                method="POST"
                                action="/Ambiente_ropa/View/vInicio/Principal.php">

                              <input class="form-control me-2 mb-0"
                                    type="search"
                                    name="nombreProducto"
                                    placeholder="Buscar producto..."
                                    aria-label="Buscar producto"
                                    value="' . htmlspecialchars($nombreProducto) . '">

                              <input type="hidden"
                                    name="consecutivoCategoria"
                                    value="0">

                              <button class="btn btn-outline-dark m-0"
                                      type="submit"
                                      name="btnBuscarProductos">
                                  <i class="fa fa-search"></i>

                              </button>

                          </form>

                      </div>

                    <!-- Usuario -->
                    <div class="col-lg-3 d-flex justify-content-end align-items-center">

                        <ul class="nav justify-content-end align-items-center mb-0">
                            
                            <li>
                                <a href="/Ambiente_ropa/View/vInicio/Carrito.php" title="Carrito">
                                    <i class="fa fa-shopping-cart fa-lg"></i>
                                </a>
                            </li>

                            <li>
                                <a href="wishlist.html" title="Favoritos">
                                    <i class="fa fa-heart fa-lg"></i>
                                </a>
                            </li>
                       
                            
                        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle js-dropdown-toggle d-flex align-items-center text-decoration-none"
       href="#"
       id="dropdownUsuario"
       role="button"
       aria-expanded="false">
        <div class="rounded-circle bg-dark text-white d-flex justify-content-center align-items-center"
             style="width:40px;height:40px;">
            <i class="fa fa-user"></i>
        </div>
        <div class="ms-2 text-start">
            <div class="fw-bold" style="font-size:14px;">
                ' . $nombreUsuario . '
</div>
<small class="text-muted">
  ' . $nombreRol . '
</small>
</div>
</a>

<ul class="dropdown-menu dropdown-menu-end shadow p-2" aria-labelledby="dropdownUsuario">
  <li>
    <a class="dropdown-item rounded py-2" href="/Ambiente_ropa/View/vInicio/Perfil.php">
      <i class="fa fa-user me-2"></i> Mi perfil
    </a>
  </li>
  
  <li>
    <hr class="dropdown-divider">
  </li>
  <li>

      <a class="dropdown-item rounded py-2"
         href="/Ambiente_ropa/Controller/CerrarSessionController.php">
        <i class="fa fa-sign-out me-2"></i> Cerrar sesión
      </a>
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