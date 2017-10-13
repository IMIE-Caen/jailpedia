<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 13:47
 */

class Contribution
{
    private $user;
    private $article;

    /**
     * Contribution constructor.
     * @param $user
     * @param $article
     */
    public function __construct($user = User::class, $article = Article::class)
    {
        $this->user = $user;
        $this->article = $article;
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


}