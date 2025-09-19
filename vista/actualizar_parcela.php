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
        require_once '../controlador/controlador_parcelas.php';
        $id = $_GET['id'];

        $parcela = obtener_parcelas_por_id($id);
       
        ?>
        <div class="bg-white container mt-5 border border-dark pb-3 card">
            <form action="../controlador/controlador_parcelas.php" method="post">
                <input type="hidden" name="accion" value="actualizar">
                <h2 class="text-center mt-3 lead" style="font-size: xx-large;" ><strong>Actualizar Parcela</strong></h2>
                <div class="d-flex">
                    <label class="col-md-2 lead" for="id_parcela"><strong>ID:</strong></label>
                    <input name="id_parcela" class="form-control w-75" value="<?php echo $parcela['id_campo'] ?>" readonly>
                </div>
                <div class="d-flex mt-4">
                    <label class="col-md-2 lead" for="nombre"><strong>Nombre:</strong></label>
                    <input type="text" class="form-control w-75" id="nombre" name="nombre" value="<?php echo $parcela['nombre'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="poligono"><strong>Poligono:</strong></label>
                    <input type="number" class="form-control w-75" id="poligono" name="poligono" value="<?php echo $parcela['poligono'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="parcela"><strong>Parcela:</strong></label>
                    <input type="number" class="form-control w-75" id="parcela" name="parcela" value="<?php echo $parcela['parcela'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="recinto"><strong>Recinto:</strong></label>
                    <input type="number" class="form-control w-75" id="recinto" name="recinto" value="<?php echo $parcela['recinto'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="superficie"><strong>Superficie:</strong></label>
                    <input type="text" class="form-control w-75" id="superficie" name="superficie" value="<?php echo $parcela['superficie'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="cultivo"><strong>cultivo:</strong></label>
                    <input type="text" class="form-control w-75" id="cultivo" name="cultivo" value="<?php echo $parcela['cultivo'] ?>">
                </div>
                
                
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-regular fa-paper-plane"></i>
                        Actualizar</button>
                </div>
            </form>
        </div>
        <div class="container text-center mt-5 ">
            <a href="listado_parcelas.php">
                <button class="btn btn-primary sm">
                <i class="fa-solid fa-arrow-left"></i>
                    Inicio
                </button>
            </a>
        </div>
    </div>
</body>

</html>