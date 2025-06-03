<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>


<h1 class="text-center title mt-3 bg-translucido">Listado de Productos</h1>
<div class="container">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th>Subcategoría</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Activar/Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= esc($producto['nombre_producto']) ?></td>
                    <td><?= esc($producto['descripcion_producto']) ?></td>
                    <td><?= esc($producto['descripcion_marca']) ?></td>
                    <td><?= esc($producto['descripcion_categoria']) ?></td>
                    <td><?= esc($producto['descripcion_subcategoria']) ?></td>
                    <td><?= esc($producto['stock_producto']) ?></td>
                    <td>$<?= number_format($producto['precio_producto'], 2) ?></td>
                    <td>
                        <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>" 
                             alt="Imagen producto" width="100">
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?= base_url('admin/editar-producto/' . $producto['id_producto']) ?>">Editar</a>
                    </td>
                    <td>
                        <?php if ($producto['estado_producto'] == 1): ?>
                            <a class="btn btn-success" href="<?= base_url('admin/desactivar/' . $producto['id_producto']) ?>">Eliminar</a>
                        <?php else: ?>
                            <a class="btn btn-danger" href="<?= base_url('admin/activar/' . $producto['id_producto']) ?>">Activar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->endSection(); ?>