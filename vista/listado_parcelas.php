<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Parcelas</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a7093f3be1.js" crossorigin="anonymous"></script>
</head>
<style>
    .rotado {
    transform: rotate(180deg);
    transition: transform 0.2s;
}
</style>
<?php
if (isset($_GET['usuario'])) {
    $id = $_GET['usuario'];
}

require_once "../modelo/modelo_tierras.php";
$parcelas = recoger_parcelas();
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
            <h2 class="text-center flex-grow-1">Parcelas</h2>
            <a href="alta_parcela.php">
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
                            <th>Nombre</th>
                            <th>Polígono</th>
                            <th>Parcela</th>
                            <th>Recinto</th>
                            <th>Superficie</th>
                            <th>Cultivo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($parcelas as $parcela) : 
                            $actividades = obtener_ultimas_actividades_por_parcela($parcela['id_campo']);
                            $parcelaId = $parcela['id_campo'];
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($parcela['nombre']) ?></td>
                                <td><?php echo htmlspecialchars($parcela['poligono']) ?></td>
                                <td><?php echo htmlspecialchars($parcela['parcela']) ?></td>
                                <td><?php echo htmlspecialchars($parcela['recinto']) ?></td>
                                <td><?php echo htmlspecialchars($parcela['superficie']) ?></td>
                                <td><?php echo htmlspecialchars($parcela['cultivo']) ?></td>
                                <td>
                                    <button class="btn btn-secondary" onclick="toggleActividades('<?php echo $parcelaId; ?>')">
                                        <i id="icono-<?php echo $parcelaId; ?>" class="fa-solid fa-chevron-down"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr id="actividades-<?php echo $parcelaId; ?>" style="display:none;">
                                <td colspan="7">
                                    <strong>Últimas actividades:</strong>
                                    <ul>
                                        <?php foreach ($actividades as $act): ?>
                                            <li class="d-flex justify-content-evenly" style="list-style: none;" >
                                                <p class="text-center"><?php echo htmlspecialchars($act['fecha']);?></p>
                                                <p class="text-center"><?php echo htmlspecialchars($act['trabajo']);?></p>
                                                <p class="text-center"><?php echo htmlspecialchars($act['duracion']) . "h";?></p>
                                            </li>
                                        <?php endforeach; ?>
                                        <?php if (empty($actividades)): ?>
                                            <li style="list-style: none;">No hay actividades recientes.</li>
                                        <?php endif; ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container text-center mt-3 mb-5">
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

        function toggleActividades(parcelaId) {
            var row = document.getElementById("actividades-" + parcelaId);
            var icono = document.getElementById("icono-" + parcelaId);
            if (row.style.display === "none" || row.style.display === "") {
                row.style.display = "table-row";
                icono.classList.add("rotado");
            } else {
                row.style.display = "none";
                icono.classList.remove("rotado");
            }
        }
    </script>
</body>

</html>