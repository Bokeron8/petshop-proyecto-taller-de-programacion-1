<?= $this->extend('plantillas/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="text-center mb-4 title bg-translucido">Consultas Realizadas</h2>

    <form method="get" action="<?= base_url('admin/mensajes') ?>" class="row g-3 mb-4">
        <div class="col-md-5">
            <label for="fecha_inicio" class="form-label">Desde:</label>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?= esc($fecha_inicio) ?>">
        </div>
        <div class="col-md-5">
            <label for="fecha_fin" class="form-label">Hasta:</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?= esc($fecha_fin) ?>">
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-warning w-100">Filtrar</button>
        </div>
    </form>

    <?php if (!empty($mensajes)) : ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mensajes as $mensaje): ?>
                        <tr>
                            <td><?= esc($mensaje['nombre_mensaje']) ?></td>
                            <td><?= esc($mensaje['email_mensaje']) ?></td>
                            <td><?= esc($mensaje['mensaje']) ?></td>
                            <td><?= date('d/m/Y', strtotime($mensaje['fecha_mensaje'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center">No hay mensajes en ese rango de fechas.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
