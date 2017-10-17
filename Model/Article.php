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
        $this->title = $title;
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

    public function getDatabase() {
        $db = new PDO('sqlite:JailPedia.sqlite');
        //Activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function fectchAll(){
        /*$db = new PDO('sqlite:../JailPedia.sqlite');
        //Activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
        $db = getDatabase();
        //$db = self::getDatabase();//->getDatabase();
        var_dump($db);
        $articles = $db->prepare("SELECT * FROM ARTICLES");
        $articles->execute();
        $result = $articles->fetchAll(PDO::FETCH_CLASS,"Article");
        return $result;
    }

    public static function getArticleById($id){
        $db = new PDO('sqlite:../JailPedia.sqlite');
        //Activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $article = $db->prepare("SELECT * FROM ARTICLES WHERE id = ? ");
        $article->execute(array($id));
        $result = $article->fetchAll(PDO::FETCH_CLASS,"Article");
        return $result;
    }

    public static function createArticle($title,$text){
        $db = new PDO('sqlite:../JailPedia.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO ARTICLES (title, text) values(:TITRE,:TEXTE)';
        $stmt = $db->prepare($sql);
        $P = array('TITRE' => $title,'TEXTE'=>$text);
        $stmt->execute($P);
        $stmt->closeCursor();
    }

}