<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Maquinaria</title>
    <link rel="shortcut icon" href="../images/farm-app1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a7093f3be1.js" crossorigin="anonymous"></script>
</head>
<style>
    .imagen {
        background-image: url('../images/slider1.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .formulario {
        opacity: 0.9;
        background-color: white;
    }
</style>
<?php
require_once "../modelo/modelo_tierras.php";
?>

<body class="imagen">
</body>
<div class="container">

    <div class="formulario text-center card mt-5">
        <h2 class="mt-3 lead" style="font-size: xx-large;"><strong>Nueva Maquinaria</strong></h2>
        <form action="../controlador/controlador_maquinaria.php" method="POST">
            <input type="hidden" name="accion" value="alta">
            <div class="form-group d-flex mt-3">
                <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                    <label class="lead" for="vehiculo"><strong>Vehiculo:</strong></label>
                </div>
                <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                    <input type="text" id="vehiculo" name="vehiculo" class="form-control" placeholder="Vehiculo" required>
                </div>
            </div>
            <div class="form-group d-flex mt-3">
                <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                    <label class="lead" for="marca"><strong>Marca:</strong></label>
                </div>
                <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                    <input type="text" id="marca" name="marca" class="form-control" placeholder="Marca" required>
                </div>
            </div>
            <div class="form-group d-flex mt-3">
                <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                    <label class="lead" for="Modelo"><strong>Modelo:</strong></label>
                </div>
                <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                    <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo" required>
                </div>
            </div>
            <div class="form-group d-flex mt-3">
                <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                    <label class="lead" for="consumo"><strong>Consumo:</strong></label>
                </div>
                <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                    <input type="number" id="consumo" name="consumo" step="0.01" class="form-control" placeholder="Consumo" >
                </div>
            </div>
            <div class="pb-3">
                <button type="submit" class="btn btn-primary btn-block mt-4">
                    <i class="fa-regular fa-paper-plane"></i> Enviar</button>
            </div>

        </form>
    </div>
    <div class="text-center mt-5">
        <a href="listado_maquinaria.php"><button class="btn btn-primary">
                <i class="fa-solid fa-arrow-left"></i> Inicio</button></a>
    </div>
</div>

</html>