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
    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

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

    function getBdd() {
        $db = new PDO('sqlite:JailPedia.sqlite');
        //Activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function fectchAll(){
        $db = new PDO('sqlite:JailPedia.sqlite');
        //Activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $articles = $db->prepare("SELECT * FROM ARTICLES");
        $articles->execute();
        $result = $articles->fetchAll(PDO::FETCH_CLASS,"Article");
        return $result;
    }

    public static function getArticleById($id){
        $db = new PDO('sqlite:JailPedia.sqlite');
        //Activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $article = $db->prepare("SELECT * FROM ARTICLES WHERE ME_ID = ?");
        $article->execute(array($id));
        return $article;
    }


}