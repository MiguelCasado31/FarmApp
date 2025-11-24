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
        require_once '../controlador/controlador_actividades.php';
        $id = $_GET['id'];

        $actividad = obtener_actividad_por_id($id);

        ?>
        <div class="bg-white container mt-5 border border-dark pb-3 card">
            <form action="../controlador/controlador_actividades.php" method="post">
                <input type="hidden" name="accion" value="actualizar">
                <h2 class="text-center mt-3 lead" style="font-size: xx-large;"><strong>Actualizar actividad</strong></h2>
                <div class="d-flex">
                    <label class="col-md-2 lead" for="id_actividad"><strong>ID:</strong></label>
                    <input name="id_actividad" class="form-control w-75" value="<?php echo $actividad['id_actividad'] ?>" readonly>
                </div>
                <div class="d-flex mt-4">
                    <label class="col-md-2 lead" for="trabajo"><strong>Trabajo:</strong></label>
                    <select name="trabajo" id="trabajo" class="form-control w-75">
                        <option value="Abonar" <?php if ($actividad['trabajo'] == 'Abonar') echo 'selected'; ?>>Abonar</option>
                        <option value="Arar" <?php if ($actividad['trabajo'] == 'Arar') echo 'selected'; ?>>Arar</option>
                        <option value="Podar" <?php if ($actividad['trabajo'] == 'Podar') echo 'selected'; ?>>Podar</option>
                        <option value="Sarmentar" <?php if ($actividad['trabajo'] == 'Sarmentar') echo 'selected'; ?>>Sarmentar</option>
                        <option value="Atar" <?php if ($actividad['trabajo'] == 'Atar') echo 'selected'; ?>>Atar</option>
                        <option value="Tto. Fitosanitario" <?php if ($actividad['trabajo'] == 'Tto. Fitosanitario') echo 'selected'; ?>>Tto. Fitosanitario</option>
                        <option value="Regar" <?php if ($actividad['trabajo'] == 'Regar') echo 'selected'; ?>>Regar</option>
                        <option value="Cosechar" <?php if ($actividad['trabajo'] == 'Cosechar') echo 'selected'; ?>>Cosechar</option>
                    </select>

                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="estado"><strong>Estado:</strong></label>
                    <select name="estado" id="estado" class="form-control w-75">
                        <option value="Planificada">Planificada</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Finalizada">Finalizada</option>
                    </select>
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="fecha"><strong>Fecha:</strong></label>
                    <input type="date" class="form-control w-75" id="fecha" name="fecha" value="<?php echo $actividad['fecha'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="parcela"><strong>Parcela:</strong></label>
                    <input type="text" class="form-control w-75" id="parcela" name="parcela" value="<?php echo $actividad['nombre'] ?>" readonly>
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="duracion"><strong>Duracion:</strong></label>
                    <input type="time" class="form-control w-75" id="duracion" name="duracion" value="<?php echo $actividad['duracion'] ?>">
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="maquinaria"><strong>Maquinaria:</strong></label>
                    <select name="maquinaria" class="form-control w-75">
                        <?php
                        $maquinarias = obtener_maquinaria();
                        foreach ($maquinarias as $maquinaria) {
                            $selected = ($maquinaria['id_maquinaria'] == $actividad['id_maquinaria']) ? 'selected' : '';
                            echo '<option value="' . $maquinaria['id_maquinaria'] . '" ' . $selected . '>' . $maquinaria['Marca'] . ' ' . $maquinaria['Modelo'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="comentarios"><strong>Comentarios:</strong></label>
                    <input type="text" class="form-control w-75" id="comentarios" name="comentarios" value="<?php echo $actividad['comentarios'] ?>">
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