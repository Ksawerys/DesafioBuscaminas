<?php
require_once('Constantes.php');
require_once('Usuario.php');
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
    private static function desconectar($conexion){
        mysqli_close($conexion);        
      }

    public static function mostrarPartidas($idPersona= null, $idPartida= null) {
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

public static function modificarPartida($partida) {
    $conexion = self::conectar();
    
        if ($conexion) {
            $sql = mysqli_prepare($conexion, "UPDATE partidas SET  tablaJugador = ?  finalizada=? WHERE id = ? and idPersona=?");
            mysqli_stmt_bind_param($sql, "ssi", $partida['tablaJugador'], $partida['tablaJugador'], $partida['tablaJugador']);
    
            try {
                mysqli_stmt_execute($sql);
            } catch (Exception $e) {
                $e->getMessage();
            }
    
            self::desconectar($conexion);
        }
    }

    public static function insertarPartida( $idPersona,$tablero,$tableroJugador) {
        $conexion = self::conectar(); 

        if ($conexion) {
            $sql = mysqli_prepare($conexion, "INSERT INTO partidas VALUES (10,?,?,?,0)");
                mysqli_stmt_bind_param($sql, "iss", $idPersona, $tablero, $tableroJugador);

                try {
                    mysqli_stmt_execute($sql);
                } catch (Exception $e) {
                     $e->getMessage();
                }

            self::desconectar($conexion); 
        }
        }
        

        public static function historicoPartidas($idPersona = null) {
            $conexion = self::conectar(); 
        
            if (!$conexion) {
                return "Error de conexión";
            }
        
            if ($idPersona === null) {
                $sql = "SELECT idPersona, finalizada FROM partidas";
                $stmt = mysqli_prepare($conexion, $sql);
            } else {
                $sql = "SELECT idPersona, finalizada FROM partidas WHERE idPersona = ?";
                $stmt = mysqli_prepare($conexion, $sql);
                mysqli_stmt_bind_param($stmt, "i", $idPersona);
            }
        
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        
            if (!$result) {
                return "Error en la consulta";
            }
        
            $historicoPartidas = array();
        
            while ($row = mysqli_fetch_assoc($result)) {
                $idPersona = $row['idPersona'];
                $finalizada = $row['finalizada'];
        
                if (!isset($historicoPartidas[$idPersona])) {
                    $historicoPartidas[$idPersona] = array();
                }
        
                $historicoPartidas[$idPersona][] = $finalizada;
            }
        
            self::desconectar($conexion);
        
            return $historicoPartidas;
        }
        

    public static function partidasGanadas($idPersona= null){
        $conexion = self::conectar(); 
        if (!$conexion) {
            $resultado= "Error de conexión a la base de datos.";
        }
        $partidasGanadas = array();
        if($idPersona==null){
            $sql = "SELECT partidaGanada FROM personas ORDER BY partidaGanada DESC";
            $stmt = mysqli_prepare(self::$conexion,$sql);
            mysqli_stmt_execute($stmt); 
            $resultado = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($resultado)) {
                $partidasGanadas[] = $row['partidaGanada'];
            }
            
        }else{
            
            $sql = "SELECT partidaGanada FROM personas WHERE id = ?";
            $stmt = mysqli_prepare($conexion, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $idPersona); // Enlazar el valor de idPersona
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
    
                while ($row = mysqli_fetch_assoc($result)) {
                    $partidasGanadas[] = $row['partidaGanada'];
                }
        }
    }
        self::desconectar($conexion); 
        return $partidasGanadas;
    }


    public static function cambiarPartida($id, $idPersona, $tablaJugador, $finalizada) {
        $conexion = self::conectar();
    
        if ($conexion) {
            $sql = mysqli_prepare($conexion, "UPDATE partidas SET tablaJugador = ? , finalizada = ? WHERE id = ? and idPersona ?");
            mysqli_stmt_bind_param($sql,"ssii", $tablaJugador, $finalizada, $id, $idPersona);
    
            try {
                mysqli_stmt_execute($sql);
            } catch (Exception $e) {
                $e->getMessage();
            }
    
            self::desconectar($conexion);
        }
        }

        

    public static function buscarUsuario($correo= null) {
        $conexion = self::conectar(); 
        if (!$conexion) {
            $resultado= "Error de conexión a la base de datos.";
        }
        $usuarios = array();
        if($correo==null){
            $sql = "SELECT * FROM personas ";
            $stmt = mysqli_prepare(self::$conexion,$sql);
            mysqli_stmt_execute($stmt); 
            $resultado = mysqli_stmt_get_result($stmt);
            while($fila = mysqli_fetch_array($resultado)){
                $user = new Usuario($fila["id"],$fila["nombre"],$fila["email"],$fila["contraseña"],$fila["administrador"],$fila["partidaJugada"],$fila["partidaGanada"]); 
                $usuarios[] = $user;  
            }
        }else{
            
            $sql = "SELECT * FROM personas WHERE email = ?";
            $stmt = mysqli_prepare(self::$conexion,$sql);
            mysqli_stmt_bind_param($stmt,"s",$correo);  
            mysqli_stmt_execute($stmt); 
            $resultado = mysqli_stmt_get_result($stmt);
            while($fila = mysqli_fetch_array($resultado)){
                $user = new Usuario($fila["id"],$fila["nombre"],$fila["email"],$fila["contraseña"],$fila["administrador"],$fila["partidaJugada"],$fila["partidaGanada"]); 
              }
              $usuarios[] = $user;
        }
        self::desconectar($conexion); 
        return $usuarios;
    }
    public static function registrarUsuario($contraseña, $nombre, $email, $administrador) { 
        $conexion = self::conectar(); 

        if ($conexion) {
            $sql = mysqli_prepare($conexion, "INSERT INTO personas (contraseña, nombre, email, partidaJugada, partidaGanada, administrador) VALUES (?, ?, ?, 0, 0, ?)");
                mysqli_stmt_bind_param($sql, "sssi", $contraseña, $nombre, $email, $administrador);

                try {
                    mysqli_stmt_execute($sql);
                } catch (Exception $e) {
                     $e->getMessage();
                }

            self::desconectar($conexion); 
        }

    }

    public static function modificarUsuario($idPersona, $nuevaPersona) {
        $conexion = self::conectar();
    
        if ($conexion) {
            $sql = mysqli_prepare($conexion, "UPDATE personas SET  contraseña = ?, nombre = ?, email = ?,administrador=?, partidaJugada = ?, partidaGanada = ? WHERE id = ?");
            mysqli_stmt_bind_param($sql, "ssssiis", $nuevaPersona["contraseña"], $nuevaPersona["nombre"], $nuevaPersona["email"],$nuevaPersona["administador"], $nuevaPersona["partidaJugada"], $nuevaPersona["partidaGanada"], $idPersona);
    
            try {
                mysqli_stmt_execute($sql);
            } catch (Exception $e) {
                $e->getMessage();
            }
    
            self::desconectar($conexion);
        }
    }
    

    public static function borrarUsuario($idPersona) {
        $conexion = self::conectar();
    
        if ($conexion) {
            $sql = mysqli_prepare($conexion, "DELETE FROM personas WHERE id = ?");
            mysqli_stmt_bind_param($sql, "i", $idPersona);
    
            try {
                mysqli_stmt_execute($sql);
            } catch (Exception $e) {
                $e->getMessage();
            }
    
            self::desconectar($conexion);
        }
    }

    public static function borrarTodosLosUsuarios() {
        $conexion = self::conectar();
    
        if ($conexion) {
            $sql = mysqli_prepare($conexion, "DELETE FROM personas");
            
            try {
                mysqli_stmt_execute($sql);
            } catch (Exception $e) {
                $e->getMessage();
            }
    
            self::desconectar($conexion);
        }
    }


    public static function pedirContrasena($idPersona) {
        self::conectar();
        if (!self::$conexion) {
        } else {
        $resultados=null;

        
    }
    return $resultados;
    }
    

}


/*hay que retornar siempre un codigo que diga si esta todo correcto o no*/