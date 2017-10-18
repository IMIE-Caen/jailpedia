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
     * @var Tag article's tag
     */
    private $tag;

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

    /**
     * @return Tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param Tag $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
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
        return $result[0];
    }

    public static function createArticle($title,$text){
        //$db = new SQLitePDO();
        $sql = 'INSERT INTO ARTICLES (Title, Text) values(:TITRE,:TEXTE)';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('TITRE' => $title,'TEXTE'=>$text);
        $stmt->execute($P);
        $stmt->closeCursor();
    }

    public static function updateArticle($title,$text,$id){
        //$db = new SQLitePDO();
        $sql = 'UPDATE ARTICLES SET title = :TITRE, text = :TEXTE where id = :ID';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('TITRE' => $title,'TEXTE'=>$text,'ID'=>$id);
        $stmt->execute($P);
        $stmt->closeCursor();
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

}