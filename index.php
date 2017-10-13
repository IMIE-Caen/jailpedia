<?php
ini_set('display_errors', 'On');
error_log("Bienvenue sur mon router");

include_once("./my_http.php");

$request = new MyHttp();

if($request->pathInfo() == "/"){

  ob_start();
  include("./views/index.html.php");
  $page_content = ob_get_clean();

  //$page_content = "COUCOU";

  include("./views/layout.html.php");
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
