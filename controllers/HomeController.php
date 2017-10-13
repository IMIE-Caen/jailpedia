<?php

class HomeController {
  function render(){
    ob_start();
    include("./views/index.html.php");
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }


}
