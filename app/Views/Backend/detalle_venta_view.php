<?= $this->extend('plantillas/plantilla'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5 text-light">
    <h2>Detalle de la Venta #<?= esc($venta['venta_id']) ?></h2>
    <hr>

    <div class="mb-4 bg-dark p-3 rounded">
        <h5 class="text-warning">Datos del Cliente</h5>
        <p><strong>Nombre:</strong> <?= esc($venta['nombre_usuario']) ?> <?= esc($venta['apellido_usuario']) ?></p>
        <p><strong>DNI:</strong> <?= esc($venta['dni_usuario']) ?></p>
        <p><strong>Teléfono:</strong> <?= esc($venta['telefono_usuario']) ?></p>
        <p><strong>Domicilio:</strong> <?= esc($venta['domicilio_usuario']) ?></p>
    </div>

    <div class="mb-4 bg-dark p-3 rounded">
        <h5 class="text-warning">Detalles de la Compra</h5>
        <p><strong>Fecha:</strong> <?= esc($venta['venta_fecha']) ?></p>
        <p><strong>Forma de Pago:</strong> <?= esc($venta['venta_forma_pago']) ?></p>
        <p><strong>Forma de Entrega:</strong> <?= $venta['venta_forma_entrega'] == 1 ? 'Envío a domicilio' : 'Retiro en local' ?></p>
    </div>

    <div class="mb-4 bg-dark p-3 rounded">
        <h5 class="text-warning">Productos Comprados</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-dark table-hover">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detalles as $detalle): ?>
                    <tr>
                        <td><?= esc($detalle['nombre_producto']) ?></td>
                        <td>$<?= number_format($detalle['detalle_precio'], 2) ?></td>
                        <td><?= esc($detalle['detalle_cantidad']) ?></td>
                        <td>$<?= number_format($detalle['detalle_subtotal'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h5 class="text-end mt-3">Total: <span class="text-success">$<?= number_format($venta['venta_total'], 2) ?></span></h5>
    </div>

    <a href="<?= base_url('/ventas') ?>" class="btn btn-secondary">Volver al listado</a>
</div>

<?= $this->endSection(); ?>
