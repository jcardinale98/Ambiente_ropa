<!DOCTYPE html>
<html lang="es">}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="bg-light">

    <!-- HEADER -->
    <header id="header" >
        <nav class="navbar navbar-expand-lg navbar-white bg-primary  border-bottom">
            <div class="container">
                <a class="navbar-brand fw-bold text-white" href="index.php">
                    Tienda De Ropa
                </a>

               
                </div>
            </div>
        </nav>
    </header>

    <!-- LOGIN -->
    <div class="container-md">
        <div class="row justify-content-center align-items-center vh-100">


            <div class="col-md-6 col-lg-4">


                <div class="card shadow">
                    <div class="card-body p-4">

                        <h3 class="text-center mb-4">
                            Iniciar Sesión
                        </h3>

                        <form>

                            <div class="mb-3">
                                <label class="form-label">
                                    Correo Electrónico
                                </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="correo@ejemplo.com"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Contraseña
                                </label>
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control"
                                    placeholder="********"
                                    required
                                     minlength="6">
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="recordar">

                                <label class="form-check-label" for="recordar">
                                    Recordarme
                                </label>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary w-100">
                                Ingresar
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

</body>
</html>