<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de parcela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a7093f3be1.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <?php
    require_once '../controlador/controlador_parcelas.php';
    $id = $_GET['id'];
    $parcela = obtener_parcelas_por_id($id);
    $actividades = obtener_actividad_por_parcela($id);
    $actualizar = 'actualizar_parcela.php?id=';
    $eliminar = 'eliminar_parcela.php?id=';
    ?>
    <div class="container mt-5">
        <div class="card p-4">
            <h2 style="font-size: xx-large; text-align: center;" class="lead"><strong>Consulta de parcela</strong></h2>
            <table class="table table-striped text-center">
                <tbody>
                    <tr>

                        <th class colspan="2" class="lead"><strong>
                                <h4><?php echo htmlspecialchars($parcela["nombre"]); ?></h4>
                            </strong></th>
                    </tr>
                    <tr>
                        <th scope="col">ID_PARCELA</th>
                        <td class="lead"><strong><?php echo $id; ?></strong></td>
                    </tr>
                    <tr>
                        <th scope="col">POLÍGONO</th>
                        <td class="lead"><strong><?php echo htmlspecialchars($parcela["poligono"]); ?></strong></td>
                    </tr>
                    <tr>
                        <th scope="col">PARCELA</th>
                        <td class="lead"><strong><?php echo htmlspecialchars($parcela["parcela"]); ?></strong></td>
                    </tr>
                    <tr>
                        <th scope="col">RECINTO</th>
                        <td class="lead"><strong><?php echo htmlspecialchars($parcela["recinto"]); ?></strong></td>
                    </tr>
                    <tr>
                        <th scope="col">SUPERFICIE</th>
                        <td class="lead"><strong><?php echo htmlspecialchars($parcela["superficie"]); ?></strong></td>
                    </tr>
                    <tr>
                        <th scope="col">CULTIVO</th>
                        <td class="lead"><strong><?php echo htmlspecialchars($parcela["cultivo"]); ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="2"><img class="w-25" src="<?php echo htmlspecialchars($parcela['sigpac']); ?>" alt="Aqui deberia de haber una imagen"></td>
                    </tr>
                </tbody>
            </table>
            <div class="table-responsive  text-center">
                <h4 class="text-center">Actividades Realizadas</h4>
                <table class="table table-fluid text-center     ">
                    <thead>
                        <tr>
                            <th>Trabajo</th>
                            <th>Fecha</th>
                            <th>Duracion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($actividades as $actividad) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($actividad['trabajo']); ?></td>
                                <td><?php echo htmlspecialchars($actividad['fecha']) ?></td>
                                <td><?php echo htmlspecialchars($actividad['duracion']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-evenly mt-5 text-center">
                <div class="col-4">
                    <a href="<?php echo $eliminar . $parcela['id_campo'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</a>
                </div>
                <div class="col-4">
                    <a href="<?php echo $actualizar . $parcela['id_campo'] ?>" class="btn btn-secondary"><i class="fa fa-pencil"></i> Modificar</a>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <a href="listado_parcelas.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Inicio</a>
        </div>
    </div>
</body>

</html>