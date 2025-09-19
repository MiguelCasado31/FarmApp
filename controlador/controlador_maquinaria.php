<?php
//Incluir el archivo de configuración
require '../config.php';

//Incluir el modelo 
require_once MODEL_PATH . '/modelo_tierras.php';

if (isset($_POST['id_maquinaria'])) {
    $id = $_POST['id_maquinaria'];
}

if (isset($_GET['id_maquinaria'])) {
    $id = $_GET['id_maquinaria'];
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'alta':
            $vehiculo = limpiar_dato($_POST['vehiculo']);
            $marca = limpiar_dato($_POST['marca']);
            $modelo = limpiar_dato($_POST['modelo']);
            $consumo = limpiar_dato($_POST['consumo']);
            
            insertar_maquinaria($vehiculo, $marca, $modelo, $consumo);
            header("Location: ../vista/listado_maquinaria.php");
            break;
        case 'eliminar':
            eliminar_maquinaria($id);
            header("Location: ../vista/listado_maquinaria.php");
            break;
        case 'actualizar':
            $vehiculo = limpiar_dato($_POST['vehiculo']);
            $marca = limpiar_dato($_POST['marca']);
            $modelo = limpiar_dato($_POST['modelo']);
            $consumo = limpiar_dato($_POST['consumo']);

            actualizar_maquinaria($vehiculo, $marca, $modelo, $consumo, $id);
            header("Location: ../vista/listado_maquinaria.php");
            break;
        case 'listar':
            // Código para listar
            break;
        case 'consultarID':
            // Código para consultar por ID
            break;
    }
}
