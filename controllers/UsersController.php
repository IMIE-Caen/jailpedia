<?php

//session_start();
class UsersController {

  public $role_user;

  function show($id){
  	$user = User::getUserById($id);
    if($user != Null){
       ob_start();
    include('./views/user/showUser.html.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
    }
    else{
      ob_start();
      include("./views/404.html.php");
      $page_content = ob_get_clean();
      header("HTTP/1.0 404 Not Found");
      include("./views/layout.html.php");

    }
   
  }


 
    
  function signUp() {
    ob_start();
    include('./views/user/createAccount.html.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function signIn() {
    ob_start();
    include('./views/user/signIn.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");
  }

  function validForAuth($log, $password) {
    $PDO = new SQLitePDO();
    $sql = 'SELECT * FROM USERS WHERE email = ? and password = ? ';
    $stmt = $PDO->bdd()->prepare($sql);
    $stmt->bindValue(1, $log);
    $stmt->bindValue(2, $password);
    $stmt->execute();
    $userValid = $stmt->fetchAll()[0][0];
    var_dump($userValid);
    return $userValid == true ;

 	}

  function RoleUser( $login, $password){
    $PDO = new SQLitePDO();
    $sql = 'SELECT role FROM USERS WHERE email = ? and password = ?';
    $stmt = $PDO->bdd()->prepare($sql) ;
    $stmt->bindValue(1, $login);
    $stmt->bindValue(2, $password);
    $stmt->execute();
    $role_user = $stmt->fetchAll()[0][0];
    var_dump($role_user);
    return $role_user ;
}

function UserConnect( $login, $password){
  $PDO = new SQLitePDO();
  $sql = 'SELECT id FROM USERS WHERE email = ? and password = ?';
  $stmt = $PDO->bdd()->prepare($sql) ;
  $stmt->bindValue(1, $login);
  $stmt->bindValue(2, $password);
  $stmt->execute();
  $connect_user = $stmt->fetchAll()[0][0];
  var_dump($connect_user);
  return $connect_user ;
}

  function save($param){
  	$PDO = new SQLitePDO();

  	$firstname = $param['firstname'];
  	$lastname = $param['lastname'];
  	$dob = $param['dob'];
  	$email = $param['email'];
  	$password = $param['password'];
    $role = $param['role'];

  	$sql = 'INSERT INTO USERS ("firstname", "lastname", "dob","email","password","role") VALUES (:firstname, :lastname, :dob, :email, :password, :role) ';
  	$stmt = $PDO->bdd()->prepare($sql) ;
  	$stmt->bindValue('firstname', $firstname);
  	$stmt->bindValue('lastname', $lastname);
  	$stmt->bindValue('dob', $dob);
  	$stmt->bindValue('email', $email);
  	$stmt->bindValue('password', $password);
    $stmt->bindValue('role', $role);
  	 $stmt->execute();


  }

  function delete() {
    $page_content = "suppression user";
    include("./views/layout.html.php");
  }

  function edit($id) {
  	$user = User::getUserById($id);
  	ob_start();
    include('./views/user/editAccount.html.php');
    $page_content = ob_get_clean();
    include("./views/layout.html.php");

  }

  function update($param) {

  	$firstname = $param['firstname'];
  	$lastname = $param['lastname'];
    $dob = $param['dob'];
    $email = $param['email'];
    $password = $param['password'];
    $role = $param['role'];
    $id =$param['id'];

    User::updateUser($firstname,$lastname,$dob,$email,$password,$role,$id);
  }


}
