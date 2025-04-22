<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro / Inicio de Sesión</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="container mt-5">
        <h1 class="text-center text-primary">Formulario de Registro</h1>
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" placeholder="Ingresa tu nombre de usuario">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </section>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
