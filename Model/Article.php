<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 13:45
 */

class Article
{
    /**
     * @var int id
     */
    private $id;
    /**
     * @var string the article's title
     */
    private $title;
    /**
     * @var string text of the article
     */
    private $text;

    /**
     * Article constructor.
     * @param string $title
     * @param string $text
     * @param Tag $tag
     */
    /*public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }*/

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->Title = $title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }


    public static function fetchAll(){
        $sql = "SELECT * FROM ARTICLES";
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Article");
        return $result;
    }

    public static function getArticleById($id){
       // $db = new SQLitePDO();
        $sql = "SELECT * FROM ARTICLES WHERE id = ? ";
        $article = SQLitePDO::bdd()->prepare($sql);
        $article->execute(array($id));
        $result = $article->fetchAll(PDO::FETCH_CLASS,"Article");
        if( sizeof($result) != 0) {
            $article =$result[0] ;
        }else 
            $article = Null ; 
        return $article;

        
    }

    public static function createArticle($title,$text,$img){
        //$db = new SQLitePDO();
        $sql = 'INSERT INTO ARTICLES (Title, Text) values(:TITRE,:TEXTE)';
        $db = SQLitePDO::bdd();
        $stmt = $db->prepare($sql);
        $P = array('TITRE' => $title,'TEXTE'=>$text);
        $stmt->execute($P);
        $id = $db->lastInsertId();
        //
        //$sql = 'INSERT INTO '
        //var_dump($id);
        $sql = 'INSERT INTO IMAGES (articleID, name) VALUES (:article, :img)';
        $stmt = $db->prepare($sql);
        $P = array('article' => $id, 'img' => $img);
        $stmt->execute($P);
        $stmt->closeCursor();
        return $id;
    }

    public static function updateArticle($title,$text,$id){
        //$db = new SQLitePDO();
        $sql = 'UPDATE ARTICLES SET title = :TITRE, text = :TEXTE where id = :ID';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('TITRE' => $title,'TEXTE'=>$text,'ID'=>$id);
        $stmt->execute($P);
        $stmt->closeCursor();
    }

    public static function updateArticleHistory($title,$text,$id, $idUser){
        $date = date("d-m-Y H:i"); 
        $sql = 'INSERT INTO MODIF_ARTICLE (articleId, userId , newTitle, newText, dateModif) values(:articleId, :userId ,  :newTitle,:newText , :dateModif )' ;
        $db = SQLitePDO::bdd();
        $stmt = $db->prepare($sql);
        $P = array('newTitle' => $title,'newText'=>$text, 'articleId'=>$id, 'userId'=>$idUser , 'dateModif' => $date );
        $stmt->execute($P);
    }

    public static function deleteArticle($id){
        $sql = 'DELETE FROM ARTICLES WHERE id = :ID';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('ID'=>$id);
        $stmt->execute($P);
        $stmt->closeCursor();
    }

    public static function lastArticles(){
     $sql = "SELECT * FROM ARTICLES ORDER BY ARTICLES.ID DESC limit 3 ";
     $stmt = SQLitePDO::bdd()->prepare($sql);
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Article");
     return $result;
  }

    public static function getImage($articleId){
        $sql = "SELECT name FROM IMAGES WHERE articleID = :ID";
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('ID'=>$articleId);
        $stmt->execute($P);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res["name"];
    }


    public static function randomArticle(){
     $sql = "SELECT * FROM ARTICLES ORDER BY RANDOM() LIMIT 1 ";
     $stmt = SQLitePDO::bdd()->prepare($sql);
     $stmt->execute();
     $article = $stmt->fetchAll(PDO::FETCH_CLASS,"Article"); 
     if( sizeof($article) != 0  ) {
      $articleRandom =  $article[0] ; 
     }else
        $articleRandom = Null ; 
    return $articleRandom;
  }


  public static function getArticleByTitle($title){
    $sql = "SELECT * FROM ARTICLES WHERE title like ? ";
    $article = SQLitePDO::bdd()->prepare($sql);
    $article->execute(array("%$title%"));
    $result = $article->fetchAll(PDO::FETCH_CLASS,"Article");
    return $result;

  }
  
}