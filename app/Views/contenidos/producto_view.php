<?= $this->extend('plantillas/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>" class="img-fluid rounded" alt="<?= esc($producto['nombre_producto']) ?>">
        </div>
        <div class="col-md-7">
            <h2><?= esc($producto['nombre_producto']) ?></h2>
            <p>Descripcion: <?= esc($producto['descripcion_producto']) ?></p>
            <p><strong>Precio:</strong> $ <?= number_format($producto['precio_producto'], 2) ?></p>
            <p><strong>Stock:</strong> <?= esc($producto['stock_producto']) ?> unidades</p>

            <?php if (session('usuario')) : ?>
                <form id="formAgregarDetalle">
                    <?= form_hidden('id', $producto['id_producto']) ?>
                    <?= form_hidden('nombre', $producto['nombre_producto']) ?>
                    <?= form_hidden('precio', $producto['precio_producto']) ?>
                    <?= form_hidden('imagen', 'assets/uploads/' . $producto['imagen_producto']) ?>
                    <button type="submit" class="btn btn-warning mb-2" id="btn-agregar">Agregar al carrito</button>
                </form>

            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="btn btn-warning">Iniciar sesión para comprar</a>
            <?php endif; ?>

            <a href="<?= base_url('productos') ?>" class="btn btn-secondary ">← Volver</a>
        </div>
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


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("formAgregarDetalle");
        const submitBtn = document.getElementById("btn-agregar");
        const toastEl = document.getElementById("carritoToast");
        const toast = bootstrap.Toast.getOrCreateInstance(toastEl);

        form.addEventListener("submit", function (e) {
            e.preventDefault();
            submitBtn.disabled = true;
            submitBtn.textContent = "Agregando...";

            const formData = new FormData(form);

            fetch("<?= base_url('/agregar-carrito') ?>", {
                method: "POST",
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        toast.show();
                    } else {
                        alert("No se pudo agregar el producto.");
                    }
                })
                .catch(() => alert("Error al enviar la solicitud."))
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = "Agregar al carrito";
                });
        });
    });
</script>

<?= $this->endSection() ?>
