<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>


<h1 class="text-center title mt-3 bg-translucido">Listado de Productos</h1>
<div class="container overflow-x-auto">
  <?= form_open(
    'admin/gestionar-productos',
    ['method' => 'get', 'class' => 'mb-3 bg-translucido']
  ) ?>
  <div class="row">
    <!-- Filtro por categoría -->
    <div class="col-md-3">
      <label for="categoria">Filtrar por categoría:</label>
      <?= form_dropdown(
        'categoria',
        ['' => '-- Todas --'] + array_column($categorias, 'descripcion_categoria', 'id_categoria'),
        $categoriaSeleccionada ?? '',
        ['class' => 'form-select', 'id' => 'categoria']
      ) ?>
    </div>

    <!-- Búsqueda por nombre -->
    <div class="col-md-3">
      <label for="nombre">Buscar por nombre:</label>
      <?= form_input([
        'name' => 'nombre',
        'id' => 'nombre',
        'class' => 'form-control',
        'value' => esc($nombreBuscado ?? ''),
        'type' => 'text'
      ]) ?>
    </div>

    <!-- Ordenar por -->
    <div class="col-md-3">
      <label for="ordenar_por">Ordenar por:</label>
      <?= form_dropdown(
        'ordenar_por',
        [
          'nombre_asc'  => 'Nombre (A-Z)',
          'nombre_desc' => 'Nombre (Z-A)',
          'precio_asc'  => 'Precio (Menor a Mayor)',
          'precio_desc' => 'Precio (Mayor a Menor)'
        ],
        esc($ordenar_por ?? 'nombre_asc'),
        ['class' => 'form-control', 'id' => 'ordenar_por']
      ) ?>
    </div>

    <!-- Botón de búsqueda -->
    <div class="col-md-2 align-self-end mt-1">
      <?= form_submit('buscar', 'Buscar', ['class' => 'btn btn-primary']) ?>
    </div>
  </div>
  <?= form_close() ?>

  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Marca</th>
        <th>Categoría</th>
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
          <td>
            <span style="overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;"><?= esc($producto['descripcion_producto']) ?>
            </span>
          </td>
          <td><?= esc($producto['descripcion_marca']) ?></td>
          <td><?= esc($producto['descripcion_categoria']) ?></td>
          <td><?= esc($producto['stock_producto']) ?></td>
          <td>$<?= number_format($producto['precio_producto'], 2) ?></td>
          <td>
            <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>" alt="Imagen producto"
              width="100">
          </td>
          <td>
            <a class="btn btn-warning"
              href="<?= base_url('admin/editar-producto/' . $producto['id_producto']) ?>">Editar</a>
          </td>
          <td>
            <?php if ($producto['estado_producto'] == 1): ?>
              <a class="btn btn-success"
                href="<?= base_url('admin/desactivar/' . $producto['id_producto']) ?>">Eliminar</a>
            <?php else: ?>
              <a class="btn btn-danger"
                href="<?= base_url('admin/activar/' . $producto['id_producto']) ?>">Activar</a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php $this->endSection(); ?>