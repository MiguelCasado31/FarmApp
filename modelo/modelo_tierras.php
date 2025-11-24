<?php

require_once __DIR__ . '/../config.php';

//GENERAL

function verificarCredenciales($usuario, $password)
{

    try {
        $pdo = conectarBD();
        $sql = "SELECT contra FROM usuarios WHERE usuario = :usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':usuario' => $usuario]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            if (password_verify($password, $resultado['contra'])) {
                return ['exito' => true];
            } else {
                return ['exito' => false, 'mensaje' => 'Contraseña incorrecta.'];
            }
        } else {
            return ['exito' => false, 'mensaje' => 'El usuario no existe.'];
        }
    } catch (PDOException $e) {
        return ['exito' => false, 'mensaje' => 'Error al verificar las credenciales: ' . $e->getMessage()];
    }
}

function registrarUsuario($usuario, $password, $nombreCompleto)
{
    try {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $pdo = conectarBD();

        $query = "INSERT INTO usuarios (usuario, contra, nombre_completo) VALUES (:usuario, :contra, :nombre_completo)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':contra', $hashPassword, PDO::PARAM_STR);
        $stmt->bindParam(':nombre_completo', $nombreCompleto, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $pdo->lastInsertId();
        } else {
            echo "Error al ejecutar la consulta: " . implode(" ", $stmt->errorInfo());
            return false;
        }
    } catch (PDOException $e) {
        echo "Error al registrar el usuario: " . $e->getMessage();
        return false;
    }
}

function obtener_usuario($usuario)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE usuario = :usuario limit 1");
    $stmt->execute([':usuario' => $usuario]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//ACTIVIDADES
//Función para obtener todas las actividades realizadas por parcela
function obtener_actividad_por_parcela($id)
{
    $pdo = conectarBD();
    $stmt = $pdo->query("SELECT trabajo, fecha, duracion FROM registroActividades WHERE id_campo = '$id'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function insertar_actividad($trabajo, $fecha, $tiempo, $id, $maquinaria, $comentario)
{
    $pdo = conectarBD();
    $sql = "INSERT INTO registroActividades (trabajo,  fecha, duracion, id_campo, maquinaria, comentarios, activo)
            VALUES (:trabajo,  :fecha, :tiempo, :id_campo, :maquinaria, :comentario, 1)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':trabajo' => $trabajo,
        ':fecha' => $fecha,
        ':tiempo' => $tiempo,
        ':id_campo' => $id,
        ':maquinaria' => $maquinaria,
        ':comentario' => $comentario
    ]);
    echo "Actividad insertada correctamente.";
}

//Función para actualizar las actividades
function actualizar_actividades($trabajo, $fecha, $duracion, $parcela, $maquinaria, $comentario, $id)
{
    $pdo = conectarBD();

    $sql = "UPDATE registroActividades 
            SET trabajo = :trabajo, 
                fecha = :fecha, 
                duracion = :duracion, 
                id_campo = :parcela, 
                id_maquinaria = :maquinaria, 
                comentarios = :comentario 
            WHERE id_actividad = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':trabajo' => $trabajo,
        ':fecha' => $fecha,
        ':duracion' => $duracion,
        ':parcela' => $parcela,
        ':maquinaria' => $maquinaria,
        ':comentario' => $comentario,
        ':id' => $id
    ]);
}
//función para obtener todas las actividades introducidas en la base de datos
function obtener_actividades()
{
    $pdo = conectarBD();
    $stmt = $pdo->query(
        "SELECT ra.id_actividad, ra.trabajo, ra.fecha, c.nombre, ra.duracion, m.Marca, m.Modelo, ra.comentarios 
        FROM registroActividades ra 
        JOIN campos c ON ra.id_campo = c.id_campo 
        JOIN maquinaria m ON ra.id_maquinaria = m.id_maquinaria"
    );
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//función para eliminar una actividad
function eliminar_actividad($id)
{
    $pdo = conectarBD();
    $stmt = $pdo->query("DELETE FROM registroactividades WHERE id_actividad = $id");
}

//PARCELAS
//Función para obtener las parcelas según su id
function obtener_actividad_por_id($id)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT ra.id_actividad, ra.trabajo, ra.fecha, c.nombre, ra.duracion, m.Marca, m.Modelo, ra.comentarios FROM registroActividades ra JOIN campos c ON ra.id_campo = c.id_campo JOIN maquinaria m ON m.id_maquinaria = ra.id_maquinaria WHERE id_actividad = :id ");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
//Función para insertar una nueva parcela en la base de datos
function insertar_parcela($nombre, $poligono, $parcela, $superficie, $recinto, $cultivo)
{
    $pdo = conectarBD();
    $sql = "INSERT INTO campos (nombre, poligono, parcela, recinto, superficie, cultivo, activo)
            VALUES (:nombre, :poligono, :parcela, :recinto, :superficie, :cultivo, 1)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':poligono' => $poligono,
        ':parcela' => $parcela,
        ':superficie' => $superficie,
        ':recinto' => $recinto,
        ':cultivo' => $cultivo
    ]);
}

