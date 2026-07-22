<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/ProductoController.php';

$productos = ConsultarProductosController();

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Gestión de Productos</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

      <h2>Gestión de Productos</h2>

      <a href="/Ambiente_ropa/View/Producto/RegistrarProducto.php" class="btn btn-primary">
        Registrar Producto
      </a>

    </div>

    <?php
        if(isset($_POST["Mensaje"]))
        {
        ?>

    <div class="alert alert-danger">
      <?php echo $_POST["Mensaje"]; ?>
    </div>

    <?php
        }
        ?>

    <div class="table-responsive">

      <table class="table table-bordered table-hover align-middle">

        <thead class="table-dark">

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
                    if($productos && $productos->num_rows > 0)
                    {
                        while($fila = $productos->fetch_assoc())
                        {
                    ?>

          <tr>

            <td>

              <img src="<?php echo $fila["RutaImagen"]; ?>" alt="<?php echo $fila["Nombre"]; ?>" width="80" height="80"
                style="object-fit: cover;">

            </td>

            <td>
              <?php echo $fila["Nombre"]; ?>
            </td>

            <td>
              <?php echo $fila["Categoria"]; ?>
            </td>

            <td>
              <?php echo $fila["Descripcion"]; ?>
            </td>

            <td>
              ₡<?php echo number_format($fila["Precio"], 2); ?>
            </td>

            <td>
              <?php echo $fila["Stock"]; ?>
            </td>

            <td>

              <?php
                                    if($fila["Estado"] == 1)
                                    {
                                    ?>

              <span class="badge bg-success">
                Activo
              </span>

              <?php
                                    }
                                    else
                                    {
                                    ?>

              <span class="badge bg-secondary">
                Inactivo
              </span>

              <?php
                                    }
                                    ?>

            </td>

            <td>

              <a href="/Ambiente_ropa/View/Producto/ActualizarProducto.php?consecutivo=<?php echo $fila["Consecutivo"]; ?>"
                class="btn btn-warning btn-sm">
                Editar
              </a>

              <form action="" method="POST" class="d-inline">

                <input type="hidden" name="consecutivo" value="<?php echo $fila["Consecutivo"]; ?>">

                <button type="submit" name="btnEliminarProducto" class="btn btn-danger btn-sm"
                  onclick="return confirm('¿Desea eliminar este producto?')">
                  Eliminar
                </button>

              </form>

            </td>

          </tr>

          <?php
                        }
                    }
                    else
                    {
                    ?>

          <tr>

            <td colspan="8" class="text-center">
              No hay productos registrados.
            </td>

          </tr>

          <?php
                    }
                    ?>

        </tbody>

      </table>

    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
  </script>

</body>

</html>