<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <div class="col-12 col-md-6" style="background-color: rgba(255, 255, 255, 0.6);">
            <img class="w-100" style="max-width: 500px;" src="<?= base_url('assets/img/repartidor.jpg') ?>">
            <h1 class="title puppy">Envios</h1>
            <ul class="meow fs-5">
                <li>
                    Realizamos enviamos a domicilio dentro de las cuatro avenidas.
                </li>
                <li>
                    El coste dependera de la distancia al local.
                </li>
                <li>
                    El horario de los envios es de 13hs a 15hs y 20hs a 22hs.
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-6" style="background-color: rgba(255, 255, 255, 0.6);">
            <h1 class="title puppy">Formas de pago</h1>
            <ul class="meow  fs-5">
                <li>
                    Aceptamos todos los medios de pagos.
                </li>
                <li>
                    Efectivo, tarjetas de credito y debito, billetera virtuales, bitcoin, etc.
                </li>
                <li>
                    Pagando en efectivo tenes 10% de descuento en el total de tu compra.
                </li>
                <li>Con tarjetas visas y mastercard tenes hasta 3 coutos sin interes.</li>
                <li class="title">
                    <h5 class="fs-3 fw-bold">Aprovecha!!</h5>
                </li>
            </ul>
            <img class="w-100" style="max-width: 500px;" src="<?= base_url("assets/img/metodos_pago.jfif") ?>">
        </div>

</section>

<?php $this->endSection(); ?>