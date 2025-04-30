<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>


<?php
$cards = [
    ["titulo" => "Alimentos", "texto" => "Descripción breve de la tarjeta 1.", "href" => '#', "alt" => "Imagen de comida para perros", "imgSrc" => "assets/img/alimento.avif"],
    ["titulo" => "Accesorios y Juguetes", "texto" => "Descripción breve de la tarjeta 1.", "href" => '#', "alt" => "Imagen de juguetes para perros", "imgSrc" => "assets/img/accesorios.avif"],
    ["titulo" => "Higiene", "texto" => "Descripción breve de la tarjeta 1.", "href" => '#', "alt" => "Imagen de shampoos para perros y gatos", "imgSrc" => "assets/img/shampoo.avif"],
    ["titulo" => "Medicamentos", "texto" => "Consulta médica, vacunación y más.", "href" => '#', "alt" => "Imagen de veterinario atendiendo a un perro", "imgSrc" => "assets/img/veterinario.avif"]
];
?>


<section class="mb-2">
    <!-- Componente del carrusel -->
    <img src="<?= base_url('assets/img/petshop_hero.png') ?>" class="d-block w-100 carousel-hero" alt="Portada petshop">
</section>
<!-- Fin del carrusel -->

<section class="container mt-3">
    <!-- Define un contenedor que centraliza la sección y aplica margen superior -->
    <div class="row">
        <h1 class="text-center title">Nuestros Productos</h1>
        <!-- Primer tarjeta: Ocupa 4 columnas en pantallas medianas -->
        <?php foreach ($cards as $titulo => $value): ?>

        <div class="col-md-3 col-6 mb-2">
            <!-- Componente de tarjeta de Bootstrap -->
            <div class="card h-100">
                <!-- Imagen de la tarjeta -->
                <img src="<?= base_url($value['imgSrc']) ?>" class="card-img-top carta-productos"
                    alt="<?= $value['alt'] ?>">
                <!-- Cuerpo de la tarjeta: Contiene el texto y el botón -->
                <div class="card-body">
                    <!-- Título de la tarjeta -->
                    <h5 class="card-title puppy fw-bold"><?= $value['titulo'] ?></h5>
                    <!-- Texto descriptivo de la tarjeta -->
                    <!-- Botón de la tarjeta -->
                    <a href="#" class="btn btn-outline-warning meow">Ver productos</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>

    </div>
    <section class="mt-4">
        <h1 class="text-center title">Novedades</h1>

        <div style="max-width: 760px; margin-left:auto; margin-right:auto">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicadores (puntos debajo del carrusel para cambiar de imagen) -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>

                </div>
                <!-- Contenedor de las imágenes del carrusel -->
                <div class="carousel-inner">
                    <!-- Primera imagen (activa por defecto) -->
                    <div class="carousel-item active">
                        <img src="<?= base_url("assets/img/producto1.jpg") ?>" class="d-block w-100 carousel-images"
                            alt="Imagen 1"> <!-- Imagen 1 -->
                    </div>
                    <!-- Segunda imagen -->
                    <div class="carousel-item">
                        <img src="<?= base_url("assets/img/producto2.jpg") ?>" class="d-block w-100 carousel-images"
                            alt="Imagen 2"> <!-- Imagen 2 -->
                    </div>

                    <div class="carousel-item">
                        <img src="<?= base_url("assets/img/producto3.jpg") ?>"
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
    </section>

    <section class="mt-5 bg-translucido p-4 rounded">
        <h1 class="title text-center mb-4">🎉 Promociones especiales</h1>
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3">
                <div class="border p-3 h-100 bg-white shadow-sm rounded">
                    <img src="<?= base_url("assets/img/promo1.avif") ?>" alt="" class="w-100">
                    <h5 class="puppy">3x2 en Alimento Balanceado</h5>
                    <p class="meow">Llevás 3 bolsas, ¡pagás solo 2!</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="border p-3 h-100 bg-white shadow-sm rounded">
                    <img src="<?= base_url("assets/img/promo2.avif") ?>" alt="" class="w-100">
                    <h5 class="puppy">10% Off pagando en efectivo</h5>
                    <p class="meow">En todas tus compras, sin mínimo.</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="border p-3 h-100 bg-white shadow-sm rounded">
                    <img src="<?= base_url("assets/img/promo3.avif") ?>" alt="" class="w-100">
                    <h5 class="puppy">Shampoo + antipulgas</h5>
                    <p class="meow">Servicio completo para tu mascota con descuento.</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="border p-3 h-100 bg-white shadow-sm rounded">
                    <img src="<?= base_url("assets/img/promo4.avif") ?>" alt="" class="w-100">
                    <h5 class="puppy">Juguetes con 15% de descuento</h5>
                    <p class="meow">Juguetes seleccionados para perros y gatos.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-4 d-flex flex-column text-center align-items-center bg-translucido">
        <h1 class="text-center title">Sobre Nosotros</h1>
        <p class="meow fs-4" style="max-width: 700px;">Un negocio dedicado con pasion al cuidado y bienestar
            de tus mascotas. Nuestro
            objetivo es
            brindar todo lo
            necesario para asegurar una vida feliz, saludable y plena para tu peludo compañero...</p>
        <a class="rounded-5 meow p-4 fs-4 d-block boton-conoce-mas" href="<?= base_url('/quienes-somos') ?>">Conoce
            mas sobre
            nosotros!!!</a>
    </section>
</section>
<?php $this->endSection(); ?>