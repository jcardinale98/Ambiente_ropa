<?php

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
  <script src="../js/script.js"></script>
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