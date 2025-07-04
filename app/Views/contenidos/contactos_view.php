<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>
<?php
helper('form');
?>


<section class="container mt-3 bg-translucido">
    <section>
        <div class="row">
            <div class="col ">
                <h1 class="title puppy">Informacion de contacto</h1>
                <ul class="sans-deva fs-5">
                    <li>
                        <strong>👨‍💼 Titular de la empresa:</strong> Zambrano, Ariel
                    </li>
                    <li>
                        <strong>®️ Razon social:</strong> Full Animal. SA
                    </li>
                    <li>
                        <strong>☎️ Telefono:</strong> 3794-008595
                    </li>
                    <li>
                        <strong>📷
                            Instagram:</strong>
                        <a href="https://instagram.com/full.animal" style="color: orange;">full.animal</a>
                    </li>
                    <li>
                        <strong>✉️ Email:</strong> <a href="mailto:fullanimal@gmail.com"
                            style="color: orange;">fullanimal@gmail.com</a>
                    </li>
                    <li>
                        <strong>🏠 Domicilio Legal:</strong> Brasil 809, Corrientes, Corrientes, Argentina
                    </li>
                    <li>
                        <strong>⌚ Horario de atencion:</strong> Lunes a Sabado de 9hs a 13hs y 17hs a 21hs, Domingo
                        cerrado.
                    </li>
                </ul>
            </div>

            <div class="col">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d442.5063511246984!2d-58.82409126851818!3d-27.467677519119356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b798a0bf095%3A0x2168fde8dde25df7!2sFull%20Animal!5e0!3m2!1ses-419!2sar!4v1744293678283!5m2!1ses-419!2sar"
                    class="iframe-map" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>



    </section>


    <section class="mt-3 ">
        <h1 class="text-center title puppy">Formulario de contacto</h1>
        <?= form_open('/contacto', ['class' => 'border rounded p-3 sans-deva fs-5']) ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre..." name="nombre">
            <?php if (isset($validation) && $validation->hasError('nombre')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc($validation->getError('nombre')) ?></span>
                </div>
            <?php endif; ?>

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                placeholder="Ingresa tu email..." name="email">
            <?php if (isset($validation) && $validation->hasError('email')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc($validation->getError('email')) ?></span>
                </div>
            <?php endif; ?>

        </div>
        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje:</label>

            <textarea class="form-control" aria-label="With textarea" id="mensaje" rows="5"
                placeholder="Mensaje a la empresa..." name="mensaje"></textarea>

            <?php if (isset($validation) && $validation->hasError('mensaje')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc($validation->getError('mensaje')) ?></span>
                </div>
            <?php endif; ?>

        </div>

        <button type="submit" class="btn btn-warning">Enviar</button>
        <?= form_close() ?>
    </section>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {



        // Si se mostró un mensaje de éxito, reiniciar el formulario
        <?php if (session()->getFlashdata('success')): ?>
            const form = document.querySelector('form');
            if (form) {
                form.reset();
            }
            Swal.fire({
                title: '<i class="fa fa-paw" aria-hidden="true" style="font-size: 100px; color: orange;"></i> <h1> Gracias por su mensaje! </h1>',
                text: "Nos comunicaremos con usted a la brevedad!!",
                timer: 2000
            });
        <?php endif; ?>
    });
</script>

<?php $this->endSection(); ?>