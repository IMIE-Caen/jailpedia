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

  function delete($id) {
    Tag::deleteTag($id);
  }
  
  public function add($name) {
    $tagId = Tag::createTag($name);
    $tag = Tag::getTagById($tagId);
    ob_start();
    include("./views/tag/add.html.php");
    $line = ob_get_clean();
    echo $line;
  }
}