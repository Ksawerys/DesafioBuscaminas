<?php
 class Conexion {

    static $conexion;

    private static function conectar()
    {
        if (!self::$conexion) {
            self::$conexion = mysqli_connect(Constantes::$servername, Constantes::$username, Constantes::$password, Constantes::$database);
            if (!self::$conexion) {
            }
        }
        return self::$conexion;
    }

    public static function mostrarPartidas($idPersona, $idPartida) {
        $resultados = null;
        self::conectar();
        if (!self::$conexion) {
        } else {
        if($idPersona == null && $idPartida == null){
            $consulta = "SELECT * FROM partidas ";
            $stmt =self::$conexion->prepare($consulta);
            $stmt->execute();
            $resultados = $stmt->get_result();

            if ($resultados->num_rows == 0) {
                $resultados->free();
            } 

        }elseif($idPartida == null){
        $consulta = "SELECT * FROM partidas WHERE idPersona = $idPersona";
        $stmt = self::$conexion->prepare($consulta);
        $stmt->execute();
        $resultados = $stmt->get_result();

        if ($resultados->num_rows == 0) {
            $resultados->free();
        }
    }else{
        $consulta = "SELECT * FROM partidas WHERE idPersona = $idPersona and idPartida = $idPartida";
        $stmt = self::$conexion->prepare($consulta);
        $stmt->execute();
        $resultados = $stmt->get_result();  
    }
    }
    return $resultados;
}


    public static function insertarPartida($id, $idPersona, $contrasena, $tablaOculta, $tablaJugador, $finalizada) {
        self::conectar();
        if (!self::$conexion) {
        } else {
        $sql = "INSERT INTO partidas (id, idPersona, contrasena, tablaOculta, tablaJugador, finalizada) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = self::$conexion->prepare($sql);
        $stmt = self::$conexion->prepare($sql);
        if ($stmt === false) {
            echo "Error al preparar la consulta: " . self::$conexion->error;
            return;
        }

            $delimitador = ", "; 
            $tablaOcultaString = explode($delimitador, $tablaOculta);
            $stmt->bind_param($id, $idPersona, $contrasena, $tablaOcultaString, $tablaJugador, $finalizada);
    
        if ($stmt->execute()) {
            echo "Partida actualizada con éxito.";
        } else {
            echo "Error al actualizar la partida: " . $stmt->error;
        }
        $stmt->close();
    }
    }
    

    public static function cambiarPartida($id, $idPersona, $tablaJugador, $finalizada) {
        self::conectar();
        if (!self::$conexion) {
        } else {
        $sql = "UPDATE partidas SET tablaJugador = ? , finalizada = ? WHERE id = ? and idPersona ?";
        $stmt = self::$conexion->prepare($sql);
        if ($stmt === false) {
            echo "Error al preparar la consulta: " . self::$conexion->error;
            return;
        }
            $delimitador = ", "; 
            $tablaJugadorString = explode($delimitador, $tablaJugador);
            $stmt->bind_param("ssii", $tablaJugadorString, $finalizada, $id, $idPersona);
    
        if ($stmt->execute()) {
            echo "Partida actualizada con éxito.";
        } else {
            echo "Error al actualizar la partida: " . $stmt->error;
        }
        $stmt->close();
    }
    }

    public static function buscarUsuario($id) {
        $mensaje = "";
        self::conectar();
        if (!self::$conexion) {
            echo "Error de conexión a la base de datos.";
            return; 
        }
        
        $sql = "SELECT * FROM partidas WHERE idPersona = ?";
        $stmt = self::$conexion->prepare($sql);
        
        if ($stmt === false) {
            echo "Error al preparar la consulta: " . self::$conexion->error;
            return;
        }
        
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            
            if ($resultado->num_rows < 1) {
                $resultado->free();      
            } else {
                $mensaje = "Persona no encontrada.";
                }
            
            $resultado->close();
        } else {
            $mensaje = "error";
        }
        
        $stmt->close();
        return $resultado;
    }
    
}


/*hay que retornar siempre un codigo que diga si esta todo correcto o no*/