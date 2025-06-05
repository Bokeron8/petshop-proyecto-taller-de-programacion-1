<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>


<?php

helper('form');
?>

<section>

    <h1 class="text-center title mt-3 bg-translucido">Nuestros Productos</h1>

    <?php if (!empty($carrito)) : ?>
    <table border="1" cellpadding="10" cellspacing="0" class="bg-translucido">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php foreach ($carrito as $item): ?>
            <tr>
                <td><?= esc($item['name']) ?></td>
                <td><?= number_format($item['price'], 2) ?> €</td>
                <td><?= esc($item['qty']) ?></td>
                <td><?= number_format($item['subtotal'], 2) ?> €</td>
            </tr>
            <?php $total += $item['subtotal']; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                <td><strong><?= number_format($total, 2) ?> €</strong></td>
            </tr>
        </tbody>
    </table>
    <?php else: ?>
    <p>Tu carrito está vacío.</p>
    <?php endif; ?>

    <br>
    <a href="<?= base_url('productos') ?>">← Seguir comprando</a> |
    <a href="<?= base_url('checkout') ?>">Finalizar compra →</a>

</section>


<?php $this->endSection(); ?>