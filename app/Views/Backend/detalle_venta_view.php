<?= $this->extend('plantillas/plantilla'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5 text-light">

    <div class="container mt-4">
        <h2 class="mb-4 text-primary">Detalle de la Venta #<span id="ventaId"><?= esc($venta['venta_id']) ?></span></h2>

        <!-- Sección de Información de la Venta -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Información de la Venta
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Fecha:</strong> <span id="ventaFecha"><?= esc($venta['venta_fecha']) ?></span></p>
                        <p><strong>Total:</strong> $<span id="ventaTotal"><?= esc($venta['venta_total']) ?></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Forma de Pago:</strong> <span id="ventaFormaPago"><?= esc($venta['venta_forma_pago']) ?></span></p>
                        <p><strong>Forma de Entrega:</strong> <span id="ventaFormaEntrega"><?= $venta['venta_forma_entrega'] == 1 ? 'Envío a domicilio' : 'Retiro en local' ?></span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Datos del Cliente -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Datos del Cliente
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <strong>Nombre Completo:</strong>
                            <span id="clienteNombreCompleto"> <?= esc($venta['nombre_usuario']) ?> <?= esc($venta['apellido_usuario']) ?></span>
                        </p>
                        <p>
                            <strong>DNI:</strong>
                            <span id="clienteDni"> <?= esc($venta['dni_usuario']) ?></span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Domicilio:</strong> <span id="clienteDomicilio"><?= esc($venta['domicilio_usuario']) ?></span></p>
                        <p><strong>Teléfono:</strong> <span id="clienteTelefono"><?= esc($venta['telefono_usuario']) ?></span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Detalle de Productos -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Productos de la Venta
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Nombre del Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="detalleProductos">
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
            </div>
        </div>

        <!-- Botón para Volver -->
        <div class="text-center mb-4">
            <a href="<?= base_url('/ventas') ?>" class="btn btn-primary btn-lg">Volver al listado</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>