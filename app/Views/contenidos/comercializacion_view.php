<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>




<section class="container mt-3">
    <div class="row">
        <div class="col-12 col-md-6 bg-translucido">
            <img class="w-100" src="<?= base_url('assets/img/repartidor.jpg') ?>">
            <h1 class="title puppy">Envios</h1>
            <ul class="meow fs-5">
                <li>
                    Realizamos envios a domicilio dentro de las cuatro avenidas.
                </li>
                <li>
                    El coste dependera de la distancia al local.
                </li>
                <li>
                    El horario de los envios es de 13hs a 15hs y 20hs a 22hs.
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-6 bg-translucido">
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
                <li>Con tarjetas visas y mastercard tenes hasta 3 cuotas sin interes.</li>
                <li class="title">
                    <h5 class="fs-3 fw-bold">Aprovecha!!</h5>
                </li>
            </ul>

            <img class="w-100" src="<?= base_url("assets/img/medios_de_pago.jpg") ?>">
        </div>
    </div>
    <section class="mt-2 bg-translucido p-4 rounded">
        <h2 class="title puppy">Preguntas frecuentes</h2>
        <ul class="meow fs-5">
            <li><strong>¿Como calculo el costo del envío?</strong> Podes consultarnos por WhatsApp con tu direccion y te
                damos el precio exacto.</li>
            <li><strong>¿Puedo programar el horario de entrega?</strong> Si, siempre dentro de las franjas horarias
                disponibles.</li>
            <li><strong>¿Hacen envios los fines de semana?</strong> Si, excepto los domingos por la tarde.</li>
            <li><strong>¿Puedo recibir el pedido el mismo dia?</strong> Si, si haces el pedido antes de las 12 hs o
                antes de las 19 hs, se entrega dentro de las franjas horarias disponibles.</li>
            <li><strong>¿Que pasa si no estoy en casa cuando llega el repartidor?</strong> Podemos coordinar otro
                horario o dejar el pedido en un lugar seguro si lo autorizas previamente.</li>
            <li><strong>¿Hacen envios fuera de las cuatro avenidas?</strong> No por ahora, pero podes consultarnos si
                estas cerca del limite.</li>
            <li><strong>¿Puedo pagar al recibir el pedido?</strong> Si, aceptamos efectivo y tarjetas al momento de la
                entrega.</li>
            <li><strong>¿Que billeteras virtuales aceptan?</strong> MercadoPago, Uala, Prex y otras compatibles con QR.
            </li>
            <li><strong>¿Tienen mínimo de compra para envío?</strong> No hay minimo, pero el costo del envío puede
                variar segun la distancia.</li>
            <li><strong>¿Ofrecen facturacion?</strong> Si, emitimos factura A y B. Solo tenes que solicitarla al momento
                de comprar.</li>
            <li><strong>¿Que medios de pago tienen promociones?</strong> Pagando en efectivo tenes 10% de descuento. Con
                Visa o Mastercard tenes hasta 3 cuotas sin interes.</li>

        </ul>
    </section>

    <div class="text-center mt-2">
        <a href="https://wa.me/1234567890" target="_blank" class="rounded-5 meow p-4 fs-4 d-block boton-whatsapp">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
            ¡Hacé tu pedido ahora por WhatsApp!
        </a>
    </div>


</section>

<?php $this->endSection(); ?>