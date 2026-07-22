<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';

RequerirRol("Administrador");

?>

<!DOCTYPE html>

<html lang="es">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Panel administrativo</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

  <nav class="navbar navbar-dark bg-dark">

    <div class="container">

      <span class="navbar-brand">
        Administración de la tienda
      </span>

      <a class="btn btn-outline-light" href="/Ambiente_ropa/Controller/CerrarSessionController.php">
        Cerrar sesión
      </a>

    </div>

  </nav>

  <main class="container py-5">

    <div class="card shadow">

      <div class="card-body p-5">

        <h1>Panel administrativo</h1>

        <p class="lead">

          Bienvenido,

          <strong>
            <?= htmlspecialchars(
                            $_SESSION["NombreUsuario"]
                        ) ?>
          </strong>

        </p>

        <p>

          Rol actual:

          <strong>
            <?= htmlspecialchars(
                            $_SESSION["RolUsuario"]
                        ) ?>
          </strong>

        </p>

        <p>
          Desde este panel puede administrar la información
          de la tienda.
        </p>

        <div class="d-flex flex-wrap gap-3">

          <a class="btn btn-dark" href="/Ambiente_ropa/View/Administrador/Roles.php">
            Gestionar roles
          </a>

          <a class="btn btn-outline-dark" href="/AMBIENTE_ROPA/View/Administrador/AdminProductos.php">
            Gestionar productos
          </a>

        </div>

      </div>

    </div>

  </main>

</body>

</html>