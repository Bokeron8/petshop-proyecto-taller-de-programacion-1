<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>
<style>
body {
    background-color: rgba(0, 0, 0, 0.9);

}
</style>

<div class="d-flex align-items-center py-4 h-auto row me-0">
    <main class="form-signin m-auto border pt-5 pb-4 px-3 rounded bg-white col-md-4 col-9">
        <form class="d-flex flex-column gap-2" action="<?= site_url('/login') ?>" method="POST">
            <div class="d-flex flex-column align-items-center">
                <i class="fa fa-paw title" style="font-size: 64px;" aria-hidden="true"></i>
                <h1 class="h3 mb-3 fw-normal ">Iniciar sesion</h1>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="emailInputLogin" placeholder="name@example.com"
                    name="email_login" value="<?= old('email_login') ?>">

                <label for="emailInputLogin">Correo electronico</label>
                <?php if (session()->has('validation') && session('validation')->hasError('email_login')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc(session('validation')->getError('email_login')) ?></span>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    name="password_login">
                <label for="floatingPassword">Contraseña</label>
                <?php if (session()->has('validation') && session('validation')->hasError('password_login')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc(session('validation')->getError('password_login')) ?></span>
                </div>
                <?php endif; ?>
            </div>

            <button class="btn btn-warning w-100 py-2 mt-4" type="submit">Iniciar sesion</button>
            <button type="button" id="go-create-account" class="btn btn-secondary w-100 py-2">Crear cuenta</button>
        </form>


    </main>
    <main class="form-register m-auto border pt-5 pb-4 px-3 rounded bg-white col-md-4 col-9 d-none">
        <form class="d-flex flex-column gap-2" action="<?= site_url('/register') ?>" method="POST">
            <div class="d-flex flex-column align-items-center">
                <i class="fa fa-paw title" style="font-size: 64px;" aria-hidden="true"></i>
                <h1 class="h3 mb-3 fw-normal ">Crear cuenta</h1>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="nameInput" placeholder="Marcos" name="name"
                    value="<?= set_value('name') ?>">

                <label for="floatingInput">Nombre</label>
                <?php if (session()->has('validation') && session('validation')->hasError('name')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc(session('validation')->getError('name')) ?></span>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="surnameInput" placeholder="Mazzanti" name="surname"
                    value="<?= set_value('surname') ?>">

                <label for="floatingInput">Apellido</label>
                <?php if (session()->has('validation') && session('validation')->hasError('surname')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc(session('validation')->getError('surname')) ?></span>
                </div>
                <?php endif; ?>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="emailInputRegister" placeholder="name@example.com"
                    name="email" value="<?= set_value('email') ?>">

                <label for="emailInputRegister">Correo electronico</label>
                <?php if (session()->has('validation') && session('validation')->hasError('email')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc(session('validation')->getError('email')) ?></span>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña"
                    name="password">
                <label for="floatingPassword">Contraseña</label>
                <?php if (session()->has('validation') && session('validation')->hasError('password')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc(session('validation')->getError('password')) ?></span>
                </div>
                <?php endif; ?>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="repeatPasswordInput" placeholder="Repeti tu contraseña"
                    name="repeatPasswordInput">
                <label for="repeatPasswordInput">Repeti tu contraseña</label>
                <?php if (session()->has('validation') && session('validation')->hasError('repeatPasswordInput')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc(session('validation')->getError('repeatPasswordInput')) ?></span>
                </div>
                <?php endif; ?>
            </div>

            <button class="btn btn-warning w-100 py-2 mt-4" type="submit">Crear cuenta</button>
            <button class="btn btn-secondary w-100 py-2" type="button" id="go-login">Iniciar sesion</button>

        </form>
    </main>
</div>

<script>
let $ = (string) => document.querySelector(string)

let goCreateBtn = $('#go-create-account');
let goLogin = $('#go-login');
let formSignIn = $('.form-signin');
let formRegister = $('.form-register');

if (<?= session()->has('registering') ? true : 'false' ?>) {
    formSignIn.classList.add('d-none')
    formRegister.classList.remove('d-none')
}

formSignIn.addEventListener('animationend', (e) => {
    console.log(e)

    if (e.animationName == 'scale-out-center') {
        formSignIn.classList.add('d-none')
        formSignIn.classList.remove('scale-out-center')

        formRegister.classList.add('scale-in-center')
        formRegister.classList.remove('d-none')
    }

})

formRegister.addEventListener('animationend', (e) => {
    if (e.animationName == 'scale-out-center') {
        formRegister.classList.add('d-none')
        formRegister.classList.remove('scale-out-center')

        formSignIn.classList.add('scale-in-center')
        formSignIn.classList.remove('d-none')
    }
})

goCreateBtn.addEventListener("click", function() {
    formSignIn.classList.remove('scale-in-center')
    formSignIn.classList.add('scale-out-center')
})


goLogin.addEventListener("click", function() {
    formRegister.classList.remove('scale-in-center')
    formRegister.classList.add('scale-out-center')
})
</script>

<?php $this->endSection(); ?>