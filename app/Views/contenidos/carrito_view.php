<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>

<?php if (session()->getFlashdata('error')): ?>
<div class="toast-container position-fixed top-50 start-50 translate-middle p-3">
  <div class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <?= session()->getFlashdata('error') ?>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>
<?php endif; ?>


<?php helper('form'); ?>

<section class="container bg-translucido">
    <h1 class="text-center mt-3  sans-deva" style="color: orange;">Tu Carrito</h1>

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
                        <img src="<?= base_url($item['options']['imagen']) ?>" alt="Imagen de <?= esc($item['name']) ?>"
                            width="120" height="120" style="object-fit: cover;">
                        <?php else: ?>
                        <span>Sin imagen</span>
                        <?php endif; ?>
                    </td>
                    <td>$<?= number_format($item['price'], 2) ?></td>
                    <td><?= esc($item['qty']) ?></td>
                    <td>$<?= number_format($item['subtotal'], 2) ?></td>
                    <td>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="<?= base_url('reducirProducto/' . $item['rowid']) ?>"
                                class="btn btn-warning btn-sm" role="button">Quitar 1</a>
                            <a href="<?= base_url('eliminarProducto/' . $item['rowid']) ?>"
                                class="btn btn-danger btn-sm" role="button">Quitar Todo</a>
                        </div>
                    </td>
                </tr>
                <?php $total += $item['subtotal']; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                    <td><strong>$<?= number_format($total, 2) ?></strong></td>
                    <td>
                        <!-- Botón para vaciar el carrito -->
                        <a href="<?= base_url('vaciarCarrito') ?>" class="btn btn-danger btn-sm" role="button">Vaciar
                            Carrito</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="alert alert-warning">Tu carrito esta vacio.</div>
    <?php endif; ?>
    
    <?php if (!empty($carrito)) : ?>
        <div class="text-center mt-3">
            <a href="<?= base_url('productos') ?>" class="btn btn-secondary">← Seguir comprando</a>
            <a href="<?= base_url('carrito/finalizar') ?>" class="btn btn-success">Finalizar compra →</a>
        </div>
    <?php else: ?>
        <div class="text-center mt-3">
        <a href="<?= base_url('productos') ?>" class="btn btn-secondary">← Ir a Comprar</a>
        </div>
    
    <?php endif; ?>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        toastElList.map(function (toastEl) {
            new bootstrap.Toast(toastEl).show();
        });
    });
</script>

<?php $this->endSection(); ?>