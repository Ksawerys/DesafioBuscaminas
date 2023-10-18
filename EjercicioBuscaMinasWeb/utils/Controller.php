<?php

namespace Controller;
use Constantes\Constantes;

require_once (__DIR__."/../conexionBD/ConexionBDBD.php");
require_once (__DIR__."/../Error/Error.php");
require_once (__DIR__."/../model/Partida.php"); 
require_once (__DIR__."/../model/Mail.php"); 
require_once (__DIR__."/../model/FactoriaBuscaminas.php"); 




use ConexionBDBD\ConexionBDBD;
use Error\Error;
use Partida\Partida;
use User\User;  
use Mail\Mail;
use FactoriaBuscaminas\FactoriaBuscaminas;

 


class Controller{

  static function mostrarPartidas($idPersona=null, $idPartida=null){
    $arrayPersonas = ConexionBD::mostrarPartidas($idPersona, $idPartida);
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
    $arrayPersonas = ConexionBD::historicoPartidas($idPersona);
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
    $arrayPersonas = ConexionBD::partidasGanadas($idPersona);
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
    $arrayPersonas = ConexionBD::buscarUsuario($correo);
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


static function validarUsurios($correo, $contrasena){
    $arrayPersonas = ConexionBD::validarUsuario($correo, $contrasena);
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

static function validarAdmin($correo, $contrasena){
    $administrador = ConexionBD::validarAdmin($correo, $contrasena);
    if($administrador){
    $cod = 201;
    $mes = "TODO OK";
    header(Constantes::$headerMssg . $cod . ' ' . $mes);
    $respuesta = [
        'Cod:' => $cod,
        'Mensaje:' => $mes,
        'Personas' => $administrador
    ];
    echo json_encode($respuesta);
}
else {
    $cod = 404; 
    $mes = "Usuario no encontrado";
    header(Constantes::$headerMssg . $cod . ' ' . $mes);
    $respuesta = [
        'Cod:' => $cod,
        'Mensaje:' => $mes
    ];
    echo json_encode($respuesta);
}
}

static function registrarUsuario($contraseña, $nombre, $email, $administrador){
    $persona = ConexionBD::registrarUsuario($contraseña, $nombre, $email, $administrador);
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
    $persona = ConexionBD::modificarUsuario($idPersona, $nuevaPersona);
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
    $persona = ConexionBD::borrarUsuario($idPersona);
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
    $persona = ConexionBD::cambiarPartida($id, $idPersona, $tablaJugador, $finalizada);
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
    if (ConexionBD::insertarPartida($idPersona, $tablero,$tableroJugador)) {
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


  

