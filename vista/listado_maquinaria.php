<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Maquinaria</title>
    <link rel="shortcut icon" href="../images/farm-app1.png" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a7093f3be1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<?php
$eliminar = "eliminar_maquinaria.php?id=";
$actualizar = "actualizar_maquinaria.php?id=";
require_once "../modelo/modelo_tierras.php";
$maquinarias = obtener_maquinaria();
if (isset($_GET['usuario'])) {
    $id = $_GET['usuario'];
}
?>

<body>

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

    <div id="main-content" class="main-content">
        <div class="tabla m-2 d-flex justify-content-between align-items-center">
            <h2 class="text-center flex-grow-1">Maquinaria</h2>
            <a href="alta_maquinaria.php">
                <button class="btn btn-primary rounded">
                    <i class="fa-solid fa-circle-plus"></i>
                </button>
            </a>
        </div>

        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Vehiculo / Maquinaria</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Consumo</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($maquinarias as $maquinaria) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($maquinaria['tipo_maquinaria_nombre']); ?></td>
                        <td><?php echo htmlspecialchars($maquinaria['Marca']) ?></td>
                        <td><?php echo htmlspecialchars($maquinaria['Modelo']) ?></td>
                        <td><?php echo htmlspecialchars($maquinaria['Consumo']) ?></td>
                        <td>
                            <a href="<?php echo $actualizar . $maquinaria['id_maquinaria']; ?>">
                                <button class="btn btn-secondary max-width text-white">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </a>
                            <a href="<?php echo $eliminar . $maquinaria['id_maquinaria']; ?>">
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
    <div class="container text-center mt-5 mb-5">
        <a href="../index.php">
            <button class="btn btn-primary">
                <i class="fa-solid fa-arrow-left"></i>
                Inicio
            </button>
        </a>
    </div>
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
    </script>
</body>

</html>