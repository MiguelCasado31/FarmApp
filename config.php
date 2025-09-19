<?php

//Definir rutas a los directorios MVC
define('CONTROLLER_PATH', __DIR__ . '/controlador/');
define('MODEL_PATH', __DIR__ . '/modelo/');
define('VIEW_PATH', __DIR__ . '/vista/');

//Incluir archivo de conexión a la base de datos
require_once __DIR__. '/conexion.php';

?>
