<?= $this->extend('plantillas/plantilla'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
  <h1 class="text-center mt-3 bg-translucido sans-deva" style="color: orange;">
    <?= ($esAdmin ? 'Listado de Todas las Ventas' : 'Mis Compras') ?></h1>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <?php if (empty($ventas)): ?>
    <?php if ($esAdmin): ?>
      <div class="alert alert-warning">No hay ventas registradas.</div>
    <?php else: ?>
      <div class="alert alert-warning">No hay compras registradas.</div>
    <?php endif; ?>
  <?php else: ?>


    <div class="card mb-4">
      <div class="card-body">

        <div class="table-responsive">
          <?= form_open(current_url(), ['method' => 'get', 'class' => 'mb-3 d-flex justify-content-end']) ?>
          <div class="form-inline">
            <label for="ordenar_por" class="me-2">Ordenar por:</label>
            <?= form_dropdown(
              'ordenar_por',
              [
                'fecha_desc' => 'Fecha (más reciente primero)',
                'fecha_asc'  => 'Fecha (más antigua primero)',
                'total_desc' => 'Total (mayor a menor)',
                'total_asc'  => 'Total (menor a mayor)'
              ],
              esc($ordenarPor ?? 'fecha_desc'),
              ['class' => 'form-select form-select-sm me-2', 'onchange' => 'this.form.submit()']
            ) ?>
          </div>
          <?= form_close() ?>


          <table class="table table-striped table-hover">
            <thead>
              <tr>

                <?php if ($esAdmin): ?>
                  <th scope="col">ID Venta</th>
                  <th>Cliente</th>
                <?php endif; ?>
                <th scope="col">Fecha</th>
                <th scope="col">Total</th>
                <th scope="col">Forma de Pago</th>
                <th scope="col">Forma de Entrega</th>
                <th scope="col">Detalles</th>
              </tr>
            </thead>
            <tbody id="listaVentas">
              <?php foreach ($ventas as $venta): ?>
                <tr>
                  <?php if ($esAdmin): ?>
                    <td><?= esc($venta['venta_id']) ?></td>
                    <td><?= esc($venta['nombre_usuario']) . ' ' . esc($venta['apellido_usuario']) ?></td>
                  <?php endif; ?>
                  <td><?= esc($venta['venta_fecha']) ?></td>
                  <td>$<?= number_format($venta['venta_total'], 2) ?></td>
                  <td><?= esc($venta['venta_forma_pago']) ?></td>
                  <td><?= esc($venta['venta_forma_entrega'] ? "Envio" : "Retiro en local") ?></td>
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
      </div>
    </div>

  <?php endif; ?>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    <?php if (session()->getFlashdata('success')): ?>
      Swal.fire({
        title: '<i class="fa fa-paw" aria-hidden="true" style="font-size: 100px; color: orange;"></i> <h1> Gracias por tu compra! </h1>',
        text: "Nos comunicaremos con usted a la brevedad!!",
        timer: 2000
      });

    <?php endif; ?>
  })
</script>

<?= $this->endSection(); ?>