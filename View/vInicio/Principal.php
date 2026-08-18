<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Controller/ProductoController.php';
include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Controller/CategoriaController.php';
include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Controller/RolController.php';
include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/View/LayoutInterno.php';
RequerirClienteController();

$categorias = ConsultarCategoriasController();

?>

<!DOCTYPE html>

<html lang="es">

<?php
    ImportCSS();
?>
<link rel="stylesheet" href="../css/main.css?v=1">

<body>

  <?php
        HeaderInfo();
    ?>

  <div class="preloader-wrapper">
    <div class="preloader"></div>
  </div>

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
                        background-image: url('../images/banner1.jpg');
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: center;
                    ">
          <div class="banner-content">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h2 class="banner-title">
                    Colección de verano
                  </h2>
                  <p>
                    Descubre nuestra colección con diseños
                    frescos y estilos modernos.
                  </p>
                  <div class="btn-wrap">
                    <a href="Productos.php" class="btn btn-light btn-medium">
                      Comprar ahora
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide" style="
                        background-image: url('../images/banner2.jpg');
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: center;
                    ">
          <div class="banner-content">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h2 class="banner-title">
                    Colección casual
                  </h2>
                  <p>
                    Explora el catálogo de ropa casual para
                    hombres y mujeres.
                  </p>
                  <div class="btn-wrap">
                    <a href="Productos.php" class="btn btn-light btn-medium">
                      Comprar ahora
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
        <img src="../images/brand1.png" alt="Marca 1" class="brand-image">
        <img src="../images/brand2.png" alt="Marca 2" class="brand-image">
        <img src="../images/brand3.png" alt="Marca 3" class="brand-image">
        <img src="../images/brand4.png" alt="Marca 4" class="brand-image">
        <img src="../images/brand5.png" alt="Marca 5" class="brand-image">
      </div>
    </div>
  </section>

  <section id="catalogo" class="padding-medium">
    <div class="container">
      <div class="text-center mb-5">
        <h2>Catálogo de Productos</h2>
        <p class="text-muted">
          Explora nuestros productos más vendidos!
        </p>
      </div>

      <form method="POST" action="" class="row justify-content-center align-items-center g-3 mb-5">
        <div class="col-lg-6 col-md-6">
          <div class="input-group filtro-buscador">
            <span class="input-group-text">
              <i class="fa fa-search"></i>
            </span>
            <input type="search" class="form-control" name="nombreProducto" placeholder="Buscar producto...">
          </div>
        </div>
        <div class="col-lg-3 col-md-4">
          <select class="form-select filtro-select" name="consecutivoCategoria">
            <option value="0">
              Todas las categorías
            </option>
            <?php
              if($categorias)
              {
                while($categoria = $categorias->fetch_assoc())
              {
            ?>
            <option value="<?= $categoria["Consecutivo"] ?>">
              <?= htmlspecialchars($categoria["Nombre"]) ?>
            </option>
            <?php
                }
              }
            ?>
          </select>
        </div>
        <div class="col-lg-2 col-md-2">
          <button type="submit" name="btnBuscarProductos" class="filtro-boton">
            <i class="fa fa-search me-1"></i>
            Buscar
          </button>
        </div>
      </form>

      <div class="row">
        <?php if($productos && $productos->num_rows > 0) { ?>
        <?php while($fila = $productos->fetch_assoc()) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="card shadow-sm h-100">
            <img src="<?= htmlspecialchars($fila["RutaImagen"]) ?>?v=<?= time() ?>" class="card-img-top"
              alt="<?= htmlspecialchars($fila["Nombre"]) ?>" style="height:260px; object-fit:contain;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">
                <?= htmlspecialchars($fila["Nombre"]) ?>
              </h5>
              <p class="text-muted mb-2">
                <?= htmlspecialchars($fila["Categoria"]) ?>
              </p>
              <p>
                <?= htmlspecialchars($fila["Descripcion"]) ?>
              </p>
              <h5 class="mt-auto">
                ₡<?= number_format($fila["Precio"], 2) ?>
              </h5>
              <?php if($fila["Stock"] > 0) { ?>
              <p class="text-success">
                Disponibles:
                <?= intval($fila["Stock"]) ?>
              </p>
              <?php } else { ?>
              <p class="text-danger fw-semibold">
                Agotado
              </p>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <div class="col-12 text-center py-5">
          <h5>No se encontraron productos.</h5>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <section class="padding-medium">
    <div class="container text-center">
      <h2>Conoce nuestros productos</h2>
      <p>
        Consulta el catálogo, agrega artículos al carrito y
        realiza tus compras.
      </p>
      <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
        <a href="Productos.php" class="btn btn-dark">
          <i class="fa-solid fa-shirt"></i>
          Ver productos
        </a>
        <a href="Perfil.php" class="btn btn-outline-dark">
          <i class="fa-solid fa-user-gear"></i>
          Mi perfil
        </a>
      </div>
    </div>
  </section>

  <?php
        FooterInfo();
    ?>

  <?php
        ImportJS();
    ?>

</body>

</html>