<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 14:24
 */

class Evaluation
{
    /**
     * @var int id
     */
    private $id;
    /**
     * @var Article a article Object
     */
    private $article;
    /**
     * @var string the user's note for this article
     */
    private $note;
    /**
     * @var User the user who wrote the note
     */
    private $user;

    /**
     * Evaluation constructor.
     * @param Article $article
     * @param string $note
     * @param User $user
     */
    /*public function __construct(Article $article, $note, User $user)
    {
        $this->article = $article;
        $this->note = $note;
        $this->user = $user;
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

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
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



}