//Función para actualizar las parcelas
function actualizar_parcelas($nombre, $poligono, $parcela, $superficie, $recinto, $cultivo, $id)
{
    $pdo = conectarBD();
    $sql = "UPDATE campos SET nombre = :nombre, poligono = :poligono, parcela = :parcela, superficie = :superficie, recinto = :recinto, cultivo = :cultivo, activo = 1 WHERE id_campo = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':poligono' => $poligono,
        ':parcela' => $parcela,
        ':superficie' => $superficie,
        ':recinto' => $recinto,
        ':cultivo' => $cultivo,
        ':id' => $id
    ]);
}

//Función para eliminar la parcela, si no que se desactiva
function eliminar_parcela($id)
{
    $pdo = conectarBD();
    $sql = "UPDATE campos SET activo = 0 where id_campo = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);
}
//Función para obtener el id de la parcela según su nombre
function obtener_id_parcela($nombre)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT id_campo FROM campos WHERE nombre = :nombre");
    $stmt->execute([':nombre' => $nombre]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['id_campo'] : false;
}
//Función para obtener el nombre de las parcelas
function obtener_parcelas()
{
    $pdo = conectarBD();
    $stmt = $pdo->query("SELECT nombre FROM campos WHERE activo = 1");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//Función para obtener las parcelas según su id
function obtener_parcelas_por_id($id)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT * FROM campos WHERE id_campo = :id AND activo = 1");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function obtener_ultimas_actividades_por_parcela($id_parcela, $limite = 2)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT trabajo, fecha, duracion FROM registroActividades WHERE id_campo = :id_parcela ORDER BY fecha DESC LIMIT :limite");
    $stmt->bindParam(':id_parcela', $id_parcela, PDO::PARAM_INT);
    $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function recoger_parcelas()
{
    $pdo = conectarBD();
    $stmt = $pdo->query('SELECT * FROM campos WHERE activo = 1');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function listar_parcelas()
{
    $parcelas = recoger_parcelas();
    require VIEW_PATH . '/listar_parcelas.php';
}

//MAQUINARIA
//Función para insertar una nueva maquinaria
function insertar_maquinaria($tipo_maquinaria, $marca, $modelo, $consumo){
    $pdo = conectarBD();
    $sql = "INSERT INTO maquinaria (Tipo_Maquinaria, Marca, Modelo, Consumo, activo)
            VALUES (:tipo_maquinaria, :marca, :modelo, :consumo, 1)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':tipo_maquinaria' => $tipo_maquinaria,
        ':marca' => $marca,
        ':modelo' => $modelo,
        ':consumo' => $consumo
    ]);
}

function obtener_tipo_maquinaria()
{
    $pdo = conectarBD();
    $stmt = $pdo->query("SELECT DISTINCT nombre from tipo_maquinaria");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtener_maquinaria()
{
    $pdo = conectarBD();
    $stmt = $pdo->query("SELECT m.*, t.nombre AS tipo_maquinaria_nombre FROM maquinaria m JOIN tipo_maquinaria t ON m.tipo_maquinaria = t.id_tipo_maquinaria");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//Función para obtener la maquinaria dependiendo del id
function obtener_maquinaria_por_id($id)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT * FROM maquinaria WHERE id_maquinaria = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//Función para actualizar la información de la maquinaria 
function actualizar_maquinaria($maquinaria, $marca, $modelo, $consumo, $id)
{
    $pdo = conectarBD();
    $sql = "UPDATE maquinaria set Maquinaria = :maquinaria, Marca = :marca, Modelo = :modelo, Consumo = :consumo where id_maquinaria = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':maquinaria' => $maquinaria,
        ':marca' => $marca,
        ':modelo' => $modelo,
        ':consumo' => $consumo,
        ':id' => $id
    ]);
}

function eliminar_maquinaria($id)
{
    $pdo = conectarBD();
    $stmt = $pdo->query("DELETE FROM maquinaria WHERE id_maquinaria = $id");
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function limpiar_dato($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
