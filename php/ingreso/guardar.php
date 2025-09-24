<?php
// Endpoint para acciones de ingreso (marcar presencia o crear registro)
include_once("../../clases/cls_ingreso.php");

// Determinar acción: preferir POST->accion, luego GET->accion
$accion = $_POST['accion'] ?? $_GET['accion'] ?? null;
// id para acciones GET (editar, editar1, editar2)
$id = $_GET['id'] ?? null;

// detectar si la petición es AJAX (fetch/XmlHttpRequest)
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

// Si se solicita crear un nuevo registro via POST
if ($accion === 'crear' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj_ingreso = new ingreso();
    // Leer y sanitizar entradas básicas
    $invitado = trim($_POST['invitado'] ?? '');
    $cc_invitado = trim($_POST['cc_invitado'] ?? '');
    $invitado1 = trim($_POST['invitado1'] ?? null);
    $cc_invitado1 = trim($_POST['cc_invitado1'] ?? null);
    $invitado2 = trim($_POST['invitado2'] ?? null);
    $cc_invitado2 = trim($_POST['cc_invitado2'] ?? null);
    $novedad = trim($_POST['novedad'] ?? null);

    // Cargar datos en el objeto y crear
    $obj_ingreso->cargar(null, $invitado, $cc_invitado, $invitado1, $cc_invitado1, $invitado2, $cc_invitado2, $novedad, 'Aucente');
    $ok = $obj_ingreso->insertar();
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['ok' => (bool)$ok]);
        exit();
    }
    // Redirigir a índice con estado para peticiones normales
    header('Location: ../../index.php' . ($ok ? '?creado=1' : '?creado=0'));
    exit();
}


//creamos una funcion pata editar el est_inv1
function editar1($id)
{
    //incluimos la conexion a la base de datos
    include_once("../../clases/cls_conectarBD.php");
    //creamos la conexion a la base de datos
    $conexion = conectarBD();
    //creamos la consulta para cambiar el campo estado a "Presente"
    $sSQL = "UPDATE registro SET est_inv1='Presente' WHERE id=" . intval($id);
    //ejecutamos la consulta usando exec() de PDO
    $conexion->exec($sSQL);
    //cerramos la conexion
    desconectarBD($conexion);
    //redireccionamos a la pagina principal
    header("Location: ../../index.php");
}
//creamos una funcion pata editar el est_inv2
function editar2($id)
{
    //incluimos la conexion a la base de datos
    include_once("../../clases/cls_conectarBD.php");
    //creamos la conexion a la base de datos
    $conexion = conectarBD();
    //creamos la consulta para cambiar el campo estado a "Presente"
    $sSQL = "UPDATE registro SET est_inv2='Presente' WHERE id=" . intval($id);
    //ejecutamos la consulta usando exec() de PDO
    $conexion->exec($sSQL);
    //cerramos la conexion
    desconectarBD($conexion);
    //redireccionamos a la pagina principal
    header("Location: ../../index.php");
}
//creamos una funcion la cual vesifique si el est_inv1 y el est_inv2 estan en "Presente"
//si es asi cambia el campo estado a "Presente"
function editar($id)
{
    //incluimos la conexion a la base de datos
    include_once("../../clases/cls_conectarBD.php");
    //creamos la conexion a la base de datos
    $conexion = conectarBD();
    //creamos la consulta para traer los campos est_inv1 y est_inv2
    $sSQL = "SELECT est_inv1, est_inv2 FROM registro WHERE id=" . intval($id);
    //ejecutamos la consulta
    $stmt = $conexion->query($sSQL);
    //recorremos los datos
    foreach ($stmt as $fila) {
        //verificamos si est_inv1 y est_inv2 estan en "Presente"
        if ($fila['est_inv1'] == "Presente" && $fila['est_inv2'] == "Presente") {
            //si es asi cambiamos el campo estado a "Presente"
            $sSQL = "UPDATE registro SET estado='Presente' WHERE id=" . intval($id);
            //ejecutamos la consulta
            $conexion->exec($sSQL);
        }
    }
}

// Si la acción no fue crear, manejamos las ediciones por GET como antes
if ($accion == "editar") {
    //ejecutamos las dos funciones editar1 y editar2
    
    editar1($id);
    editar2($id);
    editar($id);

}elseif ($accion == "editar1") {
    
    //ejecutamos la funcion editar y editar1       
    editar1($id);
    editar($id);

}elseif ($accion == "editar2") {
    
    //ejecutamos la funcion editar y editar2    
    editar2($id);
    editar($id);

}
else {
    // Si no se reconoció la acción, redirigir a la página principal
    header("Location: ../../index.php");
}





?>