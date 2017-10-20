<?php
/**
 * 
 * User: Cindy
 * Date: 20/10/17
 * Time: 12:15
 */

class Historisation
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
     * @var User the user who wrote the note
     */
    private $user;

    /**
    * @var Date de la modif 
    */

    private $dateModif ; 

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
     * @return date
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * @param date $dateModif
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;
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



    public static function getLastUpdateArticle($idArticle){
    $sql = "SELECT * FROM MODIF_ARTICLE WHERE articleId = :id  limit 3 ";
    $stmt = SQLitePDO::bdd()->prepare($sql);
    $P = array('id'=>$idArticle);
    $stmt->execute($P);
    $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Historisation");
    return $result;

  }


}
    ?>