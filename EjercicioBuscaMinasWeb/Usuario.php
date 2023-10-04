<?php
class Usuario{
public  $id;
public  $contraseña;
public  $nombre;
public  $email;
public  $partidaJugada;
public  $partidaGanada;

function __construct($id,$contraseña,$nombre,$email,$partidaJugada,$partidaGanada) {
    $this->id = $id;
    $this->contraseña = $contraseña;
    $this->nombre = $nombre;
    $this->email = $email;
    $this->partidaJugada = $partidaJugada;
    $this->partidaGanada = $partidaGanada;
}
function getId() {
    return $this->id;   
}
function setId($id) {
    $this->id = $id;
}
function getContraseña() {
    return $this->contraseña;
}
function setContraseña($contraseña) {
    $this->contraseña = $contraseña;
}
function getNombre() {
    return $this->nombre;
}
function setNombre($nombre) {
    $this->nombre = $nombre;
}
function getEmail() {
    return $this->email;
}
function setEmail($email) {
    $this->email = $email;
}
function getPartidaJugada() {
    return $this->partidaJugada;
}
function setPartidaJugada($partidaJugada) {
    $this->partidaJugada = $partidaJugada;
}
function getPartidaGanada() {
    return $this->partidaGanada;
}
function setPartidaGanada($partidaGanada) {
    $this->partidaGanada = $partidaGanada;
}
function __toString() {
    return "ID: " . $this->id . ", Contraseña: " . $this->contraseña . ", Nombre: " . $this->nombre . ", Email: " . $this->email . ", Partidas Jugadas: " . $this->partidaJugada . ", Partidas Ganadas: " . $this->partidaGanada ."<br>";
}

}
