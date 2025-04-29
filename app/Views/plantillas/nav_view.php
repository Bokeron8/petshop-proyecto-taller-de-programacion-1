<?php
$current_url = uri_string();
$links = [
    ["texto" => "Inicio", "href" => ''],
    ["texto" => "¿Quienes somos?", "href" => 'quienes-somos'],
    ["texto" => "Comercializacion", "href" => 'comercializacion'],
    ["texto" => "Contacto", "href" => 'contacto'],
    ["texto" => "Terminos y Usos", "href" => 'terminos-usos'],
];
?>


<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgba(0, 0, 0, 0.8);">
    <!-- Define el contenedor fluido para ocupar todo el ancho -->
    <div class="container-fluid">
        <!-- Título o marca de la página -->
        <a class="navbar-brand title catpaw fs-2" href="<?= base_url('/') ?>"><i
                class="fa fa-paw" aria-hidden="true"></i> Full Animal</a>
        <!-- Botón para colapsar el menú en pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <!-- Ícono del botón de colapso -->
        </button>
        <!-- Contenedor del menú que se colapsa o expande -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Lista de navegación -->
            <ul class="navbar-nav">
                <!-- Cada uno de los enlaces de la navegación -->
                <?php foreach ($links as $texto => $value): ?>

                    <li class="nav-item">

                        <a class="fs-4 puppy nav-link <?= $current_url == $value['href'] ? "active" : "" ?>"
                            aria-current="page"
                            href="<?php echo base_url('/' . $value['href']) ?>"><?= $value['texto']; ?></a>
                        <!-- Enlace activo -->
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</nav>