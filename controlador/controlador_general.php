<?php
// Incluir el archivo de configuración
require '../config.php';

// Incluir el modelo de usuarios
require_once MODEL_PATH . 'modelo_tierras.php';

// Inicializar variables
$id = null;

// Recoger datos de las solicitudes
if (isset($_POST['id_usuario'])) {
    $id = $_POST['id_usuario'];
}

if (isset($_GET['id_usuario'])) {
    $id = $_GET['id_usuario'];
}

// Verificar la acción a realizar
if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'inicio_sesion':
            $usuario = isset($_POST['usuario']) ? limpiar_dato($_POST['usuario']) : null;
            $password = isset($_POST['password']) ? limpiar_dato($_POST['password']) : null;

            // Validar que los campos no estén vacíos
            if (!$usuario || !$password) {
                echo "Por favor, completa todos los campos.";
                exit;
            }

            // Verificar las credenciales del usuario
            $resultado = verificarCredenciales($usuario, $password);
            $id = obtener_usuario($usuario);
            // print_r($id['id_usuario']);
            // exit;

            if ($resultado['exito']) {
                // Inicio de sesión exitoso
                echo "Inicio de sesión exitoso. Bienvenido, " . htmlspecialchars($usuario);
                header("Location: ../pantalla_inicio.php?usuario=" . $id['id_usuario']);
                exit;
            } else {
                // Credenciales incorrectas
                echo $resultado['mensaje'];
            }
            break;

        case 'registro':
            $usuario = isset($_POST['usuario']) ? limpiar_dato($_POST['usuario']) : null;
            $password = isset($_POST['password']) ? limpiar_dato($_POST['password']) : null;
            $nombreCompleto = isset($_POST['nombre_completo']) ? limpiar_dato($_POST['nombre_completo']) : null;

            // Validar que los campos no estén vacíos
            if (!$usuario || !$password || !$nombreCompleto) {
                echo "Por favor, completa todos los campos.";
                exit;
            }

            // Registrar usuario
            if (registrarUsuario($usuario, $password, $nombreCompleto)) {
                echo "Registro exitoso. Ahora puedes iniciar sesión.";
                header("Location: ../pantalla_inicio.php");
                exit;
            } else {
                echo "Error al registrar el usuario.";
            }
            break;

        // Más acciones como 'actualizar', 'eliminar', etc.
        default:
            echo "Acción no reconocida.";
            break;
    }
}
