<?php

class ArticlesController {
  function show($id){

    $page_content ="Affichage de l'article $id";
    include("./views/layout.html.php");
  }


}
