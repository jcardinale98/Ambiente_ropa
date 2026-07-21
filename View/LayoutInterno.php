<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}


function ImportCSS()
{
    echo '
        <head>

            <title>Tienda de Ropa</title>

            <meta charset="UTF-8">

            <meta
                http-equiv="X-UA-Compatible"
                content="IE=edge"
            >

            <meta
                name="viewport"
                content="width=device-width, initial-scale=1.0"
            >

            <link
                rel="stylesheet"
                type="text/css"
                href="../css/normalize.css"
            >

            <link
                rel="stylesheet"
                type="text/css"
                href="../css/vendor.css"
            >

            <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
                rel="stylesheet"
            >

            <link
                rel="stylesheet"
                type="text/css"
                href="../css/style.css"
            >

            <link
                rel="stylesheet"
                type="text/css"
                href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            >

            <link
                rel="preconnect"
                href="https://fonts.googleapis.com"
            >

            <link
                rel="preconnect"
                href="https://fonts.gstatic.com"
                crossorigin
            >

            <link
                href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
                rel="stylesheet"
            >

            <script src="../js/modernizr.js"></script>

        </head>
    ';
}


function ImportJS()
{
    echo '
        <script src="../js/jquery-1.11.0.min.js"></script>

        <script src="../js/plugins.js"></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        ></script>

        <script src="../js/script.js"></script>
    ';
}


function HeaderInfo()
{
    if (
        !isset($_SESSION["ConsecutivoUsuario"])
        || !isset($_SESSION["NombreUsuario"])
        || !isset($_SESSION["RolUsuario"])
    )
    {
        header(
            "Location: /Ambiente_ropa/View/vInicio/login.php"
        );

        exit();
    }

    $nombreUsuario = htmlspecialchars(
        $_SESSION["NombreUsuario"]
    );

    $nombreRol = htmlspecialchars(
        $_SESSION["RolUsuario"]
    );

    echo '
        <header id="header">

            <div id="header-wrap">

                <nav class="secondary-nav border-bottom py-2">

                    <div class="container">

                        <div class="row align-items-center">

                            <div
                                class="col-lg-4 d-none d-lg-block"
                            >

                                <span class="text-muted">

                                    <i class="fa fa-phone me-2"></i>

                                    +506 8888-7777

                                </span>

                            </div>

                            <div class="col-lg-4 text-center">

                                <span class="fw-semibold">

                                    Envío gratis en compras mayores
                                    a <strong>$200</strong>

                                </span>

                            </div>

                            <div class="col-lg-4">

                                <div
                                    class="d-flex justify-content-end align-items-center"
                                >

                                    <a
                                        href="Carrito.php"
                                        title="Carrito"
                                        class="text-dark me-3"
                                    >

                                        <i
                                            class="fa fa-shopping-cart fa-lg"
                                        ></i>

                                    </a>

                                    <div class="dropdown">

                                        <a
                                            class="nav-link dropdown-toggle d-flex align-items-center text-decoration-none"
                                            href="#"
                                            id="dropdownUsuario"
                                            role="button"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                        >

                                            <div
                                                class="rounded-circle bg-dark text-white d-flex justify-content-center align-items-center"
                                                style="width:40px;height:40px;"
                                            >

                                                <i class="fa fa-user"></i>

                                            </div>

                                            <div class="ms-2 text-start">

                                                <div
                                                    class="fw-bold"
                                                    style="font-size:14px;"
                                                >
                                                    ' . $nombreUsuario . '
                                                </div>

                                                <small class="text-muted">
                                                    ' . $nombreRol . '
                                                </small>

                                            </div>

                                        </a>

                                        <ul
                                            class="dropdown-menu dropdown-menu-end shadow p-2"
                                            aria-labelledby="dropdownUsuario"
                                        >

                                            <li>

                                                <a
                                                    class="dropdown-item rounded py-2"
                                                    href="Principal.php"
                                                >

                                                    <i
                                                        class="fa fa-home me-2"
                                                    ></i>

                                                    Inicio

                                                </a>

                                            </li>

                                            <li>

                                                <a
                                                    class="dropdown-item rounded py-2"
                                                    href="Productos.php"
                                                >

                                                    <i
                                                        class="fa fa-shopping-bag me-2"
                                                    ></i>

                                                    Productos

                                                </a>

                                            </li>

                                            <li>

                                                <a
                                                    class="dropdown-item rounded py-2"
                                                    href="Carrito.php"
                                                >

                                                    <i
                                                        class="fa fa-shopping-cart me-2"
                                                    ></i>

                                                    Mi carrito

                                                </a>

                                            </li>

                                            <li>

                                                <hr class="dropdown-divider">

                                            </li>

                                            <li>

                                                <a
                                                    class="dropdown-item rounded py-2 text-danger"
                                                    href="/Ambiente_ropa/Controller/CerrarSessionController.php"
                                                >

                                                    <i
                                                        class="fa fa-sign-out me-2"
                                                    ></i>

                                                    Cerrar sesión

                                                </a>

                                            </li>

                                        </ul>

                                    </div>

                                    <a
                                        href="/Ambiente_ropa/Controller/CerrarSessionController.php"
                                        class="btn btn-outline-danger btn-sm ms-3"
                                    >

                                        <i
                                            class="fa fa-sign-out me-1"
                                        ></i>

                                        Cerrar sesión

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </nav>

            </div>

        </header>
    ';
}


function FooterInfo()
{
    echo '
        <footer id="footer">

            <div class="container">

                <div class="footer-menu-list">

                    <div
                        class="row d-flex flex-wrap justify-content-between"
                    >

                        <div
                            class="col-lg-4 col-md-6 col-sm-12"
                        >

                            <div class="footer-menu">

                                <h1 class="widget-title">
                                    Tienda de Ropa
                                </h1>

                                <p>
                                    Ropa moderna, cómoda y de calidad.
                                </p>

                            </div>

                        </div>

                        <div
                            class="col-lg-4 col-md-6 col-sm-12"
                        >

                            <div class="footer-menu">

                                <h5 class="widget-title">
                                    Servicio al cliente
                                </h5>

                                <p>
                                    Para consultas puede escribirnos a
                                    contacto@tiendaropa.com
                                </p>

                            </div>

                        </div>

                        <div
                            class="col-lg-4 col-md-6 col-sm-12"
                        >

                            <div class="footer-menu">

                                <h5 class="widget-title">
                                    Contáctanos
                                </h5>

                                <p>
                                    Teléfono: +506 2026-1182
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <hr>

        </footer>

        <div id="footer-bottom">

            <div class="container">

                <p>
                    Tienda de Ropa &copy; 2026.
                    Todos los derechos reservados.
                </p>

            </div>

        </div>
    ';
}