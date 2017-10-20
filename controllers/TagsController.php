<?php

class TagsController {
  function showAllTags(){

    $page_content ="Affichage de tous les tags";
    include("./views/layout.html.php");
  }

  function show($id){
    $articles = Categorisation::getArticleByTag($id);
    $articlesCount = Categorisation::fetchRowTag($id);
      ob_start();
      include("./views/article/list.html.php");
      $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function deleteTag($id) {
      try{
          Tag::delete($id);
      }catch (Exception $e){
          echo "Exception reçue : ".$e->getMessage()."\n";
          echo "Vous allez être redirigé sur la page d'accueil
          dans quelques secondes";
          echo '<script type="text/javascript">
              setTimeout("window.location = \'/\'", 2000);
          </script>';
          //header('Location : /');
      }

  }

  public function add($name) {
    $tagId = Tag::createTag($name);
    $tag = Tag::getTagById($tagId);
    ob_start();
    include("./views/tag/line.html.php");
    $line = ob_get_clean();
    echo $line;
  }
}
