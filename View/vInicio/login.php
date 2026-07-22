<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Controller/InicioController.php';

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/View/LayoutExterno.php';


if (
    isset($_SESSION["ConsecutivoUsuario"])
    && isset($_SESSION["RolUsuario"])
)
{
    RedirigirSegunRol();
}

$mensaje = $_SESSION["MensajeLogin"] ?? null;

unset($_SESSION["MensajeLogin"]);

?>

<!DOCTYPE html>

<html lang="es">

<?php
    ImportCSS();
?>

<body class="bg-light">

  <header id="header">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom">

      <div class="container">

        <a class="navbar-brand fw-bold text-white" href="Principal.php">
          Tienda de Ropa
        </a>

      </div>

    </nav>

  </header>

  <div class="container-md">

    <div class="row justify-content-center align-items-center min-vh-100">

      <div class="col-md-6 col-lg-4">

        <div class="card shadow">

          <div class="card-body p-4">

            <h3 class="text-center mb-4">
              Iniciar sesión
            </h3>

            <?php if ($mensaje !== null): ?>

            <div class="alert alert-danger text-center">
              <?= htmlspecialchars($mensaje) ?>
            </div>

            <?php endif; ?>

            <form action="" method="POST" class="needs-validation mt-3" id="formIniciarSesion">

              <div class="mb-3">

                <label for="identificacion" class="form-label">
                  Correo electrónico o identificación
                </label>

                <input id="identificacion" name="identificacion" type="text" class="form-control"
                  placeholder="correo@ejemplo.com" required autofocus>

              </div>

              <div class="mb-3">

                <label for="contrasenna" class="form-label">
                  Contraseña
                </label>

                <input id="contrasenna" name="contrasenna" type="password" class="form-control" placeholder="********"
                  required minlength="6">

              </div>

              <div class="form-check mb-3">

                <input class="form-check-input" type="checkbox" id="recordar">

                <label class="form-check-label" for="recordar">
                  Recordarme
                </label>

              </div>

              <button type="submit" id="btnlogin" name="btnlogin" class="btn btn-primary w-100">
                Iniciar sesión
              </button>

            </form>

            <div class="text-center mt-3">

              <a href="recuperar.php">
                ¿Olvidaste tu contraseña?
              </a>

            </div>

            <hr>

            <p class="text-center mb-0">

              ¿No tienes cuenta?

              <a href="registroUsuarios.php">
                Registrarse
              </a>

            </p>

          </div>

        </div>

      </div>

    </div>

  </div>

  <?php
        ImportJS();
    ?>

  <script src="../js/iniciarSesion.js"></script>

</body>

</html>