<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/CategoriaController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/View/LayoutInterno.php';

$consecutivo = $_GET["consecutivo"];

$categoria = ConsultarCategoriaController($consecutivo);

if($categoria)
{
    $categoria = $categoria->fetch_assoc();
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
                Editar Categoría
              </h1>
              <p class="text-muted mb-0 small">
                Modifique la información de la categoría
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
                Información de la categoría
              </h5>
            </div>

            <div class="card-body p-4">
              <form id="formEditarCategoria" action="" method="POST">
                <input type="hidden" name="consecutivo" value="<?= $categoria["Consecutivo"] ?>">
                <div class="mb-3">
                  <label for="nombre" class="form-label fw-medium">
                    Nombre
                  </label>
                  <input type="text" class="form-control" id="nombre" name="nombre" maxlength="80"
                    value="<?= htmlspecialchars($categoria["Nombre"]) ?>">
                </div>
                <div class="mb-3">
                  <label for="descripcion" class="form-label fw-medium">
                    Descripción
                  </label>
                  <textarea class="form-control" id="descripcion" name="descripcion" rows="4"
                    maxlength="250"><?= htmlspecialchars($categoria["Descripcion"]) ?></textarea>
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" id="btnActualizarCategoria" name="btnActualizarCategoria"
                    class="btn btn-primary">
                    <i class="ti ti-device-floppy me-2"></i>
                    Guardar Cambios
                  </button>
                  <a href="GestionCategorias.php" class="btn btn-outline-secondary">
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
  <script src="../js/editarCategoria.js"></script>
</body>

</html>