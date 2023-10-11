<?php
class Partida{
     public $id;
     public $idPersona;
     public $contrasena;
     public $tablaOculta;
     public $tablaJugador;
     public $finalizada;

     function __construct($id,$idPersona,$contrasena,$tablaOculta,$tablaJugador,$finalizada) {
         $this->id = $id;
         $this->idPersona = $idPersona;
         $this->contrasena = $contrasena;
         $this->tablaOculta = $tablaOculta;
         $this->tablaJugador = $tablaJugador;
         $this->finalizada = $finalizada;
     }
        function getId() {
            return $this->id;
        }
        function setId($id) {
            $this->id = $id;
        }
        function getIdPersona() {
            return $this->idPersona;
        }
        function setIdPersona($idPersona) {
            $this->idPersona = $idPersona;
        }
        function getContrasena() {
            return $this->contrasena;
        }
        function setContrasena($contrasena) {
            $this->contrasena = $contrasena;
        }
        function getTablaOculta() {
            return $this->tablaOculta;
        }
        function setTablaOculta($tablaOculta) {
            $this->tablaOculta = $tablaOculta;
        }
        function getTablaJugador() {
            return $this->tablaJugador;
        }
        function setTablaJugador($tablaJugador) {
            $this->tablaJugador = $tablaJugador;
        }
        function getFinalizada() {
            return $this->finalizada;
        }
        function setFinalizada($finalizada) {
            $this->finalizada = $finalizada;
        }
        function __toString() {
            return "ID: " . $this->id . ", ID Persona: " . $this->idPersona . ", tabla Oculta: " . $this->tablaOculta . ", tabla Jugador: " . $this->tablaJugador . ", Finalizada: " . $this->finalizada ."<br>";
        }
}