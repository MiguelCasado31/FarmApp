<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Actividad</title>
    <link rel="shortcut icon" href="../images/farm-app1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a7093f3be1.js" crossorigin="anonymous"></script>
</head>

<?php
require_once "../modelo/modelo_tierras.php";
?>

<body class="imagen">
    <div class="container">

        <div class="bg-white container text-center card mt-5">
            <h2 class="mt-3 lead" style="font-size: xx-large;"><strong>Nueva Actividad</strong></h2>
            <form action="../controlador/controlador_actividades.php" method="POST">
                <input type="hidden" name="accion" value="alta">
                <div class="form-group d-flex mt-3">
                    <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                        <label class="lead" for="Trabajo"><strong>Trabajo:</strong></label>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                        <select name="trabajo" id="trabajo" class="form-control">
                            <option value="Abonar">Abonar</option>
                            <option value="Arar">Arar</option>
                            <option value="Podar">Podar</option>
                            <option value="Sarmentar">Sarmentar</option>
                            <option value="Atar">Atar</option>
                            <option value="Tto. Fitosanitario">Tto. Fitosanitario</option>
                            <option value="Regar">Regar</option>
                            <option value="Cosechar">Cosechar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex mt-3">
                    <div class="col-xl-2 col-md-4 col-sm-6 col-6 required">
                        <label class="lead" for="fecha"><strong>Fecha:</strong></label>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                        <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha">
                    </div>
                </div>
                <div class="form-group d-flex mt-3">
                    <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                        <label class="lead" for="duracion"><strong>Duracion:</strong></label>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                        <input type="time"
                            id="duracion"
                            name="duracion"
                            class="form-control"
                            value="00:00"
                            min="00:00"
                            max="23:59"
                            step="600">
                    </div>
                </div>
                <div class="form-group d-flex mt-3">
                    <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                        <label class="lead" for="parcela"><strong>Parcela:</strong></label>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                        <select name="parcela" class="form-control">
                            <?php

                            $parcelas = obtener_parcelas();
                            foreach ($parcelas as $parcela) :
                                echo '<option value="' . $parcela['nombre'] . '">' . $parcela['nombre'] . '</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex mt-3">
                    <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                        <label class="lead" for="maquinaria"><strong>Maquinaria:</strong></label>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                        <select name="maquinaria" class="form-control">
                            <?php

                            $maquinarias = obtener_maquinaria();
                            foreach ($maquinarias as $maquinaria) :
                                echo '<option value="' . $maquinaria['Marca'] . ' ' . $maquinaria['Modelo'] . '">' . $maquinaria['Marca'] . ' ' . $maquinaria['Modelo'] . '</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="row">
                        <label class="lead" for="comentario"><strong>Comentarios:</strong></label>
                    </div>
                    <div class="row justify-content-center">
                        <textarea class="form-control w-75" rows="5" id="comentario" name="comentario"></textarea>
                    </div>
                </div>


                <div class="pb-3">
                    <button type="submit" class="btn btn-primary btn-block mt-4">
                        <i class="fa-regular fa-paper-plane"></i> Enviar</button>
                </div>

            </form>
        </div>
        <div class="text-center mt-5">
            <a href="listado_actividades.php"><button class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left"></i> Inicio</button></a>
        </div>
    </div>
</body>

</html>