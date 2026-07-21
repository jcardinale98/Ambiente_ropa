<?php

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/Model/UtilitarioModel.php';

RequerirRol("Cliente");

include_once $_SERVER['DOCUMENT_ROOT']
    . '/Ambiente_ropa/View/LayoutInterno.php';

?>

<!DOCTYPE html>

<html lang="es">

<?php
    ImportCSS();
?>

<body>

    <?php
        HeaderInfo();
    ?>

    <div class="preloader-wrapper">

        <div class="preloader"></div>

    </div>

    <!-- Carrusel principal -->

    <section id="billboard" class="overflow-hidden">

        <button class="button-prev">

            <i class="icon icon-chevron-left"></i>

        </button>

        <button class="button-next">

            <i class="icon icon-chevron-right"></i>

        </button>

        <div class="swiper main-swiper">

            <div class="swiper-wrapper">

                <div
                    class="swiper-slide"
                    style="
                        background-image: url('../images/banner1.jpg');
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: center;
                    "
                >

                    <div class="banner-content">

                        <div class="container">

                            <div class="row">

                                <div class="col-md-6">

                                    <h2 class="banner-title">
                                        Colección de verano
                                    </h2>

                                    <p>
                                        Descubre nuestra colección con diseños
                                        frescos y estilos modernos.
                                    </p>

                                    <div class="btn-wrap">

                                        <a
                                            href="Productos.php"
                                            class="btn btn-light btn-medium"
                                        >
                                            Comprar ahora
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div
                    class="swiper-slide"
                    style="
                        background-image: url('../images/banner2.jpg');
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: center;
                    "
                >

                    <div class="banner-content">

                        <div class="container">

                            <div class="row">

                                <div class="col-md-6">

                                    <h2 class="banner-title">
                                        Colección casual
                                    </h2>

                                    <p>
                                        Explora el catálogo de ropa casual para
                                        hombres y mujeres.
                                    </p>

                                    <div class="btn-wrap">

                                        <a
                                            href="Productos.php"
                                            class="btn btn-light btn-medium"
                                        >
                                            Comprar ahora
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Marcas -->

    <section
        id="brand-collection"
        class="padding-medium bg-light-grey"
    >

        <div class="container">

            <div
                class="d-flex flex-wrap justify-content-between"
            >

                <img
                    src="../images/brand1.png"
                    alt="Marca 1"
                    class="brand-image"
                >

                <img
                    src="../images/brand2.png"
                    alt="Marca 2"
                    class="brand-image"
                >

                <img
                    src="../images/brand3.png"
                    alt="Marca 3"
                    class="brand-image"
                >

                <img
                    src="../images/brand4.png"
                    alt="Marca 4"
                    class="brand-image"
                >

                <img
                    src="../images/brand5.png"
                    alt="Marca 5"
                    class="brand-image"
                >

            </div>

        </div>

    </section>

    <!-- Accesos principales -->

    <section class="padding-medium">

        <div class="container text-center">

            <h2>Conoce nuestros productos</h2>

            <p>
                Consulta el catálogo, agrega artículos al carrito y
                realiza tus compras.
            </p>

            <div
                class="d-flex justify-content-center gap-3 flex-wrap mt-4"
            >

                <a
                    href="Productos.php"
                    class="btn btn-dark"
                >

                    <i class="fa-solid fa-shirt"></i>

                    Ver productos

                </a>

                <a
                    href="Perfil.php"
                    class="btn btn-outline-dark"
                >

                    <i class="fa-solid fa-user-gear"></i>

                    Mi perfil

                </a>

            </div>

        </div>

    </section>

    <?php
        FooterInfo();
    ?>

    <?php
        ImportJS();
    ?>

</body>

</html>