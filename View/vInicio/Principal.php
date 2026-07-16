<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/View/LayoutInterno.php';
    
?>


<!DOCTYPE html>
<html lang="en">



<?php
    ImportCSS();
?>

<body>

 <?php
    HeaderInfo();
  ?>


  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>


  

  // carrusel de imagenes
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
              background-image: url(&quot;../images/banner1.jpg&quot;);
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
                    Descubre la nueva colección de verano con diseños frescos y estilos modernos.
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
              background-image: url(&quot;../images/banner2.jpg&quot;);
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
                    Explora el catalogo de ropa casual para hombres y mujeres. Encuentra prendas versátiles y cómodas para tu estilo diario.
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
        <img src="../images/brand1.png" alt="phone" class="brand-image" />
        <img src="../images/brand2.png" alt="phone" class="brand-image" />
        <img src="../images/brand3.png" alt="phone" class="brand-image" />
        <img src="../images/brand4.png" alt="phone" class="brand-image" />
        <img src="../images/brand5.png" alt="phone" class="brand-image" />
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
  <?php
       FooterInfo();
    ?>

  <?php
        ImportJS();
    ?>

</body>

</html>