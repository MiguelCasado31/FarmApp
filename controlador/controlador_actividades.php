<?php
//Incluir el archivo de configuración
require '../config.php';

//Incluir el modelo 
require_once MODEL_PATH . '/modelo_tierras.php';

if (isset($_POST['id_actividad'])) {
    $id = $_POST['id_actividad'];
}

if (isset($_GET['id_actividad'])) {
    $id = $_GET['id_actividad'];
}

if(isset($_GET['usuario'])){
    $id_usuario = $_GET['usuario'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario'])) {
    $id_usuario = $_POST['usuario'];
}


if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'alta':
            $trabajo = limpiar_dato($_POST['trabajo']);
            $fecha = limpiar_dato($_POST['fecha']);
            $duracion = limpiar_dato($_POST['duracion']);
            $parcela = limpiar_dato($_POST['parcela']);
            $maquinaria = limpiar_dato($_POST['maquinaria']);
            $comentario = limpiar_dato($_POST['comentario']);

            $id_parcela = obtener_id_parcela($parcela);
            if ($id_parcela !== false) {
                insertar_actividad($trabajo, $fecha, $duracion, $id_parcela, $maquinaria, $comentario, $id_usuario);
            } else {
                echo "No se encontró la parcela.";
            }
            header("Location: ../vista/listado_actividades.php");
            break;
        case 'eliminar':
            eliminar_actividad($id);
            header("Location: ../vista/listado_actividades.php");    
            break;
        case 'actualizar':
            $trabajo = limpiar_dato($_POST['trabajo']);
            $fecha = limpiar_dato($_POST['fecha']);
            $duracion = limpiar_dato($_POST['duracion']);
            $parcela = limpiar_dato($_POST['parcela']);
            $maquinaria = limpiar_dato($_POST['maquinaria']);
            $comentario = limpiar_dato($_POST['comentarios']);

            $id_parcela = obtener_id_parcela($parcela);
            if ($id_parcela !== false) {
                actualizar_actividades($trabajo, $fecha, $duracion, $id_parcela, $maquinaria, $comentario, $id);
            } else {
                echo "No se encontró la parcela.";
            }
            header("Location: /vista/listado_actividades.php");
            break;
        case 'listar':
            // Código para listar
            break;
        case 'consultarID':
            // Código para consultar por ID
            break;
    }
}