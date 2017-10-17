<?php

class ArticlesController {

  function show($id) {
    $page_content = "Affichage de l'article $id";
    include("./views/layout.html.php");
  }

  function showAllArticles() {
    $articles = Article::fetchAll();
    ob_start();
    include("./views/article/list.html.php");
    $page_content = ob_get_contents();
    include("./views/layout.html.php");
  }

  function edit($id) {
    $page_content = "Modifier article $id";
    include("./views/layout.html.php");
  }

  function create() {
    $page_content = "Nouvel article ";
    include("./views/layout.html.php");
  }

  function delete() {
    $page_content = "suppression article ";
    include("./views/layout.html.php");
  }

  function create(){
    ob_start();
  	include("./views/creationArticles.html.php");
    $page_content =ob_get_clean();
    include("./views/layout.html.php");
  }

	function delete(){
		$page_content ="suppression article ";
		include("./views/layout.html.php");
	}

  function search(){
    $page_content ="rechercher article ";
    include("./views/layout.html.php");
  }

  function searchArticle(){
    $page_content ="rechercher article ";
    include("./views/layout.html.php");
  }
}
