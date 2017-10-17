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



}
