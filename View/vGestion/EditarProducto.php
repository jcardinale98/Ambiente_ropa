<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/ProductoController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/CategoriaController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/View/LayoutInterno.php';

$consecutivo = $_GET["consecutivo"];

$producto = ConsultarProductoController($consecutivo);
$categorias = ConsultarCategoriasController();

if($producto)
{
    $producto = $producto->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="es">

<?php
    ImportCSS();
?>
<link rel="stylesheet" href="../css/gestionProductos.css">

<body>

  <main id="content" class="content py-10">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-12">
          <div class="d-flex align-items-center gap-3">
            <div>
              <h1 class="fs-4 mb-0 fw-semibold">
                Editar Producto
              </h1>
              <p class="text-muted mb-0 small">
                Modifique la información del producto
              </p>
            </div>
          </div>
          <hr class="mt-3 mb-5">
        </div>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-10">
          <?php
            if(isset($_POST["Mensaje"]))
            {
              echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] .
              '</div>';
            }
          ?>

          <div class="card form-card">
            <div class="card-header">
              <h5 class="mb-0 text-white fw-semibold">
                <i class="ti ti-edit me-2"></i>
                Información del producto
              </h5>
            </div>
            <div class="card-body p-4">
              <form id="formEditarProducto" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="consecutivo" value="<?= $producto["Consecutivo"] ?>">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label fw-medium">
                      Nombre
                    </label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                      value="<?= htmlspecialchars($producto["Nombre"]) ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="consecutivoCategoria" class="form-label fw-medium">
                      Categoría
                    </label>
                    <select class="form-select" id="consecutivoCategoria" name="consecutivoCategoria">
                      <option value="">
                        Seleccione una categoría
                      </option>
                      <?php
                        if($categorias)
                         {
                            foreach($categorias as $categoria)
                          {
                      ?>
                      <option value="<?= $categoria["Consecutivo"] ?>" <?= $categoria["Consecutivo"] == $producto["ConsecutivoCategoria"]
                                                        ? "selected"
                                                        : "" ?>>

                        <?= htmlspecialchars($categoria["Nombre"]) ?>
                      </option>
                      <?php
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label fw-medium">
                      Precio
                    </label>
                    <input type="number" class="form-control" id="precio" name="precio" step="0.01"
                      value="<?= $producto["Precio"] ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="stock" class="form-label fw-medium">
                      Stock
                    </label>
                    <input type="number" class="form-control" id="stock" name="stock" min="0"
                      value="<?= $producto["Stock"] ?>">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="descripcion" class="form-label fw-medium">
                    Descripción
                  </label>
                  <textarea class="form-control" id="descripcion" name="descripcion"
                    rows="4"><?= htmlspecialchars($producto["Descripcion"]) ?></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-medium">
                    Imagen actual
                  </label>
                  <?php if(!empty($producto["RutaImagen"])): ?>
                  <div class="mb-2">
                    <img src="<?= htmlspecialchars($producto["RutaImagen"]) ?>?v=<?= time() ?>"
                      alt="<?= htmlspecialchars($producto["Nombre"]) ?>" width="130" height="130"
                      style="object-fit: contain;">
                  </div>
                  <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="imagen" class="form-label fw-medium">
                    Nueva Imagen
                  </label>
                  <input type="file" class="form-control" id="imagen" name="imagen" accept=".png,image/png">
                  <div class="form-text">
                    Si no selecciona una nueva imagen, se conservará la actual.
                  </div>
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" id="btnActualizarProducto" name="btnActualizarProducto" class="btn btn-primary">
                    <i class="ti ti-device-floppy me-2"></i>
                    Guardar Cambios
                  </button>
                  <a href="GestionProductos.php" class="btn btn-outline-secondary">
                    Cancelar
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
        ImportJS();
    ?>
  <script src="../js/editarProducto.js"></script>

</body>

</html>