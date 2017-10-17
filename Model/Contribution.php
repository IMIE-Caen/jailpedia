<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 13:47
 */

class Contribution
{

    /**
     * @var int id
     */
    private $id;
    /**
     * @var User who wrotes the article
     */
    private $user;
    /**
     * @var Article article wroted by the user
     */
    private $article;

    /**
     * Contribution constructor.
     * @param User $user
     * @param Article $article
     */
    /*public function __construct(User $user, Article $article)
    {
        $this->user = $user;
        $this->article = $article;
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
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param Article $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }



}