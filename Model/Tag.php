<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 13:46
 */

class Tag
{
    /**
     * @var int id
     */
    private $id;
    /**
     * @var string the tag name
     */
    private $name;

    /**
     * Tag constructor.
     * @param string $name
     */
    /*public function __construct($name)
    {
        $this->name = $name;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public static function fetchAll(){
        $sql = "SELECT * FROM TAGS";
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Tag");
        return $result;
    }

    public static function getTagById($id){
        // $db = new SQLitePDO();
        $sql = "SELECT * FROM TAGS WHERE id = ? ";
        $article = SQLitePDO::bdd()->prepare($sql);
        $article->execute(array($id));
        $result = $article->fetchAll(PDO::FETCH_CLASS,"Tag");
        return $result[0];
    }

    public static function createTag($name){
        $db = SQLitePDO::bdd();
        $sql = 'INSERT INTO TAGS (name) values(:NAME)';
        $stmt = $db->prepare($sql);
        $P = array('NAME' => $name);
        $stmt->execute($P);
        $id = $db->lastInsertId();
        $stmt->closeCursor();
        return $id;
    }

    public static function updateTag($name,$id){
        //$db = new SQLitePDO();
        $sql = 'UPDATE TAGS SET name = :NAME where id = :ID';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('NAME' => $name,'ID'=>$id);
        $stmt->execute($P);
        $stmt->closeCursor();
    }

    public static function deleteTag($id){
        $sql = 'DELETE FROM TAGS WHERE id = :ID';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('ID'=>$id);
        $stmt->execute($P);
        $stmt->closeCursor();
    }

}