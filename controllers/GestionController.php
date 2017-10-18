<?php

class GestionController {

  function GestionUsers() {
    ob_start();
    include('./views/gestionUsers.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function GestionArticles() {
    ob_start();
    include('./views/gestionArticles.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function GestionTags() {
    ob_start();
    include('./views/gestionTags.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

}
