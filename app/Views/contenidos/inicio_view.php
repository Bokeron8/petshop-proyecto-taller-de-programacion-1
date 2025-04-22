<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>


<?php
$cards = [
    ["titulo" => "Alimentos", "texto" => "Descripción breve de la tarjeta 1.", "href" => '#', "alt" => "Imagen de comida para perros", "imgSrc" => "assets/img/card_alimento.webp"],
    ["titulo" => "Accesorios y Juguetes", "texto" => "Descripción breve de la tarjeta 1.", "href" => '#', "alt" => "Imagen de juguetes para perros", "imgSrc" => "assets/img/card_juguetes.jpg"],
    ["titulo" => "Higiene y medicamentos", "texto" => "Descripción breve de la tarjeta 1.", "href" => '#', "alt" => "Imagen de shampoos para perros y gatos", "imgSrc" => "assets/img/card_shampoo.webp"]
];
?>


<section class="container mt-4">
    <!-- Componente del carrusel -->
    <img src="<?= base_url('assets/img/petshop_hero.jpg') ?>" class="d-block w-100 carousel-hero rounded"
        alt="Portada petshop">
</section>
<!-- Fin del carrusel -->

<section class="container mt-5">
    <!-- Define un contenedor que centraliza la sección y aplica margen superior -->
    <div class="row">
        <!-- Primer tarjeta: Ocupa 4 columnas en pantallas medianas -->
        <?php foreach ($cards as $titulo => $value): ?>

        <div class="col-md-4 mb-2">
            <!-- Componente de tarjeta de Bootstrap -->
            <div class="card">
                <!-- Imagen de la tarjeta -->
                <img src="<?= base_url($value['imgSrc']) ?>" class="card-img-top carta-productos"
                    alt="<?= $value['alt'] ?>">
                <!-- Cuerpo de la tarjeta: Contiene el texto y el botón -->
                <div class="card-body">
                    <!-- Título de la tarjeta -->
                    <h5 class="card-title puppy fw-bold"><?= $value['titulo'] ?></h5>
                    <!-- Texto descriptivo de la tarjeta -->
                    <!-- Botón de la tarjeta -->
                    <a href="#" class="btn btn-outline-primary meow">Ver productos</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>

    </div>
</section>
<?php $this->endSection(); ?>