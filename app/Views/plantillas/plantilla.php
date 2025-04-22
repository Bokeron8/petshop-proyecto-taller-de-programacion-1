<?php
$data = [
    'titulo' => $title
];

echo view("plantillas/header_view", $data) ?>
<?php echo view("plantillas/nav_view") ?>

<div class="content" style="min-height: auto;">

    <?= $this->renderSection('content'); ?>
</div>


<?php echo view("plantillas/footer_view") ?>