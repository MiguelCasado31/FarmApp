<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Actividades</title>
    <link rel="shortcut icon" href="../images/farm-app1.png" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="https://kit.fontawesome.com/a7093f3be1.js" crossorigin="anonymous"></script>
</head>


<body>
    <?php
    if (isset($_GET['usuario'])) {
        $id = $_GET['usuario'];
    }
    require_once "../modelo/modelo_tierras.php";
    $actividades = obtener_actividades();

    $actualizar_actividad = 'actualizar_actividad.php?id=';
    $eliminar_actividad = 'eliminar_actividad.php?id=';
    ?>


    <!-- Botón de menú -->
    <button class="menu-btn" onclick="toggleSidebar()">☰</button>

    <!-- Barra Lateral -->
    <div id="sidebar" class="sidebar">
        <h2>FarmAPP</h2>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="listado_actividades.php">Actividades</a></li>
            <li><a href="listado_parcelas.php">Campos</a></li>
            <li><a href="listado_maquinaria.php">Maquinaria</a></li>
        </ul>
        <div class="profile-menu">
            <button class="profile-btn" onclick="toggleProfileMenu()">
                <i class="fa-regular fa-circle-user fa-2x"></i>
            </button>
            <div id="profile-dropdown" class="profile-dropdown">
                <a href="configuracion.html">Configuración del perfil</a>
                <a href="logout.php">Cerrar sesión</a>
            </div>
        </div>
    </div>

    <!-- Contenido Principal -->
    <section id="main-content" class="main-content">
        <div class="row">
            <h2 class="col-11 text-center">Actividades</h2>

            <a href="alta_actividad.php" class="col-1">
                <button class="btn btn-primary rounded">
                    <i class="fa-solid fa-circle-plus"></i>
                </button>
            </a>

        </div>

        <div>
            <div class="table-responsive">
                <table class="table table-fluid text-center p-5">
                    <thead>
                        <tr>
                            <th>Trabajo</th>
                            <th>Fecha</th>
                            <th>Parcela</th>
                            <th>Duración</th>
                            <th>Maquinaria</th>
                            <th>Comentarios</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($actividades as $actividad) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($actividad['trabajo']); ?></td>
                                <td><?php echo htmlspecialchars($actividad['fecha']) ?></td>
                                <td><?php echo htmlspecialchars($actividad['nombre']) ?></td>
                                <td><?php echo htmlspecialchars($actividad['duracion']) ?></td>
                                <td><?php echo htmlspecialchars($actividad['Marca'] . ' ' . $actividad['Modelo']) ?></td>
                                <td><?php echo htmlspecialchars($actividad['comentarios']) ?></td>
                                <td>
                                    <a href="<?php echo $actualizar_actividad . $actividad['id_actividad']; ?>">
                                        <button class="btn btn-secondary max-width text-white">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                    <a href="../controlador/controlador_actividades.php?accion=eliminar&id_actividad=<?php echo $actividad['id_actividad']; ?>">
                                        <button class="btn btn-secondary text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="container text-center mb-3">
                <a href="../index.php">
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-arrow-left"></i>
                        Inicio
                    </button>
                </a>
            </div>
        </div>
    </section>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("active");
            document.getElementById("main-content").classList.toggle("full-width");
        }

        function toggleProfileMenu() {
            document.getElementById("profile-dropdown").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.closest('.profile-menu')) {
                document.getElementById("profile-dropdown").classList.remove("show");
            }
        };

        function toggleInfo(index) {
            var extraInfo = document.getElementById("infoExtra" + index);
            extraInfo.style.display = (extraInfo.style.display === "none") ? "table-row" : "none";
        }
    </script>
</body>

</html>