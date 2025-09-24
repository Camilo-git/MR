<?php
/**
 * Establece una conexión PDO a la base de datos MySQL.
 * @return PDO Objeto de conexión listo para usar.
 * @throws PDOException Si ocurre un error de conexión.
 */
function conectarBD() {
    // Parámetros de conexión
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    /**
     * Nombre de la base de datos utilizada en la aplicación.
     * Cambia este valor si tu base de datos tiene otro nombre.
     * @var string
     */
    $bd = "registro_db";

    try {
        // Crear nueva conexión PDO
        $conexion = new PDO(
            "mysql:host=$servidor;dbname=$bd;charset=utf8mb4",
            $usuario,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return $conexion;
    } catch (PDOException $e) {
        // Registrar el error y lanzar excepción para manejo superior
        error_log('Error de conexión BD: ' . $e->getMessage());
        throw new Exception('No se pudo conectar a la base de datos.');
    }
}

/**
 * Cierra la conexión PDO (opcional, por compatibilidad).
 * @param PDO|null $conexion
 */
function desconectarBD(&$conexion)
{
    $conexion = null;
}

?>