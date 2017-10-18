<?php

class ArticlesController {

  function show($id) {
    $article = Article::getArticleById($id);
    ob_start();
    include("./views/article/view.html.php");
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function showAllArticles() {
    $articles = Article::fetchAll();
    ob_start();
    include("./views/article/list.html.php");
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function edit($id) {
    $article = Article::getArticleById($id);
    ob_start();
    include("./views/article/edit.html.php");
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function update($values) {
    Article::updateArticle($values["title"], $values["texte"], $values["id"]);
  }
  
  function delete() {
    $page_content = "suppression article ";
    include("./views/layout.html.php");
  }

  function create() {
    ob_start();
    include("./views/article/creationArticles.html.php");
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function search() {
    $page_content = "rechercher article ";
    include("./views/layout.html.php");
  }

  function searchArticle() {
    $page_content = "rechercher article ";
    include("./views/layout.html.php");
  }

  public function save($values) {
    $articleId = Article::createArticle($values["titre"], $values["texte"]);
    foreach ($values["tags"] as $tag) {
      Categorisation::addTagToArticle($articleId, $tag);
    }
  }
  
}
