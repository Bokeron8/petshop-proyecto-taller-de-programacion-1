<?= $this->extend('plantillas/plantilla'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4 mb-5 p-4 rounded shadow-sm"
    style="background-color:rgb(238, 237, 237); border: 1px solid #e0e0e0;">
    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger text-center fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Errores en el formulario:</h4>
        <ul class="mb-0">
            <?= $validation->listErrors('list') ?>
        </ul>
    </div>
    <?php endif; ?>

    <h2 class="mb-4 text-center" style="color: #343a40;">Finalizar Compra</h2>
    <hr class="mb-4">

    <?= form_open('carrito/procesarVenta', ['id' => 'checkoutForm', 'novalidate' => 'novalidate']); ?>

    <div class="row">
        <div class="col-md-6">
            <h5 class="mb-3" style="color: #5a5a5a;">Datos de Contacto y Envío</h5>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" name="dni" id="dni" class="form-control" placeholder="Ej: 12345678"
                    value="<?= esc($usuario['dni_usuario'] ?? '') ?>" pattern="^[1-9][0-9]{7}$" required>
                <div class="invalid-feedback">
                    El DNI debe tener exactamente 8 dígitos y no comenzar con 0.
                </div>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Ej: 3794123456"
                    value="<?= esc($usuario['telefono_usuario'] ?? '') ?>" pattern="^[1-9][0-9]{9,10}$" required>
                <div class="invalid-feedback">
                    El número de teléfono debe tener entre 10 y 11 dígitos, sin el +54.
                </div>
            </div>

            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio:</label>
                <input type="text" name="direccion" id="domicilio" class="form-control"
                    placeholder="Calle, número, piso/depto (si aplica)"
                    value="<?= esc($usuario['domicilio_usuario'] ?? '') ?>" required>
                <div class="invalid-feedback">
                    Por favor, ingresa tu domicilio completo.
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <h5 class="mb-3" style="color: #5a5a5a;">Opciones de Pago y Entrega</h5>

            <div class="mb-3">
                <label for="forma_pago" class="form-label">Forma de pago:</label>
                <select name="forma_pago" id="forma_pago" class="form-select" required>
                    <option value="">Seleccione un método de pago</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia Bancaria</option>
                    <option value="Tarjeta de debito">Tarjeta de Débito</option>
                    <option value="Tarjeta de credito">Tarjeta de Crédito</option>
                    <option value="Mercado Pago">Mercado Pago</option>
                </select>
                <div class="invalid-feedback">
                    Por favor, selecciona una forma de pago.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Forma de entrega:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="forma_entrega" id="retiroLocal" value="0"
                        required>
                    <label class="form-check-label" for="retiroLocal">Retiro en local</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="forma_entrega" id="envioDomicilio" value="1"
                        required>
                    <label class="form-check-label" for="envioDomicilio">Envío a domicilio</label>
                </div>
                <div class="invalid-feedback d-block">
                    Por favor, selecciona una forma de entrega.
                </div>
            </div>

            <hr class="my-4">

            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                <label class="form-check-label" for="termsCheck">Acepto los <a href="<?= base_url('/terminos-usos') ?>"
                        style="color: #007bff; text-decoration: none;">términos y condiciones</a></label>
                <div class="invalid-feedback">
                    Debes aceptar los términos y condiciones.
                </div>
            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="confirmacion" id="confirmacionCheck" required>
                <label class="form-check-label" for="confirmacionCheck">Confirmo que mis datos son correctos</label>
                <div class="invalid-feedback">
                    Debes confirmar que tus datos son correctos.
                </div>
            </div>
        </div>
    </div>

    <div class="d-grid gap-2 col-md-6 mx-auto">
        <button type="submit" class="btn btn-primary btn-lg"
            style="background-color: #28a745; border-color: #28a745;">Confirmar Compra</button>

    </div>

    <?= form_close(); ?>
</div>

<?= $this->endSection(); ?>