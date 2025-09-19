<?php
//Incluir el archivo de configuración
require '../config.php';

//Incluir el modelo 
require_once MODEL_PATH . '/modelo_tierras.php';

if (isset($_POST['id_parcela'])) {
    $id = $_POST['id_parcela'];
}

if (isset($_GET['id_parcela'])) {
    $id = $_GET['id_parcela'];
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'alta':
            $nombre = limpiar_dato($_POST['nombre']);
            $poligono = limpiar_dato($_POST['poligono']);
            $parcela = limpiar_dato($_POST['parcela']);
            $superficie = limpiar_dato($_POST['superficie']);
            $recinto = limpiar_dato($_POST['recinto']);
            $cultivo = limpiar_dato($_POST['cultivo']);
            insertar_parcela($nombre, $poligono, $parcela, $superficie, $recinto, $cultivo);
            header("Location: ../vista/listado_parcelas.php");
            break;
        case 'eliminar':
            eliminar_parcela($id);
            header("Location: ../vista/listado_parcelas.php"); 
            break;
        case 'actualizar':
            $nombre = limpiar_dato($_POST['nombre']);
            $poligono = limpiar_dato($_POST['poligono']);
            $parcela = limpiar_dato($_POST['parcela']);
            $recinto = limpiar_dato($_POST['recinto']);
            $superficie = limpiar_dato($_POST['superficie']);
            $cultivo = limpiar_dato($_POST['cultivo']);;

            
            actualizar_parcelas($nombre, $poligono, $parcela, $superficie, $recinto, $cultivo, $id);
            header("Location: ../vista/listado_parcelas.php"); 
            break;
    }
}
