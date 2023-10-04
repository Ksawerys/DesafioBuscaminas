<?php
class Buscaminas {
    public $tablero = array();
    public $tableroJugador = array();
    public $finalizado = 0;

    function __construct($tablero,$minas,) {
        if(is_int($minas)){
            $this->generarTablero();
            $this->colocarMina($minas);
        }else{
        $tableroJugador=$minas;
        $this->tablero = $tablero;
        $this->tableroJugador = $tableroJugador;
        }
    }
    

    function generarTablero() {
        $this->tablero = array_fill(0, 10, array_fill(0, 10, "vacio"));
    }

    function colocarMina($minas){
            $conatdorMinas=0;   
        $tamañoTablero=count($this->tablero);
        while ($conatdorMinas<$minas) {
            $posicion=rand(0,$tamañoTablero);
            $this->tablero[$posicion] = "mina";
            $conatdorMinas++;
        }
    }

    function revelar($posicion){
        if ($this->tablero[$posicion]=="mina"){
            $this->finalizado();  
        }else{
            $tableroJugador[$posicion]=$this->generarPista($posicion);
        }
    }

    function generarPista($posicion){
        $this->tablero[$posicion]=0;
        if ($this->tablero[$posicion]-1=="mina" || $this->tablero[$posicion]+1=="mina"){
            $this->tablero[$posicion]=1;
            if ($this->tablero[$posicion]-1=="mina" && $this->tablero[$posicion]+1=="mina"){
                $this->tablero[$posicion]=2;
            }
        }
    }
    function finalizado(){
       $this->finalizado=1;
    }
    function getfinalizado(){
       return $this->finalizado;
     }
    function getCasillas() {
        return $this->tablero;
    }  
}

