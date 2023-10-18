<?php
require_once('Buscaminas.php');

class FactoriaBuscaminas {
    public static function crearBuscaminas($casillas=null,$minas=null) {
        if($casillas==null || $minas==null || $minas>$casillas) {
            $buscaminas= new Buscaminas(10,2);
        }else{
            $buscaminas = new Buscaminas($casillas,$minas);
        }
        return $buscaminas;
    }
        public static function recrearBuscaminas($tableroOculto,$tableroJugador) {
            $buscaminas = new Buscaminas($tableroOculto,$tableroJugador);
            return $buscaminas;
        }
}