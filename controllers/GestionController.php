<?php

class GestionController {

  function GestionUsers() {
    $users = User::fetchAll();
    ob_start();
    include('./views/gestionUsers.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function GestionArticles() {
    $articles = Article::fetchAll();
    ob_start();
    include('./views/gestionArticles.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function GestionTags() {
    $tags = Tag::fetchAll();
    ob_start();
    include('./views/gestionTags.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

}
