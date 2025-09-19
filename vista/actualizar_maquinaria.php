<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a7093f3be1.js" crossorigin="anonymous"></script>
</head>

<body class="bg-secondary">
    <div>
        <?php
        require_once '../controlador/controlador_maquinaria.php';
        $id = $_GET['id'];

        $maquinaria = obtener_maquinaria_por_id($id);
       
        ?>
        <div class="bg-white container mt-5 border border-dark pb-3 card">
            <form action="../controlador/controlador_maquinaria.php" method="post">
                <input type="hidden" name="accion" value="actualizar">
                <h2 class="text-center mt-3 lead" style="font-size: xx-large;" ><strong>Actualizar Maquinaria</strong></h2>
                <div class="d-flex">
                    <label class="col-md-2 lead" for="id_maquinaria"><strong>ID:</strong></label>
                    <input name="id_maquinaria" class="form-control w-75" value="<?php echo $id ?>" readonly>
                </div>
                <div class="d-flex mt-4">
                    <label class="col-md-2 lead" for="vehiculo"><strong>Nombre:</strong></label>
                    <input type="text" class="form-control w-75" id="vehiculo" name="vehiculo" value="<?php echo $maquinaria['Vehículo'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="marca"><strong>Marca:</strong></label>
                    <input type="text" class="form-control w-75" id="marca" name="marca" value="<?php echo $maquinaria['Marca'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="modelo"><strong>Modelo:</strong></label>
                    <input type="text" class="form-control w-75" id="modelo" name="modelo" value="<?php echo $maquinaria['Modelo'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="consumo"><strong>Consumo:</strong></label>
                    <input type="text" class="form-control w-75" id="consumo" name="consumo" value="<?php echo $maquinaria['Consumo'] ?>">
                </div>   
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-regular fa-paper-plane"></i>
                        Actualizar</button>
                </div>
            </form>
        </div>
        <div class="container text-center mt-5 ">
            <a href="../pantalla_inicio.php">
                <button class="btn btn-primary sm">
                <i class="fa-solid fa-arrow-left"></i>
                    Inicio
                </button>
            </a>
        </div>
    </div>
</body>

</html>