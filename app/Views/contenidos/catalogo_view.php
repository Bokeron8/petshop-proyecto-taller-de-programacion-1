<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>


<?php

helper('form');
?>

<section class="">

  <h1 class="text-center title mt-3 bg-translucido">Nuestros Productos</h1>

  <div class="row me-3 ms-3">
    <div class="col-lg-3  col-12 border border-4 rounded bg-translucido gap-2 d-flex flex-column mb-2 p-2"
      style="height: fit-content;">

      <button class="btn btn-warning sans-deva fs-5" type="button" data-bs-toggle="collapse"
        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Filtrar por
      </button>
      <div class="collapse show" id="collapseExample">
        <?= form_open('/productos', ['class' => 'd-flex flex-column gap-2', 'method' => 'GET']) ?>
        <div>
          <label for="nombre_producto" class="form-label">Buscar por nombre</label>
          <div class="input-group mb-3">
            <i class="fa fa-search input-group-text d-flex align-items-center justify-content-center"></i>

            <?= form_input(
              [
                'name' => 'nombre',
                'id' => 'nombre_producto',
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Ej: pelota'
              ],
              value: esc($nombre)
            ) ?>
          </div>

        </div>



        <div>
          <?= form_dropdown(
            ['name' => 'marca_producto', 'class' => 'form-control', 'id' => 'marca-dropdown'],
            $marcas,
            selected: esc($marca)

          ) ?>

        </div>
        <div>
          <?= form_dropdown(['name' => 'categoria_productoo', 'class' => 'form-control', 'id' => 'categoria_dropdown'], $categorias, [0]) ?>

        </div>
        <div class="tag-container d-flex gap-1 flex-wrap">
        </div>


        <div>
          <label for="ordenar_por" class="form-label">Ordenar por</label>
          <?= form_dropdown(
            [
              'name' => 'ordenar_por',
              'id' => 'ordenar_por',
              'class' => 'form-control'
            ],
            [
              'nombre_asc'        => 'Nombre (A-Z)',
              'nombre_desc'       => 'Nombre (Z-A)',
              'precio_asc'        => 'Precio (Menor a Mayor)',
              'precio_desc'       => 'Precio (Mayor a Menor)'
            ],
            selected: esc($ordenar_por ?? 'nombre_asc') // Assuming $ordenar_por holds the current sort selection
          ) ?>
        </div>

        <div class="row">
          <div class="col">
            <label for="minPrice" class="form-label">Precio minimo</label>
            <?= form_input(
              ['name' => 'min_price', 'id' => 'minPrice', 'type' => 'number', 'min' => 0, 'max' => 999999, 'placeholder' => 'Minimo'],
              value: esc($minPrice)
            ) ?>
          </div>

          <div class="col">
            <label for="maxPrice" class="form-label">Precio maximo</label>
            <?= form_input(
              ['name' => 'max_price', 'id' => 'maxPrice', 'type' => 'number', 'min' => 0, 'max' => 999999, 'placeholder' => 'Maximo'],
              value: esc($maxPrice)
            ) ?>
          </div>


        </div>
        <?= form_submit(value: 'Aplicar filtros', extra: ['class' => 'btn btn-warning']) ?>
        <button class="btn btn-primary" id="btn-restart">Reiniciar filtros</button>
      </div>
      <?= form_close() ?>
    </div>


    <div class="col-lg-9 col-12">

      <div class="row" style="--bs-gutter-x: 0.5rem;">
        <?php if (empty($productos)) : ?>
          <div class="col-12 text-center bg-translucido">
            <h1>No se encontraron productos.</p>
          </div>
        <?php else : ?>
          <?php foreach ($productos as $producto): ?>
            <div class="col-md-3 col-lg-3 col-6 mb-2">
              <div class="card h-100 mw-50">
                <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>"
                  class="card-img-top carta-productos">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title sans-deva" style="font-weight: 500;">
                    <?= $producto['nombre_producto'] ?></h5>


                  <h6 class="card-subtitle mb-2 text-body-secondary mt-auto">Stock:
                    <?= $producto['stock_producto']; ?></h6>
                  <h6 class="card-subtitle mb-2 text-body-secondary ">Precio:
                    $<?= $producto['precio_producto']; ?></h6>
                  <a href="<?= base_url('producto/' . $producto['id_producto']) ?>"
                    class="btn btn-ver-mas sans-deva mb-2">Ver más</a>

                  <?php if (session('usuario')) : ?>
                    <?= form_open('/agregar-carrito', ['class' => 'formAgregarCarrito ']); ?>
                    <?= form_hidden('id', $producto['id_producto']) ?>
                    <?= form_hidden('nombre', $producto['nombre_producto']) ?>
                    <?= form_hidden('precio', $producto['precio_producto']) ?>
                    <?= form_hidden('imagen', 'assets/uploads/' . $producto['imagen_producto']) ?>
                    <?= form_submit('agregar', 'Agregar al carrito', ['class' => 'btn btn-warning sans-deva btn-agregar w-100']) ?>
                    <?= form_close() ?>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          <?php endforeach ?>

        <?php endif ?>
      </div>


    </div>


    <!-- TOAST Bootstrap - aparecerá al agregar producto -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="carritoToast" class="toast align-items-center text-bg-success border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            ✅ Producto agregado al carrito
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
            aria-label="Cerrar"></button>
        </div>
      </div>
    </div>

  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const forms = document.querySelectorAll(".formAgregarCarrito");
      const toastElement = document.getElementById("carritoToast");
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastElement);

      forms.forEach(form => {
        form.addEventListener("submit", function(e) {
          e.preventDefault();

          const submitButton = form.querySelector(".btn-agregar");
          const originalText = submitButton.textContent;

          submitButton.disabled = true;
          submitButton.textContent = "Agregando...";

          const formData = new FormData(form);

          fetch("<?= base_url('/agregar-carrito') ?>", {
              method: "POST",
              body: formData
            })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                toastBootstrap.show(); // 🎉 Mostrar toast aquí
              } else {
                alert("No se pudo agregar el producto");
              }
            })
            .catch(error => {
              console.error("Error al agregar al carrito:", error);
              alert("Error en la solicitud.");
            })
            .finally(() => {
              submitButton.disabled = false;
              submitButton.textContent = originalText;
            });
        });
      });
    });
  </script>
  <script>
    let $ = (string) => document.querySelector(string)
    let btn_restart = $('#btn-restart');
    let marca_dropdown = $('#marca-dropdown');
    let max_price_input = $('#maxPrice');
    let min_price_input = $('#minPrice');
    let nombre_producto_input = $('#nombre_producto');
    let tag_container = $('.tag-container');
    let categoria_dropdown = $('#categoria_dropdown');
    let ordenar_dropdown = $('#ordenar_por');
    let categorias = ['<?= implode("', '", $categorias) ?>'];
    let tag_id_list = ['<?= implode("', '", $categorias_seleccionadas) ?>']
    if (tag_id_list.includes("")) {
      tag_id_list.pop()
    }
    tag_id_list.forEach(id => {
      const hiddenInput = document.createElement('input')
      hiddenInput.type = 'hidden';
      hiddenInput.value = id;
      hiddenInput.name = 'categoria_producto[]'

      const tag = document.createElement('span')
      tag.textContent = categorias[id];
      tag.className = 'rounded-pill bg-warning p-2 categorias'

      const removeButton = document.createElement('button')

      removeButton.className = 'bg-transparent border-0 fa fa-times'
      removeButton.addEventListener('click', () => {
        tag_id_list.splice(tag_id_list.indexOf(id), 1)
        tag.remove()
      });

      tag.appendChild(removeButton)
      tag.appendChild(hiddenInput)
      tag_container.appendChild(tag)
    });

    tag_id_list.push('0')

    categoria_dropdown.addEventListener("click", (e) => {
      const selected_category_id = e.target.value
      if (tag_id_list.includes(selected_category_id)) {
        return
      }
      tag_id_list.push(selected_category_id)

      const hiddenInput = document.createElement('input')
      hiddenInput.type = 'hidden';
      hiddenInput.value = selected_category_id;
      hiddenInput.name = 'categoria_producto[]'

      const tag = document.createElement('span')
      tag.textContent = categorias[selected_category_id];
      tag.className = 'rounded-pill bg-warning p-2 categorias'

      const removeButton = document.createElement('button')

      removeButton.className = 'bg-transparent border-0 fa fa-times'
      removeButton.addEventListener('click', () => {
        tag_id_list.splice(tag_id_list.indexOf(selected_category_id), 1)
        tag.remove()
      });

      tag.appendChild(removeButton)
      tag.appendChild(hiddenInput)
      tag_container.appendChild(tag)

    });

    btn_restart.addEventListener("click", () => {
      ordenar_dropdown.value = 'nombre_asc'
      marca_dropdown.value = 0;
      max_price_input.value = "";
      min_price_input.value = "";
      nombre_producto_input.value = "";
      let lista_categorias = document.querySelectorAll('.categorias')
      lista_categorias.forEach((el) => {
        el.remove()
      })
    })
  </script>



</section>




<?php $this->endSection(); ?>