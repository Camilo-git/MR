<?php
// creamos la funcion conectarBD
function conectarBD(){
    // declaramos las variables
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "registro_db";

    // realizamos la coneccion con try catch
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        echo 'No se pudo realizar la conexión a la base de datos';
  	    echo '<br>';
  	    echo 'Error: '.$e->getMessage();
  	    exit();
    }
}
function desconectarBD($conexion)
{
  $conexion = null;
}

?>