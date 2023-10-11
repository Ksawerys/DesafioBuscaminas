<?php
/*Genera un tablero en elk busca minas de diez con dos minas si no digo nada y si dhay dialogo entonces se personalizar*/
require_once('FactoriaBuscaminas.php');
require_once('Buscaminas.php');
require_once('Conexion.php');
require_once('Constantes.php');


header("Content-Type:application/json");

$requestMethod = $_SERVER["REQUEST_METHOD"];
$paths = $_SERVER['REQUEST_URI'];
if($requestMethod=='GET'){
    $arraypath= explode('/',$paths);
        $buscaminas=FactoriaBuscaminas::crearBuscaminas($data["Tablero"],true);
        echo json_encode(Controlador::cambiarPartida($data["Correo"],$data["Contrasena"]));
        $data = json_decode(file_get_contents('php://input'), true);
        if (json_last_error() == JSON_ERROR_NONE) {

            $inicioSesion=Controlador::buscarUsuario($data["Correo"],$data["Contrasena"]);

            }else{
                $cod = 406;
                $mes = "FORMAT CONTENT NOT ACCEPTABLE";
                header('HTTP/1.1 '.$cod.' '.$mes);
                echo json_encode(['cod' => $cod,
                'mes' => $mes]);
            }
    

    if (count($arraypath)==1){
        $consulta=$arraypath[1];
            $duracion=$consulta;
            $buscaminas=FactoriaBuscaminas::crearBuscaminas(10,2);
            echo json_encode(Controlador::insertarPartida());
            $cod = 200;
            header('HTTP/1.1 '.$cod.' '.' OK');

    } elseif (count($arraypath)==3){
            $consulta=$arraypath[1];
            $consulta2=$arraypath[2];
            $duracion=$consulta;
            $buscaminas=FactoriaBuscaminas::crearBuscaminas($consulta,$consulta2);
            echo json_encode(Controlador::insertarPartida());
            $cod = 200;
            header('HTTP/1.1 '.$cod.' '.' OK');

    }else{
            $cod = 406;
            $mes = "FORMAT CONTENT NOT ACCEPTABLE";
            header('HTTP/1.1 '.$cod.' '.$mes);
            echo json_encode(['cod' => $cod,
            'mes' => $mes]);
        }
}elseif($requestMethod=='POST'){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (json_last_error() == JSON_ERROR_NONE) {

            $buscaminas=FactoriaBuscaminas::crearBuscaminas($data["Tablero"],true);
            echo json_encode(Controlador::cambiarPartida($data["Tablero"]["id"],$data["Tablero"]["idJugador"],$data["Tablero"]["TableroOculto"],$data["Tablero"]["finalizada"],));

        }else{
            $cod = 406;
            $mes = "FORMAT CONTENT NOT ACCEPTABLE";
            header('HTTP/1.1 '.$cod.' '.$mes);
            echo json_encode(['cod' => $cod,
            'mes' => $mes]);
        }
    } else {
        $cod = 405;
        $mes = "Verbo no soportado";
        header('HTTP/1.1 '.$cod.' '.$mes);
        echo json_encode(['cod' => $cod,
                          'mes' => $mes]);    }    

}elseif($requestMethod=='PUT'){

}elseif($requestMethod=='DELETE'){
    
}




// }elseif(count($arraypath)==2){
//     $consulta=$arraypath[1];
//     if(Controlador::mostrarPartidas()!=null){$valoresPartida=Controlador::mostrarPartidas();}
//     if($valoresPartida[5] ==0){
//     $buscaminas=FactoriaBuscaminas::crearBuscaminas($valoresPartida,2);
//     $buscaminas->revelar($consulta);
//     if($buscaminas->getfinalizado()==1){
//     echo json_encode(Controlador::cambiarPartida());
//     }else{
//         echo json_encode("la partida esta finalizada");
//     }

