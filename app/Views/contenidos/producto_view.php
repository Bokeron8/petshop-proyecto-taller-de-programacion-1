<?= $this->extend('plantillas/plantilla') ?>

<?= $this->section('content') ?>
<style>
.carousel-item>.row>.col {
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel-item img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 10px;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro semitransparente */
    border-radius: 50%;
    width: 2rem;
    height: 2rem;
    background-size: 100% 100%;
}
</style>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>" class="img-fluid rounded"
                alt="<?= esc($producto['nombre_producto']) ?>">
        </div>
        <div class="col-md-7 bg-translucido">
            <h2><?= esc($producto['nombre_producto']) ?></h2>
            <p><strong>Descripcion</strong>: <?= esc($producto['descripcion_producto']) ?></p>
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
    <div id="carritoToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                ✅ Producto agregado al carrito
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Cerrar"></button>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-3 title bg-translucido">Productos relacionados</h2>
    <?php if (!empty($productos_relacionados)) : ?>


    <div id="multiCarousel" class="carousel slide d-none d-lg-block" data-bs-ride="carousel">
        <div class="carousel-inner">

            <?php
                $chunked = array_chunk($productos_relacionados, 4); // 4 productos por slide
                foreach ($chunked as $index => $grupo) : ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <div class="row justify-content-center">
                    <?php foreach ($grupo as $p) : ?>
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <div class="card h-100">
                            <img src="<?= base_url('assets/uploads/' . $p['imagen_producto']) ?>" class="card-img-top"
                                alt="<?= esc($p['nombre_producto']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($p['nombre_producto']) ?></h5>
                                <p class="card-text">$<?= number_format($p['precio_producto'], 2) ?></p>
                                <a href="<?= base_url('producto/' . $p['id_producto']) ?>"
                                    class="btn btn-primary btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#multiCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#multiCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div id="multiCarousel" class="carousel slide d-lg-none " data-bs-ride="carousel">
        <div class="carousel-inner">

            <?php
                $chunked = array_chunk($productos_relacionados, 2); // 2 productos por slide
                foreach ($chunked as $index => $grupo) : ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <div class="row justify-content-center ">
                    <?php foreach ($grupo as $p) : ?>
                    <div class="col-6 ">
                        <div class="card">
                            <img src="<?= base_url('assets/uploads/' . $p['imagen_producto']) ?>" class="card-img-top"
                                alt="<?= esc($p['nombre_producto']) ?>" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($p['nombre_producto']) ?></h5>
                                <p class="card-text">$<?= number_format($p['precio_producto'], 2) ?></p>
                                <a href="<?= base_url('producto/' . $p['id_producto']) ?>"
                                    class="btn btn-primary btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#multiCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#multiCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <?php else : ?>
    <p>No hay productos relacionados disponibles.</p>
    <?php endif; ?>
</div>




<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("formAgregarDetalle");
    const submitBtn = document.getElementById("btn-agregar");
    const toastEl = document.getElementById("carritoToast");
    const toast = bootstrap.Toast.getOrCreateInstance(toastEl);

    form.addEventListener("submit", function(e) {
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