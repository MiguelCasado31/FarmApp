<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
    <link rel="shortcut icon" href="images/farm-app1.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a7093f3be1.js" crossorigin="anonymous"></script>
</head>

<body class="container mt-5 d-flex justify-content-center flex-column align-items-center  p-5 rounded" style="width: 600px; border: 2px solid black;">
    <form class="w-100 text-center p-4 rounded border border-2 shadow-sm bg-light"
        action="../ProyectoTierras/controlador/controlador_general.php"
        method="POST"
        aria-labelledby="form-title">

        <input type="hidden" name="accion" value="inicio_sesion">

        <h1 id="form-title" class="py-2 mb-4 text-primary" style="font-size: 24px;">Iniciar Sesión</h1>

        <div class="mb-4">
            <label for="usuario" class="form-label fw-bold">Usuario</label>
            <input type="text"
                class="form-control w-50 mx-auto border-secondary"
                name="usuario"
                id="usuario"
                placeholder="Introduce tu nombre de usuario"
                required
                aria-label="Nombre de usuario">
        </div>

        <div class="mb-4">
            <label for="password" class="form-label fw-bold">Contraseña</label>
            <input type="password"
                class="form-control w-50 mx-auto border-secondary"
                name="password"
                id="password"
                placeholder="Introduce tu contraseña"
                required
                aria-label="Contraseña">
        </div>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit"
                class="btn btn-primary px-4 py-2"
                aria-label="Iniciar sesión">Iniciar Sesión</button>
        </div>
    </form>


</body>


</html>