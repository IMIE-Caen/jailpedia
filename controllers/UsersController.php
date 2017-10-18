<?php

//session_start();
class UsersController {

  public $role_user;

  function show($id){
  	$user = User::getUserById($id);
    ob_start();
  	include('./views/viewUser.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function signUp() {
    ob_start();
    include('./views/createAccount.html.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function signIn() {
    ob_start();
    include('./views/signIn.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function validForAuth($log, $password) {
    $PDO = new SQLitePDO();
    $sql = 'SELECT * FROM USERS WHERE FirstName = ? and password = ? ';
    $stmt = $PDO->bdd()->prepare($sql);
    $stmt->bindValue(1, $log);
    $stmt->bindValue(2, $password);
	  $stmt->execute();

    $userValid = $stmt->fetchAll()[0][0];
    return $userValid == 1 ;

 	}

  function RoleUser( $login, $password){
    $PDO = new SQLitePDO();
    $sql = 'SELECT Role FROM USERS WHERE FirstName = ? and Mdp = ?';
    $stmt = $PDO->bdd()->prepare($sql) ;
    $stmt->bindValue(1, $login);
    $stmt->bindValue(2, $password);
    $stmt->execute();
    $role_user = $stmt->fetchAll()[0][0];
    return $role_user['role'] ;

  }

  function save($param){
  	$PDO = new SQLitePDO();

  	$firstname = $param['firstname'];
  	$lastname = $param['lastname'];
  	$dob = $param['dob'];
  	$email = $param['email'];
  	$password = $param['password'];
    $role = $param['role'];

  	$sql = 'INSERT INTO USERS ("firstname", "lastname", "dob","email","mdp") VALUES (:firstname, :lastname, :dob, :email, :password, :role) ';
  	$stmt = $PDO->bdd()->prepare($sql) ;
  	$stmt->bindValue('firstname', $firstname);
  	$stmt->bindValue('lastname', $lastname);
  	$stmt->bindValue('dob', $dob);
  	$stmt->bindValue('email', $email);
  	$stmt->bindValue('password', $password);
  	 $stmt->execute();


  }

  function delete() {
    $page_content = "suppression user";
    include("./views/layout.html.php");
  }

  function edit($id) {
  	$user = User::getUserById($id);
  	ob_start();
    include('./views/editAccount.html.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");

  }

  function update($param) {

  	$firstname = $param['firstname'];
  	$lastname = $param['lastname'];
    $dob = $param['dob'];
    $email = $param['email'];
    $password = $param['password'];
    $id =$param['id'];

    User::updateUser($firstname,$firstname,$dob,$email,$password,$id);


  }

}
