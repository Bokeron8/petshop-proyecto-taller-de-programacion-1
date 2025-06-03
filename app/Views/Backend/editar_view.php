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
    <main class="form-signin m-auto border pt-5 pb-4 px-3 rounded bg-white col-md-6 col-9">
        <div class="d-flex flex-column align-items-center">
            <i class="fa fa-paw title" style="font-size: 64px;" aria-hidden="true"></i>
            <h1 class="h3 mb-3 fw-normal">Editar producto</h1>
        </div>

        <?= form_open_multipart('/admin/editar-producto/' . $producto['id_producto'], ['class' => 'd-flex flex-column gap-2']) ?>

        <div class="form-floating">
            <?= form_input([
                'name' => 'nombre_producto',
                'class' => 'form-control',
                'id' => 'nombre_producto',
                'value' => esc($producto['nombre_producto']),
                'placeholder' => 'Name'
            ]) ?>
            <?= form_label('Nombre del producto', 'nombre_producto') ?>

            <?php $errors = session('errors') ?>
            <?php if (isset($errors['nombre_producto'])) : ?>
            <div class="alert alert-danger error-container" role="alert">
                <span><?= esc($errors['nombre_producto']) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <div class="form-floating">
            <?= form_textarea([
                'name' => 'descripcion_producto',
                'class' => 'form-control',
                'id' => 'descripcion_producto',
                'placeholder' => 'Desc',
                'value' => esc($producto['descripcion_producto'])
            ], esc($producto['descripcion_producto'])) ?>
            <?= form_label('Descripción del producto', 'descripcion_producto') ?>
            <?php if (isset($errors['descripcion_producto'])) : ?>
            <div class="alert alert-danger error-container" role="alert">
                <span><?= esc($errors['descripcion_producto']) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <div class="row gy-2 gx-3 align-items-center">
            <div class="col-6">

                <input type="number" name="stock_producto" class="form-control" placeholder="Stock"
                    value="<?= esc($producto['stock_producto']) ?>">
                <?php if (isset($errors['stock_producto'])) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc($errors['stock_producto']) ?></span>
                </div>
                <?php endif; ?>

            </div>
            <div class="col-6">

                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="number" step="0.01" name="precio_producto" class="form-control" placeholder="Precio"
                        value="<?= esc($producto['precio_producto']) ?>">
                </div>
                <?php if (isset($errors['precio_producto'])) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc($errors['precio_producto']) ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-floating">
            <?= form_input([
                'name' => 'imagen_producto',
                'class' => 'form-control',
                'type' => 'file'
            ]) ?>
            <?= form_label('Imagen del producto', 'imagen_producto') ?>
            <small class="form-text text-muted">Dejar en blanco para mantener la imagen actual</small>
            <?php if (isset($errors['imagen_producto'])) : ?>
            <div class="alert alert-danger error-container" role="alert">
                <span><?= esc($errors['imagen_producto']) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <div class="form-floating">
            <?= form_dropdown(
                ['name' => 'categoria_producto', 'class' => 'form-control'],
                $categorias,
                $producto['id_categoria_producto']
            ) ?>
            <?= form_label('Categoría del producto', 'categoria_producto') ?>
            <?php if (isset($errors['categoria_producto'])) : ?>
            <div class="alert alert-danger error-container" role="alert">
                <span><?= esc($errors['categoria_producto']) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <div class="form-floating">
            <?= form_dropdown(
                ['name' => 'subcategoria_producto', 'class' => 'form-control'],
                $subcategorias,
                $producto['id_subcategoria_producto']
            ) ?>
            <?= form_label('Subcategoría del producto', 'subcategoria_producto') ?>
            <?php if (isset($errors['subcategoria_producto'])) : ?>
            <div class="alert alert-danger error-container" role="alert">
                <span><?= esc($errors['subcategoria_producto']) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <div class="form-floating">
            <?= form_dropdown(
                ['name' => 'marca_producto', 'class' => 'form-control'],
                $marcas,
                $producto['id_marca_producto']
            ) ?>
            <?= form_label('Marca del producto', 'marca_producto') ?>
            <?php if (isset($errors['marca_producto'])) : ?>
            <div class="alert alert-danger error-container" role="alert">
                <span><?= esc($errors['marca_producto']) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <br>
        <?= form_submit('guardar', 'Actualizar producto', ['class' => 'btn btn-warning']) ?>
        <?= form_close() ?>
    </main>
</div>


<?php $this->endSection(); ?>