<?= $this->extend('plantillas/plantilla'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <h1 class="text-center mt-3 bg-translucido sans-deva" style="color: orange;">
        <?= ($esAdmin ? 'Listado de Todas las Ventas' : 'Mis Compras') ?></h1>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (empty($ventas)): ?>
    <div class="alert alert-warning">No hay ventas registradas.</div>
    <?php else: ?>
    <div class="table-responsive bg-dark text-white p-3 rounded">
        <table class="table table-bordered table-hover table-dark">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <?php if ($esAdmin): ?>
                    <th>Cliente</th>
                    <?php endif; ?>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                <tr>
                    <td><?= esc($venta['venta_id']) ?></td>
                    <?php if ($esAdmin): ?>
                    <td><?= esc($venta['nombre_usuario']) . ' ' . esc($venta['apellido_usuario']) ?></td>
                    <?php endif; ?>
                    <td>$<?= number_format($venta['venta_total'], 2) ?></td>
                    <td><?= esc($venta['venta_fecha']) ?></td>
                    <td>
                        <a href="<?= base_url('/ventas/detalle/' . $venta['venta_id']) ?>"
                            class="btn btn-sm btn-warning">
                            Ver Detalle
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>


</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php if (session()->getFlashdata('success')): ?>
    Swal.fire({
        title: '<i class="fa fa-paw" aria-hidden="true" style="font-size: 100px; color: orange;"></i> <h1> Gracias por tu compra! </h1>',
        text: "Nos comunicaremos con usted a la brevedad!!",
    });

    <?php endif; ?>
})
</script>

<?= $this->endSection(); ?>