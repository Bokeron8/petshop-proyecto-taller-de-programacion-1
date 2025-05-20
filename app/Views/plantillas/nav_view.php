<?php
$current_url = uri_string();
$links = [
    ["texto" => "Inicio", "href" => ''],
    ["texto" => "Productos", "href" => 'productos'],
    ["texto" => "¿Quienes somos?", "href" => 'quienes-somos'],
    ["texto" => "Comercializacion", "href" => 'comercializacion'],
    ["texto" => "Contacto", "href" => 'contacto'],
    ["texto" => "Terminos y Usos", "href" => 'terminos-usos'],
];
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0, 0, 0, 0.8);">
    <div class="container-fluid">
        <!-- Marca -->
        <a class="navbar-brand title catpaw fs-2" href="<?= base_url('/') ?>"
            style="max-width: 36%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <i class="fa fa-paw" aria-hidden="true"></i> Full Animal
        </a>

        <!-- Botones visibles SOLO en pantallas pequeñas -->
        <div class="d-flex d-lg-none ms-auto">
            <a href="<?= base_url('/login') ?>" class="btn btn-warning puppy fs-5 me-2">
                <i class="fa fa-user"></i>
            </a>
            <a href="<?= base_url('/login') ?>" class="btn btn-warning puppy fs-5">
                <i class="fa fa-shopping-cart"></i>
            </a>
        </div>

        <!-- Botón de colapso -->
        <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú colapsable -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Links de navegación -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php foreach ($links as $texto => $value): ?>
                <li class="nav-item">
                    <a class="fs-5 puppy nav-link <?= $current_url == $value['href'] ? "active" : "" ?>"
                        href="<?= base_url('/' . $value['href']) ?>">
                        <?= $value['texto']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>

            <!-- Botones visibles SOLO en pantallas grandes -->
            <div class="d-none d-lg-flex">
                <a href="<?= base_url('/login') ?>" class="btn btn-warning puppy fs-5 me-2">
                    <i class="fa fa-user"></i>
                </a>
                <a href="<?= base_url('/login') ?>" class="btn btn-warning puppy fs-5">
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>
</nav>