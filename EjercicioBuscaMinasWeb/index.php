<?php

use Controller\Controller;

require_once('Usuario.php');
require_once('Controlador.php');
require_once('FactoriaBuscaminas.php');

header("Content-Type:application/json");
echo json_encode("afjanñsof");

$nuevoContraseña = 'contraseña_del_nuevo_usuario';
$nuevoNombre = 'nombre_del_nuevo_usuario';
$nuevoEmail = 'correo_del_nuevo_usuario';
$nuevaPartidaJugada = 0; // Puedes establecer estos valores según tus necesidades
$nuevaPartidaGanada = 0;

// Crear una instancia de la clase Usuario para el nuevo usuario
$nuevoUsuario = new Usuario(null, $nuevoContraseña, $nuevoNombre, $nuevoEmail, $nuevaPartidaJugada, $nuevaPartidaGanada,0);


$partida=FactoriaBuscaminas::crearBuscaminas();
$partidaArray = get_object_vars($partida);
$tablero = implode(",", $partidaArray['tablero']);
$tableroJugador= implode(",", $partidaArray['tablero']);

$Usuario=Controlador::insertarPartida(9, $tablero,$tableroJugador);
echo json_encode($partidaArray);
echo json_encode($tablero);
echo json_encode($tableroJugador);


