<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/PrincipalController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/UtilitarioModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/View/LayoutInterno.php';

RequerirRol("Cliente");

?>

<!DOCTYPE html>

<html lang="es">

<?php
    ImportCSS();
?>

<body>
  <div id="mensajeAlerta" class="alert mensaje-alerta" role="alert">
  </div>
  <?php
    HeaderInfo();
  ?>


  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>




  <!-- Carrusel de imagenes -->
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
                    Explora el catalogo de ropa casual para hombres y mujeres. Encuentra prendas versátiles y cómodas
                    para tu estilo diario.
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
  <!-- -------------------------------------------------------------catalogo de productos------------------------------------------------------------ -->

  <div class="row">
    <?php if($productos && $productos->num_rows > 0) { ?>
    <?php while($fila = $productos->fetch_assoc()) { ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card shadow-sm h-100">
        <img src="<?php echo $fila["RutaImagen"]; ?>" class="card-img-top" alt="<?php echo $fila["Nombre"]; ?>">
        <div class="card-body">
          <h5 class="card-title"> <?php echo $fila["Nombre"]; ?> </h5>
          <p> Categoría: <?php echo $fila["Categoria"]; ?> </p>
          <p> <?php echo $fila["Descripcion"]; ?> </p>
          <p> Precio: ₡<?php echo number_format($fila["Precio"], 2); ?> </p>
          <p> Stock: <?php echo $fila["Stock"]; ?>
          </p>
          <div class="mt-auto">

            <?php
              $idProducto = intval($fila["Consecutivo"]);
              $stockProducto = intval($fila["Stock"]);?>
            <div class="d-flex gap-2 align-items-center">
              <input type="number" id="cantidad_<?php echo $idProducto; ?>" class="form-control cantidad-input"
                value="1" min="1" max="<?php echo $stockProducto; ?>">
              <button type="button" class="btn btn-dark flex-grow-1 btn-agregar"
                data-producto="<?php echo $idProducto; ?>">
                <i class="fa-solid fa-cart-plus"></i>
                Agregar al carrito
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php } else { ?>
    <div class="col-12 text-center">
      <p>No se encontraron productos.</p>
    </div>
    <?php } ?>
  </div>


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
  <script src="../js/jquery-1.11.0.min.js"></script>
  <script src="../js/carrito.js"></script>
  <?php
       FooterInfo();
    ?>

  <?php
        ImportJS();
    ?>

</body>

</html>