<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ultras - Clothing Store eCommerce Store HTML Website Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="author" content="">
  <meta name="keywords" content="">
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

                    <li><a href="about.html" class="item-anchor" data-effect="About">Sobre</a></li>

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
                      <a href="#" class="item-anchor d-flex align-item-center" data-effect="Pages">Página<i
                          class="icon icon-chevron-down"></i></a>
                      <ul class="submenu">
                        <li><a href="login.php" class="item-anchor">Login</a></li>
                        <li><a href="faqs.html" class="item-anchor">FAQs</a></li>
                        <li><a href="styles.html" class="item-anchor">Styles</a></li>
                        <li><a href="thank-you.html" class="item-anchor">Thankyou</a></li>
                        <li><a href="error.html" class="item-anchor">Error page<span class="text-primary">
                              (PRO)</span></a></li>
                      </ul>
                    </li>
                    <li class="menu-item has-sub">
                      <a href="blog.html" class="item-anchor d-flex align-item-center" data-effect="Blog">Blog<i
                          class="icon icon-chevron-down"></i></a>
                    </li>

                    <li><a href="contact.html" class="item-anchor" data-effect="Contact">Contact</a></li>

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

  <section id="featured-products" class="product-store padding-large">
    <div class="container">
      <div class="section-header d-flex flex-wrap align-items-center justify-content-between">
        <h2 class="section-title">Productos destacados</h2>
        <div class="btn-wrap">
          <a href="shop.html" class="d-flex align-items-center">Ver todos los productos <i
              class="icon icon icon-arrow-io"></i></a>
        </div>
      </div>
      <div class="swiper product-swiper overflow-hidden">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="product-item">
              <div class="image-holder">
                <img src="images/product-item1.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camisa manga larga</a>
                </h3>
                <span class="item-price text-primary">$40.00</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item">
              <div class="image-holder">
                <img src="images/product-item2.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camisa azul volunteer</a>
                </h3>
                <span class="item-price text-primary">$38.00</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item">
              <div class="image-holder">
                <img src="images/product-item3.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camisa amarilla</a>
                </h3>
                <span class="item-price text-primary">$44.00</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item">
              <div class="image-holder">
                <img src="images/product-item4.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Pantalón gris largo</a>
                </h3>
                <span class="item-price text-primary">$33.00</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <section id="latest-collection">
    <div class="container">
      <div class="product-collection row">
        <div class="col-lg-7 col-md-12 left-content">
          <div class="collection-item">
            <div class="products-thumb">
              <img src="images/collection-item1.jpg" alt="collection item" class="large-image image-rounded" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
              <div class="categories">Colección Casual</div>
              <h3 class="item-title">Moda Urbana</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Dignissim massa diam elementum.
              </p>
              <div class="btn-wrap">
                <a href="shop.html" class="d-flex align-items-center">Ver colección <i class="icon icon-arrow-io"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-12 right-content flex-wrap">
          <div class="collection-item top-item">
            <div class="products-thumb">
              <img src="images/collection-item2.jpg" alt="collection item" class="small-image image-rounded" />
            </div>
            <div class="col-md-6 product-entry">
              <div class="categories">Colección Básica</div>
              <h3 class="item-title">Zapatos básicos.</h3>
              <div class="btn-wrap">
                <a href="shop.html" class="d-flex align-items-center">Ver colección <i class="icon icon-arrow-io"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="collection-item bottom-item">
            <div class="products-thumb">
              <img src="images/collection-item3.jpg" alt="collection item" class="small-image image-rounded" />
            </div>
            <div class="col-md-6 product-entry">
              <div class="categories">Productos más vendido</div>
              <h3 class="item-title">woolen hat.</h3>
              <div class="btn-wrap">
                <a href="shop.html" class="d-flex align-items-center">Ver colección <i class="icon icon-arrow-io"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="subscribe" class="padding-large">
    <div class="container">
      <div class="row">
        <div class="block-text col-md-6">
          <div class="section-header">
            <h2 class="section-title">Obtén Cupones del 25% de Descuento</h2>
          </div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictumst
            amet, metus, sit massa posuere maecenas. At tellus ut nunc amet
            vel egestas.
          </p>
        </div>
        <div class="subscribe-content col-md-6">
          <form id="form" class="d-flex justify-content-between">
            <input type="text" name="email" placeholder="Ingresa tu correo electrónico" />
            <button class="btn btn-dark">Suscribete ahora</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="selling-products" class="product-store bg-light-grey padding-large">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Productos más vendidos</h2>
      </div>
      <ul class="tabs list-unstyled">
        <li data-tab-target="#all" class="active tab">Todos</li>
        <li data-tab-target="#shoes" class="tab">Zapatos</li>
        <li data-tab-target="#tshirts" class="tab">Camisetas</li>
        <li data-tab-target="#pants" class="tab">Pantalones</li>
        <li data-tab-target="#hoodie" class="tab">Hoodies</li>
        <li data-tab-target="#outer" class="tab">Ropa exterior</li>
        <li data-tab-target="#jackets" class="tab">Chaquetas</li>
        <li data-tab-target="#accessories" class="tab">Accesorios</li>
      </ul>
      <div class="tab-content">
        <div id="all" data-tab-content class="active">
          <div class="row d-flex flex-wrap">
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products1.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al Carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta media manga</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products2.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta gris elegante</a>
                </h3>
                <div class="item-price text-primary">$35.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products3.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camisa blanca de seda</a>
                </h3>
                <div class="item-price text-primary">$35.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products4.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Hoodie grunge</a>
                </h3>
                <div class="item-price text-primary">$30.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products5.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Chaqueta manga larga</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products6.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Abrigo gris a cuadros</a>
                </h3>
                <div class="item-price text-primary">$30.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products7.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta manga larga</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products8.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta manga corta</a>
                </h3>
                <div class="item-price text-primary">$35.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products13.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Nike naranja y blanco</a>
                </h3>
                <div class="item-price text-primary">$55.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products14.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Zapatos para Correr</a>
                </h3>
                <div class="item-price text-primary">$65.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products15.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Zapatos de Tenis</a>
                </h3>
                <div class="item-price text-primary">$80.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products16.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Zapatos Nike</a>
                </h3>
                <div class="item-price text-primary">$65.00</div>
              </div>
            </div>
          </div>
        </div>
        <div id="shoes" data-tab-content>
          <div class="row d-flex flex-wrap">
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products13.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Nike naranja y blanco</a>
                </h3>
                <div class="item-price text-primary">$55.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products14.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Zapatos para Correr</a>
                </h3>
                <div class="item-price text-primary">$65.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products15.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Zapatos de Tenis</a>
                </h3>
                <div class="item-price text-primary">$80.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products16.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Zapatos Nike</a>
                </h3>
                <div class="item-price text-primary">$65.00</div>
              </div>
            </div>
          </div>
        </div>
        <div id="tshirts" data-tab-content>
          <div class="row d-flex flex-wrap">
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products3.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camisa blanca de seda</a>
                </h3>
                <div class="item-price text-primary">$35.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products8.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta blanca de manga corta</a>
                </h3>
                <div class="item-price text-primary">$30.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products5.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta beige de manga corta</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products7.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta de manga larga</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
          </div>
        </div>
        <div id="pants" data-tab-content>
          <div class="row d-flex flex-wrap">
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products1.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta de manga corta</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products4.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Hoodie Grunge</a>
                </h3>
                <div class="item-price text-primary">$30.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products7.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta de manga larga</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products2.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Pantalón gris elegante</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
          </div>
        </div>
        <div id="hoodie" data-tab-content>
          <div class="row d-flex flex-wrap">
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products17.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Hoodie blanco</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products4.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Hoodie azul marino</a>
                </h3>
                <div class="item-price text-primary">$45.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products18.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Hoodie verde oscuro</a>
                </h3>
                <div class="item-price text-primary">$35.00</div>
              </div>
            </div>
          </div>
        </div>
        <div id="outer" data-tab-content>
          <div class="row d-flex flex-wrap">
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products3.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camisa blanca de seda</a>
                </h3>
                <div class="item-price text-primary">$ 35.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products4.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Hoodie grunge</a>
                </h3>
                <div class="item-price text-primary">$ 30.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products6.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Abrigo gris a cuadros</a>
                </h3>
                <div class="item-price text-primary">$ 30.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products7.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta de manga larga</a>
                </h3>
                <div class="item-price text-primary">$ 40.00</div>
              </div>
            </div>
          </div>
        </div>
        <div id="jackets" data-tab-content>
          <div class="row d-flex flex-wrap">
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products5.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Chaqueta vaquera de manga larga</a>
                </h3>
                <div class="item-price text-primary">$40.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products2.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Abrigo gris elegante</a>
                </h3>
                <div class="item-price text-primary">$35.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products6.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Abrigo gris a cuadros</a>
                </h3>
                <div class="item-price text-primary">$35.00</div>
              </div>
            </div>
          </div>
        </div>
        <div id="accessories" data-tab-content>
          <div class="row d-flex flex-wrap">
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products19.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Bolso elegante para mujer</a>
                </h3>
                <div class="item-price text-primary">$35.00</div>
              </div>
            </div>
            <div class="product-item col-lg-3 col-md-6 col-sm-6">
              <div class="image-holder">
                <img src="images/selling-products20.jpg" alt="Books" class="product-image" />
              </div>
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Gadgets elegantes</a>
                </h3>
                <div class="item-price text-primary">$30.00</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="testimonials" class="padding-large no-padding-bottom">
    <div class="container">
      <div class="reviews-content">
        <div class="row d-flex flex-wrap">
          <div class="col-md-2">
            <div class="review-icon">
              <i class="icon icon-right-quote"></i>
            </div>
          </div>
          <div class="col-md-8">
            <div class="swiper testimonial-swiper overflow-hidden">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="testimonial-detail">
                    <p>
                      “Dignissim massa diam elementum habitant fames. Id
                      nullam pellentesque nisi, eget cursus dictumst pharetra,
                      sit. Pulvinar laoreet id porttitor egestas dui urna.
                      Porttitor nibh magna dolor ultrices iaculis sit
                      iaculis.”
                    </p>
                    <div class="author-detail">
                      <div class="name">Por Maggie Rio</div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial-detail">
                    <p>
                      “Dignissim massa diam elementum habitant fames. Id
                      nullam pellentesque nisi, eget cursus dictumst pharetra,
                      sit. Pulvinar laoreet id porttitor egestas dui urna.
                      Porttitor nibh magna dolor ultrices iaculis sit
                      iaculis.”
                    </p>
                    <div class="author-detail">
                      <div class="name">Por John Smith</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-arrows">
              <button class="prev-button">
                <i class="icon icon-arrow-left"></i>
              </button>
              <button class="next-button">
                <i class="icon icon-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="flash-sales" class="product-store padding-large">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Ofertas relámpago</h2>
      </div>
      <div class="swiper product-swiper flash-sales overflow-hidden">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="product-item">
              <img src="images/selling-products9.jpg" alt="Books" class="product-image" />
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="discount">10% Off</div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camisa manga larga</a>
                </h3>
                <div class="item-price text-primary">
                  <del class="prev-price">$50.00</del>$40.00
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item">
              <img src="images/selling-products10.jpg" alt="Books" class="product-image" />
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="discount">10% Off</div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camiseta de manga larga</a>
                </h3>
                <div class="item-price text-primary">
                  <del class="prev-price">$50.00</del>$40.00
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item">
              <img src="images/selling-products11.jpg" alt="Books" class="product-image" />
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="discount">10% Off</div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Abrigo gris a cuadros</a>
                </h3>
                <div class="item-price text-primary">
                  <del class="prev-price">$55.00</del>$45.00
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item">
              <img src="images/selling-products12.jpg" alt="Books" class="product-image" />
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="discount">10% Off</div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Camisa blanca de seda</a>
                </h3>
                <div class="item-price text-primary">
                  <del class="prev-price">$45.00</del>$35.00
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item">
              <img src="images/selling-products8.jpg" alt="Books" class="product-image" />
              <div class="cart-concern">
                <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center">
                    Agregar al carrito <i class="icon icon-arrow-io"></i>
                  </button>
                  <button type="button" class="view-btn tooltip d-flex">
                    <i class="icon icon-screen-full"></i>
                    <span class="tooltip-text">Vista rápida</span>
                  </button>
                  <button type="button" class="wishlist-btn">
                    <i class="icon icon-heart"></i>
                  </button>
                </div>
              </div>
              <div class="discount">10% Off</div>
              <div class="product-detail">
                <h3 class="product-title">
                  <a href="single-product.html">Pantalón azul</a>
                </h3>
                <div class="item-price text-primary">
                  <del class="prev-price">$45.00</del>$35.00
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <section class="shoppify-section-banner">
    <div class="container">
      <div class="product-collection">
        <div class="left-content collection-item">
          <div class="products-thumb">
            <img src="images/model.jpg" alt="collection item" class="large-image image-rounded" />
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
            <div class="categories">Colección Denim</div>
            <h3 class="item-title">La colección casual.</h3>
            <p>
              Vel non viverra ligula odio ornare turpis mauris. Odio aliquam,
              tincidunt ut vitae elit risus. Tempor egestas condimentum et ac
              rutrum dui, odio.
            </p>
            <div class="btn-wrap">
              <a href="shop.html" class="d-flex align-items-center">Ver colección <i class="icon icon-arrow-io"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="quotation" class="align-center padding-large">
    <div class="inner-content">
      <h2 class="section-title divider">Frase del día</h2>
      <blockquote>
        <q>Es cierto, no me gusta el look de pantalones cortos y camiseta,
          pero creo que puedes verte fantástico con ropa casual.</q>
        <div class="author-name">- Dr. Seuss</div>
      </blockquote>
    </div>
  </section>

  <hr />
  <section id="latest-blog" class="padding-large">
    <div class="container">
      <div class="section-header d-flex flex-wrap align-items-center justify-content-between">
        <h2 class="section-title">Nuestro blog</h2>
        <div class="btn-wrap align-right">
          <a href="blog.html" class="d-flex align-items-center">Leer todos los artículos <i
              class="icon icon icon-arrow-io"></i>
          </a>
        </div>
      </div>
      <div class="row d-flex flex-wrap">
        <article class="col-md-4 post-item">
          <div class="image-holder zoom-effect">
            <a href="single-post.html">
              <img src="images/post-img1.jpg" alt="post" class="post-image" />
            </a>
          </div>
          <div class="post-content d-flex">
            <div class="meta-date">
              <div class="meta-day text-primary">22</div>
              <div class="meta-month">Aug-2021</div>
            </div>
            <div class="post-header">
              <h3 class="post-title">
                <a href="single-post.html">Las 10 mejores ideas de look casual para vestir a tus
                  hijos.</a>
              </h3>
              <a href="blog.html" class="blog-categories">Fashion</a>
            </div>
          </div>
        </article>
        <article class="col-md-4 post-item">
          <div class="image-holder zoom-effect">
            <a href="single-post.html">
              <img src="images/post-img2.jpg" alt="post" class="post-image" />
            </a>
          </div>
          <div class="post-content d-flex">
            <div class="meta-date">
              <div class="meta-day text-primary">25</div>
              <div class="meta-month">Aug-2021</div>
            </div>
            <div class="post-header">
              <h3 class="post-title">
                <a href="single-post.html">Últimas tendencias en modo urbana</a>
              </h3>
              <a href="blog.html" class="blog-categories">Tendencias</a>
            </div>
          </div>
        </article>
        <article class="col-md-4 post-item">
          <div class="image-holder zoom-effect">
            <a href="single-post.html">
              <img src="images/post-img3.jpg" alt="post" class="post-image" />
            </a>
          </div>
          <div class="post-content d-flex">
            <div class="meta-date">
              <div class="meta-day text-primary">28</div>
              <div class="meta-month">Aug-2021</div>
            </div>
            <div class="post-header">
              <h3 class="post-title">
                <a href="single-post.html">Ideas de ropa cómoda para mujer</a>
              </h3>
              <a href="blog.html" class="blog-categories">Inspiración</a>
            </div>
          </div>
        </article>
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

  <section id="instagram" class="padding-large">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Sigue nuestro Instagram</h2>
      </div>
      <p>
        Nuestra cuenta oficial de Instagram<a href="#">@ultras</a> or
        <a href="#">#ultras_clothing</a>
      </p>
      <div class="row d-flex flex-wrap justify-content-between">
        <div class="col-lg-2 col-md-4 col-sm-6">
          <figure class="zoom-effect">
            <img src="images/insta-image1.jpg" alt="instagram" class="insta-image" />
            <i class="icon icon-instagram"></i>
          </figure>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <figure class="zoom-effect">
            <img src="images/insta-image2.jpg" alt="instagram" class="insta-image" />
            <i class="icon icon-instagram"></i>
          </figure>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <figure class="zoom-effect">
            <img src="images/insta-image3.jpg" alt="instagram" class="insta-image" />
            <i class="icon icon-instagram"></i>
          </figure>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <figure class="zoom-effect">
            <img src="images/insta-image4.jpg" alt="instagram" class="insta-image" />
            <i class="icon icon-instagram"></i>
          </figure>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <figure class="zoom-effect">
            <img src="images/insta-image5.jpg" alt="instagram" class="insta-image" />
            <i class="icon icon-instagram"></i>
          </figure>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <figure class="zoom-effect">
            <img src="images/insta-image6.jpg" alt="instagram" class="insta-image" />
            <i class="icon icon-instagram"></i>
          </figure>
        </div>
      </div>
    </div>
  </section>

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

  <footer id="footer">
    <div class="container">
      <div class="footer-menu-list">
        <div class="row d-flex flex-wrap justify-content-between">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Ultras</h5>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="about.html">Sobre nosotros</a>
                </li>
                <li class="menu-item">
                  <a href="#">Condiciones </a>
                </li>
                <li class="menu-item">
                  <a href="blog.html">Nuestro blog</a>
                </li>
                <li class="menu-item">
                  <a href="#">Trabaja con nosotros</a>
                </li>
                <li class="menu-item">
                  <a href="#">Programa de afiliados</a>
                </li>
                <li class="menu-item">
                  <a href="#">Prensa Ultras</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Servicio al Cliente</h5>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="faqs.html">FAQ</a>
                </li>
                <li class="menu-item">
                  <a href="contact.html">Contacto</a>
                </li>
                <li class="menu-item">
                  <a href="#">Política de privacidad</a>
                </li>
                <li class="menu-item">
                  <a href="#">Devoluciones y reembolsos</a>
                </li>
                <li class="menu-item">
                  <a href="#">Política de cookies</a>
                </li>
                <li class="menu-item">
                  <a href="#">Información de envío</a>
                </li>
              </ul>
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
                <strong>+57 444 11 00 35</strong>
              </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Desde 2026</h5>
              <p>
                Cras mattis sit ornare in metus eu amet adipiscing enim.
                Ullamcorper in orci, ultrices integer eget arcu. Consectetur
                leo dignissim lacus, lacus sagittis dictumst.
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
            Freebies by
            <a href="https://templatesjungle.com/">Templates Jungle</a>
            Distributed by <a href="https://themewagon.com">ThemeWagon</a>
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