<?php 
class Controlador {

    static function mostrarPartidas($idPersona, $idPartida){
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

    static function buscarUsuario($id){
        $arrayPersonas = Conexion::buscarUsuario($id);
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

    static function insertarPartida($id, $idPersona, $contrasena, $tablaOculta, $tablaJugador, $finalizada){
        if (Conexion::insertarPartida($id, $idPersona, $contrasena, $tablaOculta, $tablaJugador, $finalizada)) {
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