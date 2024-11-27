<?php
//creamos un script para visualizar los datos que llegan por el metodo post
 
// vemos todo lo que nos envian por el metodo post
echo    "<pre>";
print_r($_POST);
print_r($_GET);
echo "</pre>";


// incluimos la clase cls_equipos para crear la clase
include_once("../../clases/cls_ingreso.php");
//creamos un objeto de la clase cls_ingreso
$obj_ingreso = new ingreso();
//creamos las variables con los datos que llegan por el metodo get
$accion = $_GET['accion'];
$id = $_GET['id'];
$invitado = null;
$cc_invitado = null;
$invitado1 = null;
$cc_invitado1 = null;
$invitado2 = null;
$cc_invitado2 = null;
$novedad = null;
$estado = null;

//llamamos a la funcion cargar de la clase 
$obj_ingreso->cargar($id, $invitado, $cc_invitado, $invitado1, $cc_invitado1, $invitado2, $cc_invitado2, $novedad, $estado);


//creamos una funcion pata editar el est_inv1
function editar1($id)
{
    //incluimos la conexion a la base de datos
    include_once("../../clases/cls_conectarBD.php");
    //creamos la conexion a la base de datos
    $conexion = conectarBD();
    //creamos la consulta para cambiar el campo estado a "Presente"
    $sSQL = "UPDATE registro SET est_inv1='Presente' WHERE id=" . $id;
    //ejecutamos la consulta
    $conexion->query($sSQL);
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
    $sSQL = "UPDATE registro SET est_inv2='Presente' WHERE id=" . $id;
    //ejecutamos la consulta
    $conexion->query($sSQL);
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
    $sSQL = "SELECT est_inv1, est_inv2 FROM registro WHERE id=" . $id;
    //ejecutamos la consulta
    $datos = $conexion->query($sSQL);
    //recorremos los datos
    foreach ($datos as $fila) {
        //verificamos si est_inv1 y est_inv2 estan en "Presente"
        if ($fila['est_inv1'] == "Presente" && $fila['est_inv2'] == "Presente") {
            //si es asi cambiamos el campo estado a "Presente"
            $sSQL = "UPDATE registro SET estado='Presente' WHERE id=" . $id;
            //ejecutamos la consulta
            $conexion->query($sSQL);
        }
    }
}

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
    //redireccionamos a la pagina principal
    header("Location: ../../index.php");
}





?>