<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>

<div class="d-flex align-items-center py-4 bg-translucido h-auto row me-0" style="background-color: rgba(0,0,0,0.7);">

    <main class="form-signin  m-auto border p-5 px-3 rounded bg-white col-md-4 col-9">
        <form class="d-flex flex-column gap-2">
            <div class="d-flex flex-column align-items-center">
                <i class="fa fa-paw title" style="font-size: 64px;" aria-hidden="true"></i>
                <h1 class="h3 mb-3 fw-normal ">Iniciar sesion</h1>
            </div>

            <div class="form-floating"> <input type="email" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Correo electronico</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <button class="btn btn-warning w-100 py-2" type="submit">Iniciar sesion</button>
            <button class="btn btn-secondary w-100 py-2" type="submit">Crear cuenta</button>

        </form>
    </main>
</div>

<?php $this->endSection(); ?>