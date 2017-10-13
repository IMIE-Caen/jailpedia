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
    private $user;

    /**
     * Evaluation constructor.
     * @param $article
     * @param $note
     * @param $user
     */
    public function __construct($article = Article::class, $note, $user = User::class)
    {
        $this->article = $article;
        $this->note = $note;
        $this->user = $user;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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