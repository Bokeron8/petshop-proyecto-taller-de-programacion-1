<?= $this->extend('plantillas/plantilla'); ?>

<?= $this->section('content'); ?>


<div class="container mt-3 bg-translucido sans-deva" style="color: orange">
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger text-center">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <h2>Finalizar Compra</h2>
    <?= form_open('carrito/procesarVenta', ['id' => 'formFinalizar']); ?>
    <div class="mb-3">
        <label>DNI:</label>
        <input type="number" name="dni" class="form-control" required value="<?= esc($usuario['dni_usuario']) ?>">
    </div>
    <div class="mb-3">
        <label>Teléfono:</label>
        <input type="number" name="telefono" class="form-control" required value="<?= esc($usuario['telefono_usuario']) ?>">
    </div>
    <div class="mb-3">
        <label>Domicilio:</label>
        <input type="text" name="direccion" class="form-control" required value="<?= esc($usuario['domicilio_usuario']) ?>">
    </div>
    <div class="mb-3">
        <label>Forma de pago:</label>
        <select name="forma_pago" class="form-select" required>
            <option value="">Seleccione un metodo de pago</option>
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Transferencia Bancaria</option>
            <option value="tarjetaD">Tarjeta Debito</option>
            <option value="tarjetaC">Tarjeta Credito</option>
            <option value="mercado_pago">Mercado Pago</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Forma de entrega:</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="forma_entrega" value="0" required>
            <label class="form-check-label">Retiro en local</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="forma_entrega" value="1" required>
            <label class="form-check-label">Envío a domicilio</label>
        </div>
    </div>
    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" required>
        <label class="form-check-label">Acepto los términos y condiciones</label>
    </div>
    <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" name="confirmacion" required>
        <label class="form-check-label">Confirmo que mis datos son correctos</label>
    </div>
    <button type="submit" class="btn btn-success">Confirmar Compra</button>
    <?= form_close(); ?>
</div>

<!-- Validación front-end -->
<script>
document.getElementById('formFinalizar').addEventListener('submit', function(e) {
    let domicilio = document.querySelector('[name="direccion"]').value.trim();
    let formaEntrega = document.querySelector('[name="forma_entrega"]:checked')?.value;

    if (formaEntrega === '1' && domicilio === '') {
        e.preventDefault();
        alert('Debes completar tu domicilio para envío a domicilio.');
    }
});
</script>
<?= $this->endSection(); ?>
