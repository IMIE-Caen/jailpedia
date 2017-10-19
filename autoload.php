<?php
function __autoload($className) {
  if (file_exists($className . '.php')) {
    require_once $className . '.php';
    return true;
  } else if (file_exists("./controllers/" . $className . '.php')) {
    require_once "./controllers/" . $className . '.php';
    return true;
  } else if (file_exists("./Model/" . $className . '.php')) {
    require_once "./Model/" . $className . '.php';
    return true;
  }
  else if (file_exists("./tools/".$className . '.php')){
    require_once "./tools/".$className . '.php';
    return true;
  } else{
      return false;
  }
}
