<?= $this->extend('plantillas/plantilla'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h1 class="text-center title bg-translucido">Usuarios Registrados</h1>

    <form method="get" class="row g-3 mb-3">
        <div class="col-auto">
            <label for="estado" class=" bg- translucido form-label">Filtrar por estado:</label>
            <select name="estado" id="estado" class="form-select">
                <option value="" <?= ($estadoFiltro === '') ? 'selected' : '' ?>>Todos</option>
                <option value="1" <?= ($estadoFiltro === '1') ? 'selected' : '' ?>>Activos</option>
                <option value="0" <?= ($estadoFiltro === '0') ? 'selected' : '' ?>>Inactivos</option>
            </select>
        </div>
        <div class="col-auto d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>

    <?php if (!empty($usuarios)) : ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Domicilio</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?= esc($usuario['nombre_usuario']) ?></td>
                    <td><?= esc($usuario['apellido_usuario']) ?></td>
                    <td><?= esc($usuario['dni_usuario']) ?></td>
                    <td><?= esc($usuario['email_usuario']) ?></td>
                    <td><?= esc($usuario['telefono_usuario']) ?></td>
                    <td><?= esc($usuario['domicilio_usuario']) ?></td>
                    <td><?= esc($usuario['descripcion_perfil']) ?></td>
                    <td>
                        <span class="badge <?= $usuario['estado_usuario'] ? 'bg-success' : 'bg-secondary' ?>">
                            <?= $usuario['estado_usuario'] ? 'Activo' : 'Inactivo' ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($usuario['estado_usuario'] == 1): ?>
                            <a class="btn btn-danger"
                                href="<?= base_url('usuarios/eliminarUsuario/' . $usuario['id_usuario']) ?>">Eliminar</a>
                        <?php else: ?>
                            <a class="btn btn-success"
                                href="<?= base_url('usuarios/activarUsuario/' . $usuario['id_usuario']) ?>">Activar</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <?php else : ?>
        <div class="alert alert-info text-center">No se encontraron usuarios con los criterios seleccionados.</div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>