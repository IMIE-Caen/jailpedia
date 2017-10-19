<?php

class HomeController {

  function render(){
  	$articles = Article::lastArticles();
  	$randomArticle = Article::randomArticle();
  	$tags = Tag::fetchAll();
  	ob_start();
    include("./views/index.html.php");
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  


}
