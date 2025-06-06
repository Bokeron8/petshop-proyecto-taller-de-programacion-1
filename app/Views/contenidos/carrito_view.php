<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>

<?php helper('form'); ?>

<section>
    <h1 class="text-center mt-3 bg-translucido title">Tu Changuito</h1>

    <?php if (!empty($carrito)) : ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered bg-translucido">
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Imagen</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($carrito as $index => $item): ?>
                <tr>
                    <td><?= esc($item['name']) ?></td>
                    <td>
                        <?php if (isset($item['options']['imagen'])): ?>
                            <img src="<?= base_url($item['options']['imagen']) ?>" alt="Imagen de <?= esc($item['name']) ?>" width="60" height="60" style="object-fit: cover;">
                        <?php else: ?>
                             <span>Sin imagen</span>
                        <?php endif; ?>
                    </td>
                    <td><?= number_format($item['price'], 2) ?> €</td>
                    <td><?= esc($item['qty']) ?></td>
                    <td><?= number_format($item['subtotal'], 2) ?> €</td>
                    <td>
                        <!-- Botón para eliminar un producto -->
                        <a href="<?= base_url('reducirProducto/'.$item['rowid']) ?>" class="btn btn-warning btn-sm" role="button">Quitar 1</a>
                        <!-- Botón para eliminar una fila -->
                        <a href="<?= base_url('eliminarProducto/'.$item['rowid']) ?>" class="btn btn-danger btn-sm" role="button">Quitar Todo</a>
                    </td>
                </tr>
                <?php $total += $item['subtotal']; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                    <td><strong><?= number_format($total, 2) ?> €</strong></td>
                    <td>
                        <!-- Botón para vaciar el carrito -->
                        <a href="<?= base_url('vaciarCarrito') ?>" class="btn btn-danger btn-sm" role="button">Vaciar Carrito</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <p class="text-center sans-deva fs-2">Tu carrito esta vacio.</p>
    <?php endif; ?>

    <div class="text-center mt-3">
        <a href="<?= base_url('productos') ?>" class="btn btn-secondary">← Seguir comprando</a>
        <a href="<?= base_url('checkout') ?>" class="btn btn-success">Finalizar compra →</a>
    </div>

</section>

<?php $this->endSection(); ?>
