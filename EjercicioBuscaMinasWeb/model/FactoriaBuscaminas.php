<?php namespace FactoriaBuscaminas;

use Partida\Partida;


class FactoriaBuscaminas {
    public static function crearBuscaminas($casillas=null,$minas=null,$user) {
        if($casillas==null || $minas==null || $minas>$casillas) {
            $buscaminas= new Partida($user,10,2);
        }else{
            $buscaminas = new Partida($user,$casillas,$minas);
        }
        return $buscaminas;
    }
        public static function recrearBuscaminas($user,$tableroOculto,$tableroJugador) {
            $buscaminas = new Partida($user,$tableroOculto,$tableroJugador);
            return $buscaminas;
        }
}