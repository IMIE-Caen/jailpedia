<?php

class TagsController {
  function showAllTags(){

    $page_content ="Affichage de tous les tags";
    include("./views/layout.html.php");
  }

  function show($id){

    $page_content ="Affichage du tag $id";
    include("./views/layout.html.php");
  }


}