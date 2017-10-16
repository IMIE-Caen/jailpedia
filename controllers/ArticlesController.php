<?php

class ArticlesController {
  function show($id){

    $page_content ="Affichage de l'article $id";
    include("./views/layout.html.php");
  }

	function showAllArticles(){
    $page_content ="Affichage des article";
    include("./views/layout.html.php");
  }

   function edit($id){

    $page_content ="Modifier article $id";
    include("./views/layout.html.php");
  }

   function create(){
    $page_content ="Nouvel article ";
    include("./views/layout.html.php");
  }
}
