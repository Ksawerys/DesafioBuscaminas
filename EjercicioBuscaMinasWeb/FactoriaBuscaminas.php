<?php
require_once('Buscaminas.php');

class FactoriaBuscaminas {
    public static function crearBuscaminas($casillas,$minas) {
        $buscaminas = new Buscaminas($casillas,$minas);
        return $buscaminas;
    }
        public static function recrearBuscaminas($tableroOculto,$tableroJugador) {
            $buscaminas = new Buscaminas($tableroOculto,$tableroJugador);
            return $buscaminas;
        }
}