<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>

<?php

helper('form');
?>
<style>
body {
    background-color: rgba(0, 0, 0, 0.9);

}
</style>

<div class="d-flex align-items-center py-4 h-auto row me-0">
    <main class="form-signin m-auto border pt-5 pb-4 px-3 rounded bg-white col-md-4 col-9">
        <div class="d-flex flex-column align-items-center">
            <i class="fa fa-paw title" style="font-size: 64px;" aria-hidden="true"></i>
            <h1 class="h3 mb-3 fw-normal ">Agregar producto</h1>
        </div>

        <?= form_open_multipart("", ['class' => 'd-flex flex-column gap-2']) ?>
        <div class="form-floating">
            <?= form_input(['name' => 'nombre_producto', 'class' => 'form-control', 'id' => 'nombre_producto', 'placeholder' => 'Name']) ?>
            <?= form_label('Nombre del producto', 'nombre_producto') ?>
        </div>

        <div class="form-floating">
            <?= form_input(['name' => 'descripcion_producto', 'class' => 'form-control', 'id' => 'descripcion_producto', 'placeholder' => 'Desc']) ?>
            <?= form_label('Descripcion del producto', 'descripcion_producto') ?>
        </div>
        <div class="row gy-2 gx-3 align-items-center">
            <div class="col-6">
                <label class="visually-hidden" for="autoSizingInput"></label>
                <input type="text" class="form-control" id="autoSizingInput" placeholder="Stock">
            </div>
            <div class="col-6">
                <label class="visually-hidden" for="autoSizingInputGroup"></label>
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Precio">
                </div>
            </div>
        </div>
        <div class="form-floating">
            <?= form_input(['name' => 'imagen_producto', 'class' => 'form-control','type' => 'file']) ?>
            <?= form_label('Imagen del producto', 'imagen_producto') ?>
        </div>
        <div class="form-floating">
        
            <?= form_dropdown(['name' => 'categoria_producto', 'class' => 'form-control'], $categorias, [0]) ?>
            <?= form_label('Categoria del producto', 'categoria_producto') ?>
        </div>
        <div class="form-floating">
            <?= form_dropdown(['name' => 'subcategoria_producto', 'class' => 'form-control'], $subcategorias, [0]) ?>
            <?= form_label('SubCategoria del producto', 'subcategoria_producto') ?>
        </div>
        <div class="form-floating">
            <?= form_dropdown(['name' => 'marca_producto', 'class' => 'form-control'], $marcas, [0]) ?>
            <?= form_label('Marca del producto', 'marca_producto') ?>
        </div>

        <?= form_close() ?>

    </main>
    <main class="form-register m-auto border pt-5 pb-4 px-3 rounded bg-white col-md-4 col-9 d-none">
        <form class="d-flex flex-column gap-2" action="<?= site_url('/register') ?>" method="POST">
            <div class="d-flex flex-column align-items-center">
                <i class="fa fa-paw title" style="font-size: 64px;" aria-hidden="true"></i>
                <h1 class="h3 mb-3 fw-normal ">Crear cuenta</h1>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="nameInput" placeholder="Marcos" name="name">
                <label for="floatingInput">Nombre</label>
                <?php if (session()->has('validation') && session('validation')->hasError('name')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc(session('validation')->getError('name')) ?></span>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="surnameInput" placeholder="Mazzanti" name="surname">
                <label for="floatingInput">Apellido</label>
                <?php if (session()->has('validation') && session('validation')->hasError('surname')) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc(session('validation')->getError('surname')) ?></span>
                </div>
                <?php endif; ?>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Correo electronico</label>
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