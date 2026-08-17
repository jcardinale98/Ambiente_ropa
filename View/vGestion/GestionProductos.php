<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/ProductoController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/View/LayoutInterno.php';

    $productos = ConsultarProductosController();
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
                Gestión de Productos
              </h1>
              <p class="text-muted mb-0 small">
                Administra los productos disponibles en el catálogo
              </p>
            </div>
            <div>
              <a href="AgregarProducto.php" class="btn btn-primary">
                <i class="ti ti-plus me-2"></i>
                Agregar Producto
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
              <h5 class="mb-0 text-white fw-semibold">
                <i class="ti ti-package me-2"></i>
                Productos Registrados
              </h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover align-middle">
                  <thead>
                    <tr>
                      <th>Imagen</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Categoría</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($productos && $productos->num_rows > 0)
                          {
                            while($producto = $productos->fetch_assoc())
                          {
                    ?>
                    <tr>
                      <td>
                        <?php if(!empty($producto["RutaImagen"]))
                              {
                        ?>
                        <img src="<?= htmlspecialchars($producto["RutaImagen"]) ?>?v=<?= time() ?>"
                          alt="<?= htmlspecialchars($producto["Nombre"]) ?>" width="70" height="70"
                          style="object-fit: contain;">
                        <?php
                            }
                            else
                            {
                                echo "Sin imagen";
                            }
                        ?>
                      </td>
                      <td>
                        <?= htmlspecialchars($producto["Nombre"]) ?>
                      </td>
                      <td>
                        <?= htmlspecialchars($producto["Descripcion"]) ?>
                      </td>
                      <td>
                        <?= htmlspecialchars($producto["Categoria"] ?? "") ?>
                      </td>
                      <td>
                        ₡<?= number_format($producto["Precio"], 2) ?>
                      </td>
                      <td>
                        <?= $producto["Stock"] ?>
                      </td>
                      <td>
                        <a href="EditarProducto.php?consecutivo=<?= $producto["Consecutivo"] ?>"
                          class="btn btn-sm btn-primary">
                          <i class="ti ti-edit"></i>
                          Editar
                        </a>
                        <button type="button" class="btn btn-sm btn-danger btnEliminarProducto"
                          data-consecutivo="<?= $producto["Consecutivo"] ?>"
                          data-nombre="<?= htmlspecialchars($producto["Nombre"]) ?>">
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
                      <td colspan="7" class="text-center">
                        No existen productos registrados.
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
  <script src="../js/gestionProductos.js"></script>
</body>

</html>