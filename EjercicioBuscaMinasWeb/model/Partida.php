<?php namespace Partida;


class Partida{
  public $idPartida;
  public $idPersona; 
  public $tablero; 
  public $tableroJugador;
  public $finalizado;

	public function __construct($item1, $item2,$item3,$item4=null,$idPartida=null) {
    if(is_int($item2)){
        $idPersona=$item1;
        $tablero=$item2;
        $minas=$item3;
        $this->finalizado = 0;
        $this->generarTablero($tablero);
        $this->colocarMina($minas);
    }else{
    $idPersona=$item1;
    $tablero=$item2;
    $tableroJugador=$item3;
    $finalizado=$item4;
    $this->idPersona = $idPersona;
    $this->tablero = $tablero;
    $this->tableroJugador = $tableroJugador;
    $this->finalizado = $finalizado;
    $this->idPartida = $idPartida;

    }
	}



  function generarTablero($tablero) {
    $this->tablero = array_fill(0, $tablero,"vacio");
    $this->tableroJugador = array_fill(0, $tablero, "x");
}

function colocarMina($minas){
        $conatdorMinas=0;   
    $tamañoTablero=count($this->tablero)-1;
    while ($conatdorMinas<$minas) {
        $posicion=rand(0,$tamañoTablero);
        if ($this->tablero[$posicion] == "vacio") {
            $this->tablero[$posicion] = "mina";
            $conatdorMinas++;
        }
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
        $this->tableroJugador[$posicion]=1;
        if ($this->tablero[$posicion]-1=="mina" && $this->tablero[$posicion]+1=="mina"){
            $this->tableroJugador[$posicion]=2;
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
function getTableroJugador() {
    return $this->tableroJugador;
}
}

