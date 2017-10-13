<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 14:24
 */

class Evaluation
{
    private $article;
    private $note;

    /**
     * Evaluation constructor.
     * @param $article
     * @param $note
     */
    public function __construct($article = Article::class, $note)
    {
        $this->article = $article;
        $this->note = $note;
    }


    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }


}