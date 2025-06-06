<?= $this->extend('plantillas/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>" class="img-fluid rounded" alt="<?= esc($producto['nombre_producto']) ?>">
        </div>
        <div class="col-md-7">
            <h2><?= esc($producto['nombre_producto']) ?></h2>
            <p>Descripcion: <?= esc($producto['descripcion_producto']) ?></p>
            <p><strong>Precio:</strong> $ <?= number_format($producto['precio_producto'], 2) ?></p>
            <p><strong>Stock:</strong> <?= esc($producto['stock_producto']) ?> unidades</p>

            <?php if (session('usuario')) : ?>
                <?= form_open('/agregar-carrito') ?>
                    <?= form_hidden('id', $producto['id_producto']) ?>
                    <?= form_hidden('nombre', $producto['nombre_producto']) ?>
                    <?= form_hidden('precio', $producto['precio_producto']) ?>
                    <?= form_hidden('imagen', 'assets/uploads/' . $producto['imagen_producto']) ?>
                    <?= form_submit('agregar', 'Agregar al carrito', ['class' => 'btn btn-warning']) ?>
                <?= form_close() ?>
            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="btn btn-primary">Iniciar sesión para comprar</a>
            <?php endif; ?>

            <a href="<?= base_url('productos') ?>" class="btn btn-secondary mt-2">← Volver</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
