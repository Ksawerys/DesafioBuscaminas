<?php 
require_once('Conexion.php');


class Controlador {

    static function mostrarPartidas($idPersona=null, $idPartida=null){
        $arrayPersonas = Conexion::mostrarPartidas($idPersona, $idPartida);
        $cod = 201;
        $mes = "TODO OK";
        header(Constantes::$headerMssg . $cod . ' ' . $mes);
        $respuesta = [
            'Cod:' => $cod,
            'Mensaje:' => $mes,
            'Personas' => $arrayPersonas
        ];
        echo json_encode($respuesta);
    }

    static function historicoPartidas($idPersona=null){
        $arrayPersonas = Conexion::historicoPartidas($idPersona);
        $cod = 201;
        $mes = "TODO OK";
        header(Constantes::$headerMssg . $cod . ' ' . $mes);
        $respuesta = [
            'Cod:' => $cod,
            'Mensaje:' => $mes,
            'Personas' => $arrayPersonas
        ];
        echo json_encode($respuesta);
    }

    static function partidasGanadas($idPersona=null){
        $arrayPersonas = Conexion::partidasGanadas($idPersona);
        $cod = 201;
        $mes = "TODO OK";
        header(Constantes::$headerMssg . $cod . ' ' . $mes);
        $respuesta = [
            'Cod:' => $cod,
            'Mensaje:' => $mes,
            'Personas' => $arrayPersonas
        ];
        echo json_encode($respuesta);
    }

    static function buscarUsuario($correo= null){
        $arrayPersonas = Conexion::buscarUsuario($correo);
        $cod = 201;
        $mes = "TODO OK";
        header(Constantes::$headerMssg . $cod . ' ' . $mes);
        $respuesta = [
            'Cod:' => $cod,
            'Mensaje:' => $mes,
            'Personas' => $arrayPersonas
        ];
        echo json_encode($respuesta);
    }


    static function registrarUsuario($contraseña, $nombre, $email, $administrador){
        $persona = Conexion::registrarUsuario($contraseña, $nombre, $email, $administrador);
            $cod = 201;
            $mes = "TODO OK";
            header(Constantes::$headerMssg . $cod . ' ' . $mes);
            $respuesta = [
                'Cod:' => $cod,
                'Mensaje:' => $mes,
                'Persona' => $persona
            ];
            echo json_encode($respuesta);
    }


    static function modificarUsuario($idPersona, $nuevaPersona){
        $persona = Conexion::modificarUsuario($idPersona, $nuevaPersona);
            $cod = 201;
            $mes = "TODO OK";
            header(Constantes::$headerMssg . $cod . ' ' . $mes);
            $respuesta = [
                'Cod:' => $cod,
                'Mensaje:' => $mes,
                'Persona' => $persona
            ];
            echo json_encode($respuesta);
    }


    static function borrarUsuario($idPersona){
        $persona = Conexion::borrarUsuario($idPersona);
            $cod = 201;
            $mes = "TODO OK";
            header(Constantes::$headerMssg . $cod . ' ' . $mes);
            $respuesta = [
                'Cod:' => $cod,
                'Mensaje:' => $mes,
                'Persona' => $persona
            ];
            echo json_encode($respuesta);
    }


    static function cambiarPartida($id, $idPersona, $tablaJugador, $finalizada){
        $persona = Conexion::cambiarPartida($id, $idPersona, $tablaJugador, $finalizada);
            $cod = 201;
            $mes = "TODO OK";
            header(Constantes::$headerMssg . $cod . ' ' . $mes);
            $respuesta = [
                'Cod:' => $cod,
                'Mensaje:' => $mes,
                'Persona' => $persona
            ];
            echo json_encode($respuesta);
    }

    

    static function insertarPartida($idPersona, $tablero,$tableroJugador){
        if (Conexion::insertarPartida($idPersona, $tablero,$tableroJugador)) {
            $inserccion = true;
            $cod = 201;
            $mes = "TODO OK";
            header(Constantes::$headerMssg . $cod . ' ' . $mes);
            $respuesta = [
                'Cod:' => $cod,
                'Mensaje:' => $mes,
                'Inserccion' => $inserccion
            ];
            echo json_encode($respuesta);
    }
        else {
            $inserccion = false;
            $cod = 201;
            $mes = "TODO OK";
            header(Constantes::$headerMssg . $cod . ' ' . $mes);
            $respuesta = [
                'Cod:' => $cod,
                'Mensaje:' => $mes,
                'Inserccion' => $inserccion
            ];
            echo json_encode($respuesta);
        }
    }
}