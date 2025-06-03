<?php
$current_url = uri_string();
$usuario = session('usuario');

// Links por defecto (visitante)
$links = [
    ["texto" => "Inicio", "href" => ''],
    ["texto" => "Catalogo", "href" => 'productos'],
    ["texto" => "¿Quiénes somos?", "href" => 'quienes-somos'],
    ["texto" => "Comercializacion", "href" => 'comercializacion'],
    ["texto" => "Contacto", "href" => 'contacto'],
    ["texto" => "Términos y Usos", "href" => 'terminos-usos'],
];

// Si es admin (perfil_id == 2), cambiar menú
if ($usuario && $usuario['perfil_id'] == 2) {
    $links = [
        ["texto" => "Ver Consultas", "href" => 'admin'],
        ["texto" => "Listar Productos", "href" => 'admin/usuarios'],
        ["texto" => "Gestionar Productos", "href" => 'admin/gestionar-productos'],
        ["texto" => "Listar Ventas", "href" => 'admin/reportes'],
        ["texto" => "Agregar Productos", "href" => 'admin/agregar-productos']
    ];
}
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
            <?php if (!$usuario): ?>
            <!-- VISITANTE -->
            <a href="<?= base_url('/login') ?>" class="btn btn-warning puppy fs-5 me-2">
                <i class="fa fa-user"></i>
            </a>
            <?php elseif ($usuario['perfil_id'] == 1): ?>
            <!-- CLIENTE -->
            <a class="btn btn-warning puppy fs-5 me-2" href="<?= base_url('/carrito') ?>">
                <i class="fa fa-shopping-cart"></i>
            </a>
            <a class="btn btn-outline-warning fs-5" href="<?= base_url('/logout') ?>">
                <i class="fa fa-sign-out"></i>
            </a>
            <?php elseif ($usuario['perfil_id'] == 2): ?>

            <a class="btn btn-outline-warning fs-5" href="<?= base_url('/logout') ?>">
                <i class="fa fa-sign-out"></i>
            </a>
            <?php endif; ?>
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
                <?php foreach ($links as $value): ?>
                <li class="nav-item">
                    <a class="fs-5 puppy nav-link <?= $current_url == $value['href'] ? "active" : "" ?>"
                        href="<?= base_url('/' . $value['href']) ?>">
                        <?= $value['texto']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>

            <!-- Botones visibles SOLO en pantallas grandes -->
            <div class="d-none d-lg-flex align-items-center">
                <?php if (!$usuario): ?>
                <!-- VISITANTE -->
                <a href="<?= base_url('/login') ?>" class="btn btn-warning puppy fs-5 me-2">
                    <i class="fa fa-user"></i>
                </a>
                <?php elseif ($usuario['perfil_id'] == 1): ?>
                <!-- CLIENTE -->
                <span class="navbar-text text-white puppy fs-5 me-2">
                    Bienvenido <?= esc($usuario['nombre_usuario']) ?>!
                </span>
                <a class="btn btn-warning puppy fs-5 me-2" href="<?= base_url('/carrito') ?>">
                    <i class="fa fa-shopping-cart"></i>
                </a>
                <a class="btn btn-outline-warning puppy fs-5" href="<?= base_url('/logout') ?>">
                    Cerrar sesion
                </a>
                <?php elseif ($usuario['perfil_id'] == 2): ?>
                <!-- ADMIN -->
                <span class="navbar-text text-white puppy fs-4 me-2">
                    <?= esc($usuario['nombre_usuario']) ?>
                </span>

                <a class="btn btn-outline-warning fs-5" href="<?= base_url('/logout') ?>">
                    Cerrar sesión
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>