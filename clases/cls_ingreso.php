<?php
// incluimos la base de datos
include_once("cls_conectarBD.php");

class ingreso
{
    //se define la variable para manejar todos los campos de la clase
    public $id;    
    public $invitado;
    public $cc_invitado;
    public $invitado1;
    public $cc_invitado1;
    public $invitado2;
    public $cc_invitado2;
    public $novedad;
    public $estado;

  

    //metodo para cargar los datos de la clase
    public function cargar($id, $invitado, $cc_invitado, $invitado1, $cc_invitado1, $invitado2, $cc_invitado2, $novedad, $estado)
    
    {
        $this->id=$id;      
        $this->invitado=$invitado;
        $this->cc_invitado=$cc_invitado;
        $this->invitado1=$invitado1;
        $this->cc_invitado1=$cc_invitado1;
        $this->invitado2=$invitado2;
        $this->cc_invitado2=$cc_invitado2;
        $this->novedad=$novedad;
        $this->estado=$estado;

    }

    //definimos los metodos set y get para cada campo de la clase
        public function setid($id)
        {
            $this->id=$id;
        }
        
        public function setinvitado($invitado)
        {
            $this->invitado=$invitado;
        }

        public function setcc_invitado($cc_invitado)
        {
            $this->cc_invitado=$cc_invitado;
        }

        public function setinvitado1($invitado1)
        {
            $this->invitado1=$invitado1;
        }

        public function setcc_invitado1($cc_invitado1)
        {
            $this->cc_invitado1=$cc_invitado1;
        }

        public function setinvitado2($invitado2)
        {
            $this->invitado2=$invitado2;
        }

        public function setcc_invitado2($cc_invitado2)
        {
            $this->cc_invitado2=$cc_invitado2;
        }

        public function setnovedad($novedad)
        {
            $this->novedad=$novedad;
        }

        public function setestado($estado)
        {
            $this->estado=$estado;
        }

        public function getid()
        {
            return $this->id;
        }

        public function getinvitado()
        {
            return $this->invitado;
        }

        public function getcc_invitado()
        {
            return $this->cc_invitado;
        }

        public function getinvitado1()
        {
            return $this->invitado1;
        }

        public function getcc_invitado1()
        {
            return $this->cc_invitado1;
        }   

        public function getinvitado2()
        {
            return $this->invitado2;
        }   

        public function getcc_invitado2()
        {
            return $this->cc_invitado2;
        }

        public function getnovedad()
        {
            return $this->novedad;
        }

        public function getestado()
        {
            return $this->estado;
        }

 //METODOS CRU CREATE,READ,UPDATE,DELETE
   /*--------------------------------------------------------------------------
	 Function insertar()
	 Objetivo: Permite el ingreso de registros nuevos a la tabla de Contactos
	 Retorno: valor booleano 
	 1: true -> La operaciòn se ejecutò con èxito
	 2: false -> La operaciòn no se pudo ejecutar
	 --------------------------------------------------------------------------*/
     public function insertar()
        {
            //vatiable de trabajo
            $resultado=false;
            $filas = 0;
            //creamos la conexion a la base de datos
            $conexion = conectarBD();
            //creamos la variable que contiene la sentencia sql
            $sSQL = "INSERT INTO registro VALUES (?,?,?,?,?,?,?,?,?)";
            //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
            try {
                $pst = $conexion->prepare($sSQL);
                $pst->bind_param(1, $this->id);
                $pst->bind_param(2, $this->invitado);
                $pst->bind_param(3, $this->cc_invitado);
                $pst->bind_param(4, $this->invitado1);
                $pst->bind_param(5, $this->cc_invitado1);
                $pst->bind_param(6, $this->invitado2);
                $pst->bind_param(7, $this->cc_invitado2);
                $pst->bind_param(8, $this->novedad);
                $pst->bind_param(9, $this->estado);
                $filas = $pst->execute();
                if ($filas > 0) {
                    $resultado = true;
                } else {
                    $resultado = false;
                }
            } catch (Exception $e) {
                echo "No se pudo realizar la conexión a la Base de Datos";
                echo "<br>";
                echo "Error:" . $e->getMessage();
                $resultado = false;            

            }
            return $resultado;
        }//fin del metodo insertar

     /*--------------------------------------------------------------------------
	 Function modificar()
	 Objetivo: Permite editar los registros de un contacto
	 Retorno: valor booleano 
	 1: true -> La operaciòn se ejecutò con èxito
	 2: false -> La operaciòn no se pudo ejecutar
	 --------------------------------------------------------------------------*/
     public function modificar()
     {
        //variable de trabajo
        $resultado=false;
        $filas=0;
        //creamos la conexion a la base de datos
        $conexion = conectarBD();
        //creamos la variable que contiene la sentencia sql
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
        //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
        try {
            $pst = $conexion->prepare($sSQL);
            $pst->bind_param(1, $this->invitado);
            $pst->bind_param(2, $this->cc_invitado);
            $pst->bind_param(3, $this->invitado1);
            $pst->bind_param(4, $this->cc_invitado1);
            $pst->bind_param(5, $this->invitado2);
            $pst->bind_param(6, $this->cc_invitado2);
            $pst->bind_param(7, $this->novedad);
            $pst->bind_param(8, $this->estado);
            $pst->bind_param(9, $this->id);
            $filas = $pst->execute();
            if ($filas > 0) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        } catch (Exception $e) {
            echo "No se pudo realizar la conexión a la Base de Datos";
            echo "<br>";
            echo "Error:" . $e->getMessage();
            $resultado = false;            

        }//fin del metodo modificar
    }




}


?>