<?php

/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 18/10/17
 * Time: 10:54
 */
class Categorisation {

  public static function addTagToArticle($articleId, $tagId) {
    $sql = 'INSERT INTO CATEGORISATION (articleId, tagId) VALUES (:articleId,:tagId) ';
    $stmt = SQLitePDO::bdd()->prepare($sql);
    $P = array('articleId' => $articleId, 'tagId' => $tagId);
    $stmt->execute($P);
    $stmt->closeCursor();
  }

  public static function getTagByArticle($articleId) {
    $sql = "SELECT t.id, t.name FROM TAGS t
        INNER JOIN CATEGORISATION c ON t.id = c.tagId WHERE c.articleId = ? ";
    $article = SQLitePDO::bdd()->prepare($sql);
    $article->execute(array($articleId));
    $result = $article->fetchAll(PDO::FETCH_CLASS, "Tag");
    return $result;
  }

  public static function getArticleByTag($tagId) {
    $sql = "SELECT a.id, a.title, a.text FROM ARTICLES a 
        INNER JOIN CATEGORISATION c ON a.id = c.articleId WHERE c.tagId = ? ";
    $article = SQLitePDO::bdd()->prepare($sql);
    $article->execute(array($tagId));
    $result = $article->fetchAll(PDO::FETCH_CLASS, "Article");
    return $result;
  }

  public static function getIdTagByArticle($articleId) {
    $sql = "SELECT t.id FROM TAGS t
        INNER JOIN CATEGORISATION c ON t.id = c.tagId WHERE c.articleId = ? ";
    $article = SQLitePDO::bdd()->prepare($sql);
    $article->execute(array($articleId));
    $result = $article->fetchAll(PDO::FETCH_COLUMN);
    return $result;
  }

}
