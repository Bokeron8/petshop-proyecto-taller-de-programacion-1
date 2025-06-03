<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>


<?php

helper('form');
?>

<section>

    <h1 class="text-center title">Nuestros Productos</h1>

    <div class="row me-3 ms-3">
        <div class="col-md-3 col-12 border border-5 bg-translucido gap-2 d-flex flex-column">
            <h1>filtros</h1>
            <?= form_open('/productos', ['class' => 'd-flex flex-column gap-2', 'method' => 'GET']) ?>
            <div>
                <?= form_dropdown(
                    ['name' => 'categoria_producto', 'class' => 'form-control'],
                    $categorias
                ) ?>
                <?php if (isset($errors['categoria_producto'])) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc($errors['categoria_producto']) ?></span>
                </div>
                <?php endif; ?>
            </div>

            <div>
                <?= form_dropdown(
                    ['name' => 'subcategoria_producto', 'class' => 'form-control'],
                    $subcategorias
                ) ?>
                <?php if (isset($errors['subcategoria_producto'])) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc($errors['subcategoria_producto']) ?></span>
                </div>
                <?php endif; ?>
            </div>

            <div>
                <?= form_dropdown(
                    ['name' => 'marca_producto', 'class' => 'form-control'],
                    $marcas
                ) ?>
                <?php if (isset($errors['marca_producto'])) : ?>
                <div class="alert alert-danger error-container" role="alert">
                    <span><?= esc($errors['marca_producto']) ?></span>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <label for="customRange1" class="form-label">Precio maximo</label>
                <input type="range" class="form-range" id="customRange1" min=0 max=999999>
                <div class="d-flex justify-content-between">
                    <span>0</span>
                    <span>999.999</span>
                </div>

            </div>
            <?= form_submit('productos', 'Aplicar filtros', ['class' => 'btn btn-warning']) ?>
        </div>
        <?= form_close() ?>

        <div class="col-md-9 col-12">

            <div class="row ">
                <?php foreach ($productos as $producto): ?>
                <div class="col-md-3 col-6 mb-2">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>"
                            class="card-img-top carta-productos">
                        <div class="card-body">
                            <h5 class="card-title puppy fw-bold"><?= $producto['nombre_producto'] ?></h5>
                            <a href="#" class="btn btn-outline-warning meow">Ver productos</a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>


        </div>
    </div>

</section>


<?php $this->endSection(); ?>