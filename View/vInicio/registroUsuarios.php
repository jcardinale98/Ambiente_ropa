<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/InicioController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/View/LayoutExterno.php';
?>


<!doctype html>
<html lang="es">
    
<?php
    ImportCSS();
?>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="Principal.php">
                Tienda Ropa
            </a>
        </div>
    </nav>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card" style="max-width: 420px; width: 100%">
            <div class="card-body p-5">
                
                <div class="text-center mb-4">
                    <h1 class="card-title mb-4 h5">Registro Usuario</h1>
                </div>

                <form action="" method="post" class="needs-validation mt-3" id="formRegistrarUsuarios">
                    
                    <div class="mb-3">
                        <label for="identificacion" class="form-label">Identificacion</label>
                        <input id="identificacion" name="identificacion" type="text" class="form-control"  onkeyup="ConsultarNombreAPI();" />
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Completo</label>
                        <input id="nombre" name="nombre" type="text" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo Electronico</label>
                        <input id="correoElectronico" name="correoElectronico" type="email" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="contrasenna" class="form-label">Contraseña</label>
                        <input id="contrasenna" name="contrasenna" type="password" class="form-control" 
                               required minlength="6" />
                    </div>

                    <button id="btnRegistrar" name="btnRegistrar" type="submit" class="btn btn-primary w-100">Procesar</button>
                </form>

                <div class="text-center mt-3 small text-muted">
                    ¿Ya tiene una cuenta?
                    <a href="login.php" class="link-primary">Inicio Session</a>
                </div>

            </div>
        </div>
    </div>

    
 <?php
        ImportJS();
    ?>

    <script src="../js/registro.js"></script>
    <script src="../js/nombresApi.js"></script>

    
   

</body>
</html>