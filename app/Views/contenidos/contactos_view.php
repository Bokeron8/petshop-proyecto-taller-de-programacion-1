<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>

<section class="container mt-3">
    <section>
        <div class="row">
            <div class="col" style="background-color: rgba(255, 255, 255, 0.6);">
                <h1 class="title puppy">Informacion de contacto</h1>
                <ul class="meow fs-5">
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
                        full.animal
                    </li>
                    <li>
                        <strong>✉️ Email:</strong> fullanimal@gmail.com
                    </li>
                    <li>
                        <strong>🏠 Domicilio Legal:</strong> Brasil 809, Corrientes, Corrientes, Argentina
                    </li>
                    <li>
                        <strong>⌚ Horario de atencion:</strong> Lunes a Viernes de 9hs a 13hs y 17hs a 21hs, Sabados de 9hs a 13hs, Domingo cerrado
                   </li>
                </ul>
            </div>

            <div class="col">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d442.5063511246984!2d-58.82409126851818!3d-27.467677519119356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b798a0bf095%3A0x2168fde8dde25df7!2sFull%20Animal!5e0!3m2!1ses-419!2sar!4v1744293678283!5m2!1ses-419!2sar"
                    style="border:0; min-width: 300px; width: 100%;height: 400px" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>



    </section>

    <section class="mt-3 " style="background-color: rgba(255, 255, 255, 0.6);">
        <h1 class="text-center title puppy">Formulario de contacto</h1>
        <form class="border rounded p-3 meow fs-5">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre..." name="nombre">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="Ingresa tu email..." name="email">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje:</label>

                <textarea class="form-control" aria-label="With textarea" id="mensaje" rows="5"
                    placeholder="Mensaje a la empresa..." name="mensaje"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </section>

</section>

<?php $this->endSection(); ?>