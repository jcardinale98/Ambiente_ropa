<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/InicioController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/View/LayoutExterno.php';
?>

<!doctype html>
<html lang="en">

<?php
    ImportCSS();
?>

<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card" style="max-width: 420px; width: 100%">
            <div class="card-body p-5">
                <div class="text-center mb-3">
                   <a href="login.php" class="mb-2 d-inline-block"><img src="../images/main-logo.png" alt=""
                            width="130" />
                    </a>
                    <h1 class="card-title mb-5 h5">Recuperar Acceso</h1>
                </div>

                <?php
                    if(isset($_POST["Mensaje"]))
                    {
                        echo '<div class="alert alert-danger text-center">' 
                             . $_POST["Mensaje"] . '</div>';
                    }
                ?>

                <form action="" method="post" class="needs-validation mt-3" id="formRecuperarAcceso">
                    
                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                        <input id="correoElectronico" name="correoElectronico" type="text" class="form-control" autofocus />
                    </div>

                    <button type="submit" id="btnRecuperarAcceso" name="btnRecuperarAcceso" class="btn btn-primary w-100">Procesar</button>
                </form>

                <div class="text-center mt-3 small text-muted">
                    ¿No tiene una cuenta?
                    <a href="RegistrarUsuarios.php" class="link-primary">Regístrese</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        ImportJS();
    ?>
    <script src="../js/recuperarAcceso.js"></script>

</body>
</html>
