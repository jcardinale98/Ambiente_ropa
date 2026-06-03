<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Tienda Ropa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card" style="max-width: 420px; width: 100%">
            <div class="card-body p-5">
                <div class="text-center mb-3">
                   <a href="index.html" class="mb-2 d-inline-block"><img src="images/logo-fidelitas.png" alt=""
                            width="130" />
                    </a>
                    <h1 class="card-title mb-5 h5">Recuperar Acceso</h1>
                </div>

                <form class="needs-validation mt-3" novalidate>
                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                        <input id="correoElectronico" type="text" class="form-control" required autofocus />
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Procesar</button>
                </form>

                <div class="text-center mt-3 small text-muted">
                    ¿No tiene una cuenta?
                    <a href="registroUsuarios.html" class="link-primary">Regístrese</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
</body>
</html>
