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

    private $newTitle;
    private $newText;

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
 public function setNewTitle($newTitle) {
    $this->newTitle = $newTitle;
 }
 public function setNewText($newText) {
    $this->newText = $newText;
 }

 public function getNewTitle() {
    return $this->newTitle;
 }
 public function getNewText() {
    return $this->newText;
 }

    public static function getLastUpdateArticle($idArticle){
        $article = Article::getArticleById($idArticle);
        $sql = "SELECT * FROM MODIF_ARTICLE WHERE articleId = :id order by MODIF_ARTICLE.DATEMODIF DESC  limit 3 ";
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('id'=>$idArticle);
        $stmt->execute($P);
        $result = $stmt->fetchAll();
        $tabHisto = array();
        $i=0;
        foreach ($result as $r) {
            $tabHisto[$i] = new self();
            $tabHisto[$i]->setArticle($article);

            $user = User::getUserById($r["userId"]);
            $tabHisto[$i]->setUser($user);

            $tabHisto[$i]->setNewTitle($r["newtitle"]);
            $tabHisto[$i]->setNewText($r["newtext"]);
            $tabHisto[$i]->setDateModif($r["dateModif"]);
            $i++;
        }
        return $tabHisto;

  }


}
    ?>