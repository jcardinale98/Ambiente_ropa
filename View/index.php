<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ultras - Clothing Store eCommerce Store HTML Website Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">

  <meta name="description" content="">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" media="all"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/vendor.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <!-- script
    ================================================== -->
  <script src="js/modernizr.js"></script>
</head>

<body>

  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>

  <div class="search-popup">
    <div class="search-popup-container">

      <form role="search" method="get" class="search-form" action="">
        <input type="search" id="search-form" class="search-field" placeholder="Escribe y presiona Enter" value=""
          name="s" />
        <button type="submit" class="search-submit"><a href="#"><i class="icon icon-search"></i></a></button>
      </form>

      <h5 class="cat-list-title">Explora Categorías</h5>

      <ul class="cat-list">
        <li class="cat-list-item">
          <a href="shop.html" title="Men Jackets">Chaquetas para hombre</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Fashion">Fashion</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Casual Wears">Ropa Casual</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Women">Mujer</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Trending">Tendencias</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Hoodie">Hoodie</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Kids">Niños</a>
        </li>
      </ul>
    </div>
  </div>
  <header id="header">
    <div id="header-wrap">
      <nav class="secondary-nav border-bottom">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-4 header-contact">
              <p>¡Contáctanos!<strong>+506 8888-7777</strong>
              </p>
            </div>
            <div class="col-md-4 shipping-purchase text-center">
              <p>Envío gratis en compras superiores a $200</p>
            </div>
            <div class="col-md-4 col-sm-12 user-items">
              <ul class="d-flex justify-content-end list-unstyled">
                <li>
                  <a href="login.php">
                    <i class="fa fa-user fa-lg"></i>
                  </a>
                </li>
                <li>
                  <a href="cart.html">
                    <i class="fa fa-shopping-cart fa-lg"></i>
                  </a>
                </li>
                <li>
                  <a href="wishlist.html">
                    <i class="fa fa-heart fa-lg"></i>
                  </a>
                </li>
                <li class="user-items search-item pe-3">
                  <a href="#" class="search-button">
                    <i class="fa fa-search fa-lg"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <nav class="primary-nav padding-small">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-lg-2 col-md-2">
              <div class="main-logo">
                <a href="index.html">
                  <img src="images/main-logo.png" alt="logo">
                </a>
              </div>
            </div>
            <div class="col-lg-10 col-md-10">
              <div class="navbar">

                <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                  <ul class="menu-list">

                    <li class="menu-item has-sub">
                      <a href="index.html" class="item-anchor active d-flex align-item-center"
                        data-effect="Home">Inicio<i class="icon icon-chevron-down"></i></a>
                    </li>



                    <li class="menu-item has-sub">
                      <a href="shop.html" class="item-anchor d-flex align-item-center" data-effect="Shop">Tienda<i
                          class="icon icon-chevron-down"></i></a>
                      <ul class="submenu">
                        <li><a href="shop.html" class="item-anchor">Catálogo</a></li>
                        <li><a href="cart.html" class="item-anchor">Carrito</a></li>
                        <li><a href="wishlist.html" class="item-anchor">Lista de Deseos</a></li>
                        <li><a href="checkout.html" class="item-anchor">Checkout</a></li>
                      </ul>
                    </li>

                    <li class="menu-item has-sub">
                      <a href="#" class="item-anchor d-flex align-item-center" data-effect="Pages">Ingresa a tu cuenta<i
                          class="icon icon-chevron-down"></i></a>
                      <ul class="submenu">
                        <li><a href="login.php" class="item-anchor">Login</a></li>


                      </ul>
                    </li>



                  </ul>
                </div>

              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <section id="billboard" class="overflow-hidden">
    <button class="button-prev">
      <i class="icon icon-chevron-left"></i>
    </button>
    <button class="button-next">
      <i class="icon icon-chevron-right"></i>
    </button>
    <div class="swiper main-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="
              background-image: url(&quot;images/banner1.jpg&quot;);
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center;
            ">
          <div class="banner-content">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h2 class="banner-title">Colección de Verano</h2>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Sed eu feugiat amet, libero ipsum enim pharetra hac.
                  </p>
                  <div class="btn-wrap">
                    <a href="shop.html" class="btn btn-light btn-medium d-flex align-items-center" tabindex="0">Compra
                      ahora <i class="icon icon-arrow-io"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide" style="
              background-image: url(&quot;images/banner2.jpg&quot;);
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center;
            ">
          <div class="banner-content">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h2 class="banner-title">Colección Casual</h2>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Sed eu feugiat amet, libero ipsum enim pharetra hac.
                  </p>
                  <div class="btn-wrap">
                    <a href="shop.html" class="btn btn-light btn-light-arrow btn-medium d-flex align-items-center"
                      tabindex="0">Compra ahora <i class="icon icon-arrow-io"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>






  <section id="brand-collection" class="padding-medium bg-light-grey">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between">
        <img src="images/brand1.png" alt="phone" class="brand-image" />
        <img src="images/brand2.png" alt="phone" class="brand-image" />
        <img src="images/brand3.png" alt="phone" class="brand-image" />
        <img src="images/brand4.png" alt="phone" class="brand-image" />
        <img src="images/brand5.png" alt="phone" class="brand-image" />
      </div>
    </div>
  </section>
-------------------------------------------------------------catalogo de productos------------------------------------------------------------

  <section id="shipping-information">
    <hr />
    <div class="container">
      <div class="row d-flex flex-wrap align-items-center justify-content-between">
        <div class="col-md-3 col-sm-6">
          <div class="icon-box">
            <i class="icon icon-truck"></i>
            <h4 class="block-title">
              <strong>Envío gratis</strong> en compras sobre $200
            </h4>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="icon-box">
            <i class="icon icon-return"></i>
            <h4 class="block-title">
              <strong>Devolución del dinero</strong> en 7 días
            </h4>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="icon-box">
            <i class="icon icon-tags1"></i>
            <h4 class="block-title">
              <strong>Compra 4 y lleva el 5º</strong> al 50% de descuento
            </h4>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="icon-box">
            <i class="icon icon-help_outline"></i>
            <h4 class="block-title">
              <strong>¿Preguntas?</strong> Nuestros expertos te ayudan
            </h4>
          </div>
        </div>
      </div>
    </div>
    <hr />
  </section>



  ------------------------------------------------------------General Footer------------------------------------------------------------
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
            <img src="images/visa-icon.jpg" alt="visa" />
            <img src="images/mastercard.png" alt="mastercard" />
            <img src="images/american-express.jpg" alt="american-express" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
</body>

</html>