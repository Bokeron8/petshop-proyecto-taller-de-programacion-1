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

    <?= form_open('carrito/procesarVenta', ['id' => 'checkoutForm']); ?>

    <div class="row">
        <div class="col-md-6">
            <h5 class="mb-3" style="color: #5a5a5a;">Datos de Contacto y Envío</h5>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="number" name="dni" id="dni" class="form-control" placeholder="Ej: 12345678"
                    value="<?= esc($usuario['dni_usuario'] ?? '') ?>" required min="1000000" max="99999999">
                <div class="invalid-feedback">
                    Por favor, ingresa un DNI válido (8 dígitos).
                </div>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Ej: 3794123456"
                    value="<?= esc($usuario['telefono_usuario'] ?? '') ?>" required>
                <div class="invalid-feedback">
                    Por favor, ingresa un número de teléfono válido.
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
                    <option value="efectivo">Efectivo</option>
                    <option value="transferencia">Transferencia Bancaria</option>
                    <option value="tarjeta_debito">Tarjeta de Débito</option>
                    <option value="tarjeta_credito">Tarjeta de Crédito</option>
                    <option value="mercado_pago">Mercado Pago</option>
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

<script>
document.addEventListener('DOMContentLoaded', function() {


    const checkoutForm = document.getElementById('checkoutForm');
    const domicilioInput = document.getElementById('domicilio');
    const envioDomicilioRadio = document.getElementById('envioDomicilio');
    const retiroLocalRadio = document.getElementById('retiroLocal');

    // Function to toggle domicilio field requirement
    function toggleDomicilioRequirement() {
        if (envioDomicilioRadio.checked) {
            domicilioInput.setAttribute('required', 'required');
            domicilioInput.parentNode.classList.remove('d-none'); // Show parent div if hidden
        } else {
            domicilioInput.removeAttribute('required');
            domicilioInput.classList.remove('is-invalid'); // Clear validation if no longer required
            domicilioInput.parentNode.classList.add('d-none'); // Hide parent div
        }
    }

    // Initial state based on pre-selected radio or default
    toggleDomicilioRequirement();

    // Add event listeners to radio buttons
    envioDomicilioRadio.addEventListener('change', toggleDomicilioRequirement);
    retiroLocalRadio.addEventListener('change', toggleDomicilioRequirement);

    checkoutForm.addEventListener('submit', function(event) {
        let isValid = true;

        // Clear previous validation messages
        checkoutForm.querySelectorAll('.is-invalid').forEach(element => {
            element.classList.remove('is-invalid');
        });
        checkoutForm.querySelectorAll('.invalid-feedback').forEach(element => {
            element.style.display = 'none';
        });

        // Validate DNI
        const dni = document.getElementById('dni');
        if (!dni.value || dni.value.length < 7 || dni.value.length >
            8) { // Assuming DNI is 7 or 8 digits
            dni.classList.add('is-invalid');
            dni.nextElementSibling.style.display = 'block';
            isValid = false;
        }

        // Validate Teléfono (basic check for non-empty)
        const telefono = document.getElementById('telefono');
        if (!telefono.value.trim()) {
            telefono.classList.add('is-invalid');
            telefono.nextElementSibling.style.display = 'block';
            isValid = false;
        }

        // Validate Domicilio if "Envío a domicilio" is selected
        if (envioDomicilioRadio.checked && !domicilioInput.value.trim()) {
            domicilioInput.classList.add('is-invalid');
            domicilioInput.nextElementSibling.style.display = 'block';
            isValid = false;
        }

        // Validate Forma de pago
        const formaPago = document.getElementById('forma_pago');
        if (!formaPago.value) {
            formaPago.classList.add('is-invalid');
            formaPago.nextElementSibling.style.display = 'block';
            isValid = false;
        }

        // Validate Forma de entrega
        const formaEntregaRadios = document.querySelectorAll('input[name="forma_entrega"]');
        let formaEntregaSelected = false;
        for (const radio of formaEntregaRadios) {
            if (radio.checked) {
                formaEntregaSelected = true;
                break;
            }
        }
        if (!formaEntregaSelected) {
            // Find the closest invalid-feedback for the radio group and show it
            document.querySelector('.form-check-inline .invalid-feedback').style.display = 'block';
            isValid = false;
        }


        // Validate Terms & Conditions
        const termsCheck = document.getElementById('termsCheck');
        if (!termsCheck.checked) {
            termsCheck.classList.add('is-invalid');
            termsCheck.nextElementSibling.style.display = 'block';
            isValid = false;
        }

        // Validate Data Confirmation
        const confirmacionCheck = document.getElementById('confirmacionCheck');
        if (!confirmacionCheck.checked) {
            confirmacionCheck.classList.add('is-invalid');
            confirmacionCheck.nextElementSibling.style.display = 'block';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission
        } else {
            // Optionally, disable the submit button to prevent double submission
            const submitButton = checkoutForm.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Procesando...';

        }
    });
});
</script>

<?= $this->endSection(); ?>