<?php

require_once (__DIR__."/utils/Controller.php");
require_once (__DIR__."/Error/Error.php"); 

use Controller\Controller; 
use Error\Error; 


header("Content-Type:application/json");
$requestMethod = $_SERVER["REQUEST_METHOD"];
$paths = $_SERVER['REQUEST_URI'];
$argu = explode("/",$paths);


if($requestMethod == "GET"){
  if(count($argu) == 3){
    if($argu[2] == "usuarios"){
      echo Controller::buscarUsuario(); 
    }else{
      echo Controller::buscarUsuario($argu[2]); 
    }
  }else{
    Error::demasiadosArgumentos(); 
  }}