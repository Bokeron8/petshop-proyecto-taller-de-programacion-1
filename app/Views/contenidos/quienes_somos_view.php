<?php $this->extend('plantillas/plantilla'); ?>
<?php $this->section('content'); ?>

<section class="container mt-4" style="background-color: rgba(255, 255, 255, 0.6);">
    <h1 class="title puppy  animate__animated animate__fadeInRightBig" style="color: orange">
        Somos Full Animal...
    </h1>

    <p class="puppy fw-semibold fs-5">Un negocio dedicado con pasion al cuidado y bienestar de tus mascotas.
        Nuestro objetivo
        es
        brindar todo
        lo necesario para asegurar una vida feliz, saludable y plena para tu peludo compañero. En nuestra tienda
        encontraras un extenso catalogo de productos cuidadosamente seleccionados, que abarca desde alimentos de
        alta calidad, juguetes interactivos, accesorios comodos y duraderos, hasta productos de higiene, salud y
        entrenamiento.</p>

    <div style="max-width: 760px; margin-left:auto; margin-right:auto">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicadores (puntos debajo del carrusel para cambiar de imagen) -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>

            </div>
            <!-- Contenedor de las imágenes del carrusel -->
            <div class="carousel-inner">
                <!-- Primera imagen (activa por defecto) -->
                <div class="carousel-item active">
                    <img src="<?= base_url("assets/img/fullanimal_dia2.jpg") ?>" class="d-block w-100 carousel-images"
                        alt="Imagen 1"> <!-- Imagen 1 -->
                </div>
                <!-- Segunda imagen -->
                <div class="carousel-item">
                    <img src="<?= base_url("assets/img/fullanimal_interior2.webp") ?>"
                        class="d-block w-100 carousel-images" alt="Imagen 2"> <!-- Imagen 2 -->
                </div>

                <div class="carousel-item">
                    <img src="<?= base_url("assets/img/perra_guapetona3.jpg") ?>"
                        class="d-block w-100 carousel-images object-fit-fill" alt="Imagen 2"> <!-- Imagen 2 -->
                </div>
            </div>
            <!-- Botón para ir a la imagen anterior -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span> <!-- Ícono de anterior -->
                <span class="visually-hidden">Anterior</span>
            </button>
            <!-- Botón para ir a la imagen siguiente -->
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span> <!-- Ícono de siguiente -->
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
    <section class="mt-3 ">

        <p class="puppy fw-semibold fs-5" style="color: #333">
            Sabemos que cada mascota es unica, por eso ofrecemos opciones para perros, gatos, aves, pequeños roedores y
            mas, adaptadas a sus distintas necesidades y etapas de vida. Nuestro compromiso es acompañarte en cada paso,
            ofreciendote asesoria personalizada y productos que realmente marcan la diferencia en la vida de tus
            animales.
            <br>
            Porque ellos merecen lo mejor, ¡nosotros lo tenemos todo para ellos!
        </p>
    </section>

</section>

<?php $this->endSection(); ?>