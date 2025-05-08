<?php $this->extend('plantillas/plantilla'); ?>

<?php $this->section('content'); ?>



<div class="container my-5 bg-translucido">
    <h1 class="text-center mb-4 title puppy">Terminos y Condiciones de Uso</h1>
    <div class="accordion" id="legalAccordion">

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                    1. Información General
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#legalAccordion">
                <div class="accordion-body">
                    Este sitio web es operado por <strong>Full Animal. SA</strong> con domicilio en
                    <strong>Brasil 809, Corrientes, Corrientes, Argentina</strong>. Al utilizar este sitio web, usted
                    acepta
                    estos términos de uso, así como la legislación vigente de la República Argentina.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse2">
                    2. Servicios Ofrecidos
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#legalAccordion">
                <div class="accordion-body">
                    Ofrecemos productos y servicios para mascotas, incluyendo alimentos, accesorios, artículos de
                    higiene, y juguetes.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse3">
                    3. Uso del Sitio Web
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#legalAccordion">
                <div class="accordion-body">
                    El usuario se compromete a usar el sitio de forma lícita y respetuosa. Queda prohibido realizar
                    actividades fraudulentas, copiar contenido o interferir con el funcionamiento del sitio.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse4">
                    4. Política de Privacidad
                </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#legalAccordion">
                <div class="accordion-body">
                    En cumplimiento con la Ley N° 25.326 de Protección de Datos Personales, informamos que los datos
                    personales brindados serán tratados con estricta confidencialidad. Usted tiene derecho a acceder,
                    rectificar y suprimir sus datos contactándonos a <strong>fullanimal@gmail.com</strong>.
                    <br><br>
                    La Dirección Nacional de Protección de Datos Personales, órgano de control de la Ley N° 25.326,
                    tiene la atribución de atender las denuncias y reclamos que se interpongan con relación al
                    incumplimiento de las normas sobre protección de datos personales.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse5">
                    5. Compras, Pagos y Envíos
                </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#legalAccordion">
                <div class="accordion-body">
                    Las compras se realizan a través del sitio mediante tarjeta de crédito/débito, transferencia o
                    plataformas como MercadoPago. <br>
                    Envíos disponibles a todo el país con tiempos de entrega entre 24 y 72 hs hábiles dependiendo de la
                    zona. Los costos se informan al momento de la compra. Todos los envíos cuentan con número de
                    seguimiento.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading6">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse6">
                    6. Cambios, Devoluciones y Garantías
                </button>
            </h2>
            <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#legalAccordion">
                <div class="accordion-body">
                    De acuerdo a la Ley de Defensa del Consumidor (Ley 24.240), podés solicitar el cambio o devolución
                    de productos dentro de los 10 días hábiles posteriores a su recepción. Los productos deben estar sin
                    uso y en su empaque original.
                    <br><br>
                    Algunos productos como alimentos abiertos, productos vencidos por mal almacenamiento del cliente o
                    artículos de higiene usados no tienen devolución.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading7">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse7">
                    7. Soporte y Contacto
                </button>
            </h2>
            <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#legalAccordion">
                <div class="accordion-body">
                    Para consultas, soporte postventa o reclamos podés comunicarte con nuestro equipo:<br>
                    ✉️ <strong>fullanimal@gmail.com</strong><br>
                    ☎️ <strong>3794008595</strong><br>
                    🕑 Atención: Lunes a Sabados de 9 a 21 hs.
                </div>
            </div>
        </div>


        <div class="accordion-item">
            <h2 class="accordion-header" id="heading8">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse8">
                    8. Modificaciones de los Términos
                </button>
            </h2>
            <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#legalAccordion">
                <div class="accordion-body">
                    Nos reservamos el derecho de modificar estos términos en cualquier momento. Las actualizaciones
                    serán publicadas en esta misma sección, y el uso del sitio luego de dichas modificaciones implicará
                    la aceptación de los nuevos términos.
                    <br><br>
                    Última actualización: <strong>15 de abril de 2025</strong>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $this->endSection(); ?>