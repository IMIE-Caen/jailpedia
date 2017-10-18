<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 13:37
 */

class User
{

    /**
     * @var int id
     */
    private $id;
    /**
     * @var string firstname
     */
    private $firstname;
    /**
     * @var string lastname
     */
    private $lastname;
    /**
     * @var string date of birth
     */
    private $dob;
    /**
     * @var string email address
     */
    private $email;
    /**
     * @var string password;
     */
    private $password;

    /**
     * @var string user role
     */
    private $role;


    /**
     * User constructor.
     * @param string $firstname
     * @param string $lastname
     * @param string $dob
     * @param string $email
     * @param string $mdp
     */
    /*public function __construct($firstname, $lastname, $dob, $email, $mdp)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->dob = $dob;
        $this->email = $email;
        $this->mdp = $mdp;
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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param string $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string mdp
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }


    public static function fetchAll(){
        //$PDO = new SQLitePDO();
        $sql = "SELECT * FROM USERS";
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,"User");
        return $result;
    }

    public static function getUserById($id){
        // $db = new SQLitePDO();
        $sql = "SELECT * FROM USERS WHERE id = ? ";
        $article = SQLitePDO::bdd()->prepare($sql);
        $article->execute(array($id));
        $result = $article->fetchAll(PDO::FETCH_CLASS,"User");
//        var_dump($result); exit;
        return $result[0];
    }

    public static function createUser($firstname,$lastname,$dob,$email,$password){
        //$db = new SQLitePDO();
        $sql = 'INSERT INTO USERS ("firstname", "lastname", "dob","email","password") VALUES (:firstname, :lastname, :dob, :email, :password) ';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $stmt->bindValue('firstname', $firstname);
        $stmt->bindValue('lastname', $lastname);
        $stmt->bindValue('dob', $dob);
        $stmt->bindValue('email', $email);
        $stmt->bindValue('password', $password);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function updateUser($firstname,$lastname,$dob,$email,$mdp,$id){
        //$db = new SQLitePDO();
        $sql = 'UPDATE USERS SET firstname = :firstname, lastname = :lastname, dob = :dob , email = :email, password
 =:mdp  where id = :ID';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('firstname' => $firstname,'lastname'=>$lastname, 'dob'=> $dob , 'email'=>$email ,'mdp'=>$mdp,  'ID'=>$id);
        $stmt->execute($P);
        $stmt->closeCursor();
    }

    public static function deleteUser($id){
        $sql = 'DELETE FROM USERS WHERE id = :ID';
        $stmt = SQLitePDO::bdd()->prepare($sql);
        $P = array('ID'=>$id);
        $stmt->execute($P);
        $stmt->closeCursor();
    }
}
