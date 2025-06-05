<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>


<?php

helper('form');
?>

<section>

    <h1 class="text-center title mt-3 bg-translucido">Nuestros Productos</h1>

    <div class="row me-3 ms-3">
        <div class="col-md-3 col-12 border border-5 bg-translucido gap-2 d-flex flex-column mb-2 p-2">
            <h3>Filtrar por</h3>
            <?= form_open('/productos', ['class' => 'd-flex flex-column gap-2', 'method' => 'GET']) ?>
            <div>
                <?= form_dropdown(
                    ['name' => 'categoria_producto', 'class' => 'form-control'],
                    $categorias,
                    selected: esc($categoria)

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
                    $subcategorias,
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
                    $marcas,
                    selected: esc($marca)

                ) ?>
                <?php if (isset($errors['marca_producto'])) : ?>
                    <div class="alert alert-danger error-container" role="alert">
                        <span><?= esc($errors['marca_producto']) ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col">
                    <label for="minPrice" class="form-label">Precio minimo</label>
                    <?= form_input(
                        ['name' => 'min_price', 'id' => 'minPrice', 'type' => 'number', 'min' => 0, 'max' => 999999],
                        value: esc($minPrice)
                    ) ?>
                </div>

                <div class="col">
                    <label for="maxPrice" class="form-label">Precio maximo</label>
                    <?= form_input(
                        ['name' => 'max_price', 'id' => 'maxPrice', 'type' => 'number', 'min' => 0, 'max' => 999999],
                        value: esc($maxPrice)
                    ) ?>
                </div>


            </div>
            <?= form_submit(value: 'Aplicar filtros', extra: ['class' => 'btn btn-warning']) ?>
        </div>
        <?= form_close() ?>

        <div class="col-md-9 col-12">

            <div class="row">
                <?php foreach ($productos as $producto): ?>
                    <div class="col-md-3 col-6 mb-2">
                        <div class="card h-100">
                            <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>"
                                class="card-img-top carta-productos">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title puppy fw-bold"><?= $producto['nombre_producto'] ?></h5>
                                <p class="card-text"><?= $producto['descripcion_producto']; ?></p>
                                <p class="card-text"> Precio: $<?= $producto['precio_producto']; ?></p>
                                <p class="card-text"> Stock: <?= $producto['stock_producto']; ?></p>
                                <?php $usuario = session('usuario') ?>
                                <?php if ($usuario) : ?>
                                    <a href="#" class="btn btn-warning sans-deva mt-auto">Agregar al carrito</a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>


        </div>
    </div>

</section>


<?php $this->endSection(); ?>