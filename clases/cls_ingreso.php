<?php
// incluimos la base de datos
include_once("cls_conectarBD.php");


/**
 * Clase ingreso
 * Representa un registro de ingreso con hasta 3 invitados y su información asociada.
 */
class ingreso
{
    // Propiedades públicas que representan los campos de la tabla 'registro'
    public $id;            // int: Identificador único del registro
    public $invitado;      // string: Nombre del invitado principal
    public $cc_invitado;   // string: Cédula del invitado principal
    public $invitado1;     // string: Nombre del segundo invitado (opcional)
    public $cc_invitado1;  // string: Cédula del segundo invitado (opcional)
    public $invitado2;     // string: Nombre del tercer invitado (opcional)
    public $cc_invitado2;  // string: Cédula del tercer invitado (opcional)
    public $novedad;       // string: Observaciones o novedades
    public $estado;        // string: Estado del registro

    /**
     * Constructor para inicializar los campos del registro.
     * Todos los parámetros son opcionales.
     */
    public function __construct($id = null, $invitado = null, $cc_invitado = null, $invitado1 = null, $cc_invitado1 = null, $invitado2 = null, $cc_invitado2 = null, $novedad = null, $estado = null)
    {
        $this->id = $id;
        $this->invitado = $invitado;
        $this->cc_invitado = $cc_invitado;
        $this->invitado1 = $invitado1;
        $this->cc_invitado1 = $cc_invitado1;
        $this->invitado2 = $invitado2;
        $this->cc_invitado2 = $cc_invitado2;
        $this->novedad = $novedad;
        $this->estado = $estado;
    }

    /**
     * Método para cargar los datos de la clase (opcional, por compatibilidad).
     * Permite reasignar todos los campos del objeto.
     */
    public function cargar($id, $invitado, $cc_invitado, $invitado1, $cc_invitado1, $invitado2, $cc_invitado2, $novedad, $estado)
    {
        $this->__construct($id, $invitado, $cc_invitado, $invitado1, $cc_invitado1, $invitado2, $cc_invitado2, $novedad, $estado);
    }

 //METODOS CRU CREATE,READ,UPDATE,DELETE
   /*--------------------------------------------------------------------------
	 Function insertar()
	 Objetivo: Permite el ingreso de registros nuevos a la tabla de Contactos
	 Retorno: valor booleano 
	 1: true -> La operaciòn se ejecutò con èxito
	 2: false -> La operaciòn no se pudo ejecutar
	 --------------------------------------------------------------------------*/
    /**
     * Inserta el registro actual en la base de datos.
     * @return bool true si la operación fue exitosa, false en caso contrario.
     */
    public function insertar()
    {
        $resultado = false;
        $conexion = conectarBD();
        // Insertar explícitamente columnas: id es AUTO_INCREMENT
        $sSQL = "INSERT INTO registro (invitado, cc_invitado, invitado1, cc_invitado1, invitado2, cc_invitado2, novedad, estado, est_inv1, est_inv2) VALUES (?,?,?,?,?,?,?,?,?,?)";
        try {
            $stmt = $conexion->prepare($sSQL);
            if (!$stmt) {
                throw new Exception("Error en prepare: " . implode(" - ", $conexion->errorInfo()));
            }
            // Valores por defecto: estado y estado de invitados inician como 'Aucente'
            $estado = $this->estado ?? 'Aucente';
            $est_inv1 = 'Aucente';
            $est_inv2 = 'Aucente';
            $params = [
                $this->invitado,
                $this->cc_invitado,
                $this->invitado1,
                $this->cc_invitado1,
                $this->invitado2,
                $this->cc_invitado2,
                $this->novedad,
                $estado,
                $est_inv1,
                $est_inv2
            ];
            $resultado = $stmt->execute($params);
        } catch (Exception $e) {
            error_log("Error al insertar (PDO): " . $e->getMessage());
            $resultado = false;
        }
        return $resultado;
    }

     /*--------------------------------------------------------------------------
	 Function modificar()
	 Objetivo: Permite editar los registros de un contacto
	 Retorno: valor booleano 
	 1: true -> La operaciòn se ejecutò con èxito
	 2: false -> La operaciòn no se pudo ejecutar
	 --------------------------------------------------------------------------*/
    /**
     * Modifica el registro actual en la base de datos según su id.
     * @return bool true si la operación fue exitosa, false en caso contrario.
     */
    public function modificar()
    {
        $resultado = false;
        $conexion = conectarBD();
        $sSQL = "UPDATE registro SET
            invitado = ?,
            cc_invitado = ?,
            invitado1 = ?,
            cc_invitado1 = ?,
            invitado2 = ?,
            cc_invitado2 = ?,
            novedad = ?,
            estado = ?
            WHERE id = ?";
        try {
            $stmt = $conexion->prepare($sSQL);
            if (!$stmt) {
                throw new Exception("Error en prepare: " . implode(" - ", $conexion->errorInfo()));
            }
            $params = [
                $this->invitado,
                $this->cc_invitado,
                $this->invitado1,
                $this->cc_invitado1,
                $this->invitado2,
                $this->cc_invitado2,
                $this->novedad,
                $this->estado,
                $this->id
            ];
            $resultado = $stmt->execute($params);
        } catch (Exception $e) {
            error_log("Error al modificar (PDO): " . $e->getMessage());
            $resultado = false;
        }
        return $resultado;
    }




}


?>