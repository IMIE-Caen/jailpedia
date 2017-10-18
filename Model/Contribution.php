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

    public static function setContribution($userId, $articleId){
        $sql = 'INSERT INTO CONTRIBUTIONS (userId,articleId) VALUES (:userId,:articleId) ';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('userId' => $userId,'articleId'=>$articleId);
        $stmt->execute($P);
        $stmt->closeCursor();
    }

    public static function getContributionByArticle($articleId){
        $sql = "SELECT u.id, u.firstname, u.lastname, u.dob,u.email, u.password FROM USERS u 
        INNER JOIN CONTRIBUTIONS c ON u.id = c.userId WHERE c.articleId = ? ";
        $article = SQLitePDO::bdd()->prepare($sql);
        $article->execute(array($articleId));
        $result = $article->fetchAll(PDO::FETCH_CLASS,"User");
        return $result;
    }

    public static function getContributionByUser($userId){
        $sql = "SELECT a.id, a.title, a.text, a.tag FROM ARTICLES a 
        INNER JOIN CONTRIBUTIONS c ON a.id = c.articleId WHERE c.userId = ? ";
        $article = SQLitePDO::bdd()->prepare($sql);
        $article->execute(array($userId));
        $result = $article->fetchAll(PDO::FETCH_CLASS,"Article");
        return $result;
    }

}