<?php

//session_start();
class UsersController {

  function show($id) {
    $page_content = "Affichage de l'user $id";
    include("./views/layout.html.php");
  }

  function signUp() {
    ob_start();
    include('./views/createAccount.php');
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
    $sql = 'SELECT COUNT(*) FROM USERS WHERE FirstName = ? and Mdp = ? ';
    $stmt = $PDO->bdd()->prepare($sql);
    $stmt->bindValue(1, $log);
    $stmt->bindValue(2, $password);
    $stmt->execute();

    $userValid = $stmt->fetchAll()[0][0];
    if (!$userValid == 1) {
      return false;
    }
    $_SESSION["user"] = User::getUserById($userValid["id"]);
    
  }

  function save($param) {
    $PDO = new SQLitePDO();

    $firstname = $param['firstname'];
    $lastname = $param['lastname'];
    $dob = $param['dob'];
    $email = $param['email'];
    $password = $param['password'];

    $sql = 'INSERT INTO USERS ("firstname", "lastname", "dob","email","mdp") VALUES (:firstname, :lastname, :dob, :email, :password) ';
    $stmt = $PDO->bdd()->prepare($sql);
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
    $page_content = "suppression user";
    include("./views/layout.html.php");
  }

}
