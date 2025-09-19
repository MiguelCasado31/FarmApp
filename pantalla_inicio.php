<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmAPP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>


<body>
    <?php
    if (isset($_GET['usuario'])) {
        $id = $_GET['usuario'];
    }

    ?>
    <!-- Botón de menú -->
    <button class="menu-btn" onclick="toggleSidebar()">☰</button>

    <!-- Barra Lateral -->
    <div id="sidebar" class="sidebar">
        <h2>FarmAPP</h2>
        <ul>
            <li><a href="pantalla_inicio.php">Inicio</a></li>
            <li><a href="vista/listado_actividades.php">Actividades</a></li>
            <li><a href="vista/listado_parcelas.php">Campos</a></li>
            <li><a href="vista/listado_maquinaria.php">Maquinaria</a></li>
        </ul>
        <div class="profile-menu">
            <button class="profile-btn" onclick="toggleProfileMenu()">
                <i class="fa-regular fa-circle-user"></i>
            </button>
            <div id="profile-dropdown" class="profile-dropdown">
                <a href="configuracion.html">Configuración del perfil</a>
                <a href="logout.php">Cerrar sesión</a>
            </div>
        </div>
    </div>

    <!-- Contenido Principal -->
    <section id="main-content" class="main-content text-center">
        <h1 class="text-center">Bienvenido</h1>
        <p class="text-center">Este es el contenido de la página.</p>
    </section>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("active");
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