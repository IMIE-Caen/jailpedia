<?php

class ArticlesController {

  function show($id) {
    $article = Article::getArticleById($id);
    $note = Evaluation::getAverageNoteArticle($id);
    $tags = Categorisation::getTagByArticle($id);
    $contribs = Contribution::getContributionByArticle($id);
    //$note = Evaluation::getUserNoteArticle($id,$_SESSION['userConnect']);
    if($article != Null){
      ob_start();
      include("./views/article/view.html.php");
      $page_content = ob_get_clean();
      include("./views/layout.html.php");
    }
    else{
      ob_start();
      include("./views/404.html.php");
      $page_content = ob_get_clean();
      header("HTTP/1.0 404 Not Found");
      include("./views/layout.html.php");

    }
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
    Article::updateArticleHistory($values["title"], $values["texte"], $values["id"], $values["idUser"]); 
  }

  function delete($id) {
    Article::deleteArticle($id);
  }

  function create() {
    ob_start();
    include("./views/article/creationArticles.html.php");
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function search($param) {
    $title = $param['search'];
    $articles = Article::getArticleByTitle($title);
    ob_start();
    include("./views/article/list.html.php");
    $page_content =ob_get_clean() ;
    include("./views/layout.html.php");
  }


  public function save($values) {
      move_uploaded_file($_FILES['image']['tmp_name'],"images/articles/".$_FILES['image']['name']."");
      //Article::createArticle($values["titre"], $values["texte"],$_FILES['image']['name']);
    $articleId = Article::createArticle($values["titre"], $values["texte"],$_FILES['image']['name']);
    foreach ($values["tags"] as $tag) {
        Categorisation::addTagToArticle($articleId, $tag);
    }
    $contrib = Contribution::setContribution($_SESSION['userConnect'],$articleId);
  }

}
