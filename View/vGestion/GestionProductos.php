<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/ProductoController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/CategoriaController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/UtilitarioModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/View/LayoutInterno.php';

  RequerirRol("Administrador");

$nombreBuscar = "";

if(isset($_POST["btnBuscarProducto"]))
{
    $nombreBuscar = $_POST["nombreBuscar"];

    $productos = BuscarProductosAdminController($nombreBuscar, 0);
}
else
{
    $productos = ConsultarProductosController();
}

$categorias = ConsultarCategoriasController();

?>

<html lang="es">

<?php
    ImportCSS();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div id="mensajeAlerta" class="alert mensaje-alerta" role="alert">
  </div>
  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>

  <section class="padding-medium bg-light-grey">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
          <h2 class="section-title">
            Gestión de Productos
          </h2>
        </div>
        <div class="d-flex gap-2 mt-3 mt-md-0">

          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalRegistrarProducto">

            <i class="fa-solid fa-plus me-1"></i>

            Registrar producto

          </button>
          <a href="/Ambiente_ropa/View/Administrador/principal.php" class="btn btn-dark">
            <i class="fa-solid fa-arrow-left me-1"></i>
            Salir
          </a>

        </div>
      </div>

      <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
          <form class="buscador-navbar d-flex align-items-center" method="POST" action="">
            <input class="form-control me-2" type="search" name="nombreBuscar" placeholder="Buscar producto..."
              aria-label="Buscar producto" value="<?php echo $nombreBuscar; ?>">
            <button class="btn btn-outline-dark" type="submit" name="btnBuscarProducto">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>
      </div>

      <?php
        if(isset($_POST["Mensaje"])){ ?>
      <div class="alert alert-danger">
        <?php echo $_POST["Mensaje"]; ?>
      </div>
      <?php } ?>
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Categoría</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if($productos && $productos->num_rows > 0) {
                    while($fila = $productos->fetch_assoc()){?>
                <tr>
                  <td>
                    <img src="<?php echo $fila["RutaImagen"]; ?>" alt="<?php echo $fila["Nombre"]; ?>"
                      class="img-fluid rounded" style="width: 75px; height: 75px; object-fit: cover;">
                  </td>
                  <td>
                    <strong>
                      <?php echo $fila["Nombre"]; ?>
                    </strong>
                  </td>
                  <td>
                    <?php echo $fila["Categoria"]; ?>
                  </td>
                  <td style="min-width: 200px;">
                    <?php echo $fila["Descripcion"]; ?>
                  </td>
                  <td>
                    ₡<?php echo number_format($fila["Precio"], 2); ?>
                  </td>
                  <td>
                    <?php if($fila["Stock"] == 0) { ?>
                    <span class="badge bg-danger">
                      Sin existencias
                    </span>
                    <?php } elseif($fila["Stock"] <= 5) { ?>
                    <span class="badge bg-warning text-dark">
                      <?php echo $fila["Stock"]; ?>
                    </span>
                    <?php } else { ?>
                    <span class="badge bg-success">
                      <?php echo $fila["Stock"]; ?>
                    </span>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if($fila["Estado"] == 1) { ?>
                    <span class="badge bg-success">
                      Activo
                    </span>
                    <?php } else { ?>
                    <span class="badge bg-secondary">
                      Inactivo
                    </span>
                    <?php } ?>
                  </td>
                  <td>
                    <div class="d-flex gap-2">
                      <a href="/Ambiente_ropa/View/vGestion/actualizarProducto.php?consecutivo=<?php echo $fila["Consecutivo"]; ?>"
                        class="btn btn-outline-dark btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <form action="" method="POST">
                        <input type="hidden" name="consecutivo" value="<?php echo $fila["Consecutivo"]; ?>">
                        <button type="submit" name="btnEliminarProducto" class="btn btn-dark btn-sm"
                          onclick="return confirm('¿Desea eliminar este producto?')">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php } } else { ?>
                <tr>
                  <td colspan="8" class="text-center py-5">
                    <i class="fa-solid fa-box-open fa-2x mb-3"></i>
                    <p class="mb-0">
                      No se encontraron productos.
                    </p>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" id="modalRegistrarProducto" tabindex="-1" aria-labelledby="tituloModalRegistrarProducto"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form action="" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="tituloModalRegistrarProducto">
              Registrar producto
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar">
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">
                  Categoría
                </label>
                <select name="consecutivoCategoria" class="form-select" required>
                  <option value="">
                    Seleccione una categoría
                  </option>
                  <?php
                    if($categorias && $categorias->num_rows > 0){
                      while($categoria = $categorias->fetch_assoc()) { ?>
                  <option value="<?php echo $categoria["Consecutivo"]; ?>">
                    <?php echo $categoria["Nombre"]; ?>
                  </option>
                  <?php } } ?>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">
                  Nombre
                </label>
                <input type="text" name="nombre" class="form-control" required>
              </div>
              <div class="col-12 mb-3">
                <label class="form-label">
                  Descripción
                </label>
                <textarea name="descripcion" class="form-control" rows="3" required></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">
                  Precio
                </label>
                <input type="number" name="precio" class="form-control" min="0" step="0.01" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">
                  Stock
                </label>
                <input type="number" name="stock" class="form-control" min="0" required>
              </div>
              <div class="col-12 mb-3">
                <label class="form-label">
                  Imagen
                </label>
                <input type="text" class="form-control"
                  value="Se utilizará una imagen predeterminada (esto es temporal)" disabled>
                <input type="hidden" name="imagen" value="/Ambiente_ropa/View/images/main-logo.png">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">
              Cancelar
            </button>
            <button type="submit" name="btnRegistrarProducto" class="btn btn-dark">
              Registrar producto
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
        ImportJS();
    ?>

</body>

</html>