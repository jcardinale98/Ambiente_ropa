<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/CategoriaController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/View/LayoutInterno.php';

    $categorias = ConsultarCategoriasController();
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
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h1 class="fs-4 mb-0 fw-semibold">
                Gestión de Categorías
              </h1>

              <p class="text-muted mb-0 small">
                Administra las categorías disponibles para los productos
              </p>
            </div>
            <div>
              <a href="AgregarCategoria.php" class="btn btn-primary">
                <i class="ti ti-plus me-2"></i>
                Agregar Categoría
              </a>
            </div>
          </div>
          <hr class="mt-3 mb-5">
        </div>
      </div>
      <?php
                if(isset($_POST["Mensaje"]))
                {
                    echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] .
                    '</div>';
                }
            ?>

      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h5 class="mb-0 fw-semibold">
                <i class="ti ti-category me-2"></i>
                Categorías Registradas
              </h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover align-middle">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($categorias && $categorias->num_rows > 0)
                          {
                            while($categoria = $categorias->fetch_assoc())
                          {
                    ?>
                    <tr>
                      <td>
                        <strong>
                          <?= htmlspecialchars($categoria["Nombre"]) ?>
                        </strong>
                      </td>
                      <td>
                        <?= htmlspecialchars($categoria["Descripcion"]) ?>
                      </td>
                      <td>
                        <a href="EditarCategoria.php?consecutivo=<?= $categoria["Consecutivo"] ?>"
                          class="btn btn-sm btn-primary">
                          <i class="ti ti-edit"></i>
                          Editar
                        </a>
                        <button type="button" class="btn btn-sm btn-danger btnEliminarCategoria"
                          data-consecutivo="<?= $categoria["Consecutivo"] ?>"
                          data-nombre="<?= htmlspecialchars($categoria["Nombre"]) ?>">
                          <i class="ti ti-trash"></i>
                          Eliminar
                        </button>
                      </td>
                    </tr>
                    <?php
                          }
                          }
                          else
                          {
                    ?>
                    <tr>
                      <td colspan="3" class="text-center">
                        No existen categorías registradas.
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
        ImportJS();
    ?>
  <script src="../js/gestionCategorias.js"></script>

</body>

</html>