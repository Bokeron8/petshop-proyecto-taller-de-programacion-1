<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>


<?php
$cards = [
  ["titulo" => "Alimentos", "href" => '/productos?categoria_producto[]=1', "alt" => "Imagen de comida para perros", "imgSrc" => "assets/img/alimento.avif"],
  ["titulo" => "Accesorios y Juguetes", "href" => '/productos?categoria_producto[]=3&categoria_producto[]=4', "alt" => "Imagen de juguetes para perros", "imgSrc" => "assets/img/accesorios.avif"],
  ["titulo" => "Higiene", "href" => '/productos?categoria_producto[]=5', "alt" => "Imagen de shampoos para perros y gatos", "imgSrc" => "assets/img/shampoo.avif"],
  ["titulo" => "Medicamentos", "href" => '/productos?categoria_producto[]=2', "alt" => "Imagen de veterinario atendiendo a un perro", "imgSrc" => "assets/img/veterinario.avif"]
];
?>

<section>
  <?php if (session()->getFlashdata('error')): ?>
    <section class="container mt-3">

      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>

    </section>
  <?php endif; ?>

  <section class="mb-2">
    <img src="<?= base_url('assets/img/petshop_hero.png') ?>" class="d-block w-100 carousel-hero"
      alt="Portada petshop">
  </section>

  <section class="container mt-3 bg-translucido">

    <div class="row" data-aos="fade-up">
      <h1 class="text-center title">Nuestros Productos</h1>
      <?php foreach ($cards as $titulo => $value): ?>

        <div class="col-md-3 col-6 mb-2">
          <div class="card h-100">
            <img src="<?= base_url($value['imgSrc']) ?>" class="card-img-top carta-productos"
              alt="<?= $value['alt'] ?>">
            <div class="card-body">
              <h5 class="card-title puppy fw-bold"><?= $value['titulo'] ?></h5>
              <a href="<?= base_url($value['href']) ?>" class="btn meow btn-ver-mas ">Ver productos</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    </div>
    <section class="mt-4" data-aos="fade-up">
      <h1 class="text-center title">Novedades</h1>

      <div style="max-width: 760px; margin-left:auto; margin-right:auto">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
              class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
              aria-label="Slide 3"></button>

          </div>

          <div class="carousel-inner">

            <div class="carousel-item active">
              <a href="<?= base_url('producto/17') ?>">
                <img src="<?= base_url("assets/img/producto1.jpg") ?>"
                  class="d-block w-100 carousel-images" alt="Imagen 1">
              </a>

            </div>

            <div class="carousel-item">
              <a href="<?= base_url('producto/18') ?>">
                <img src="<?= base_url("assets/img/producto2.jpg") ?>"
                  class="d-block w-100 carousel-images" alt="Imagen 2">
              </a>
            </div>

            <div class="carousel-item">
              <a href="<?= base_url('producto/19') ?>">
                <img src="<?= base_url("assets/img/producto3.jpg") ?>"
                  class="d-block w-100 carousel-images object-fit-fill" alt="Imagen 2">
              </a>

            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>

          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </section>

    <section class="mt-5 p-4 rounded" data-aos="fade-up">
      <h1 class="title text-center mb-4">🎉 Promociones especiales</h1>
      <div class="row text-center">
        <div class="col-md-3 col-6 mb-3">
          <div class="border p-3 h-100 bg-white shadow-sm rounded">
            <img src="<?= base_url("assets/img/promo1.avif") ?>" alt="" class="w-100">
            <h5 class="puppy">3x2 en Alimento Balanceado</h5>
            <p class="sans-deva">Llevás 3 bolsas, ¡pagás solo 2!</p>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
          <div class="border p-3 h-100 bg-white shadow-sm rounded">
            <img src="<?= base_url("assets/img/promo2.avif") ?>" alt="" class="w-100">
            <h5 class="puppy">10% Off pagando en efectivo</h5>
            <p class="sans-deva">En todas tus compras, sin mínimo.</p>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
          <div class="border p-3 h-100 bg-white shadow-sm rounded">
            <img src="<?= base_url("assets/img/promo3.avif") ?>" alt="" class="w-100">
            <h5 class="puppy">Shampoo + antipulgas</h5>
            <p class="sans-deva">Servicio completo para tu mascota con descuento.</p>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
          <div class="border p-3 h-100 bg-white shadow-sm rounded">
            <img src="<?= base_url("assets/img/promo4.avif") ?>" alt="" class="w-100">
            <h5 class="puppy">Juguetes con 15% de descuento</h5>
            <p class="sans-deva">Juguetes elegidos para perros y gatos.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="mt-4 d-flex flex-column text-center align-items-center" data-aos="fade-up">
      <h1 class="text-center title">Sobre Nosotros</h1>
      <p class="meow fs-4" style="max-width: 700px;">Un negocio dedicado con pasion al cuidado y bienestar
        de tus mascotas. Nuestro
        objetivo es
        brindar todo lo
        necesario para asegurar una vida feliz, saludable y plena para tu peludo compañero...</p>
      <a class="rounded-5 meow p-4 fs-4 d-block boton-conoce-mas wobble-hor-bottom "
        href="<?= base_url('/quienes-somos') ?>">Conoce
        mas sobre
        nosotros!!!</a>
    </section>
  </section>
</section>


<?php $this->endSection(); ?>