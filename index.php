<?php
ini_set('display_errors', 'On');
error_log("Bienvenue sur mon router");

include_once("./my_http.php");

$request = new MyHttp();

if($request->pathInfo() == "/"){
  $coucou= "LES AMIS";
  include("./views/index.html.php");
}
else {
  if($request->pathInfo() == "/pouet"){
    echo "Page pouet";
  }
  else{
    header("HTTP/1.0 404 Not Found");
    echo file_get_contents("./views/404.html.php");
    echo "La page n'existe pas";
  }
}
