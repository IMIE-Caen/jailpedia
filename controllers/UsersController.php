<?php
include_once("./PDO.php");
$db = new PDO('sqlite:JailPedia.sqlite') ; 
class UsersController {
  
  function show($id){
    $page_content ="Affichage de l'user $id";
    include("./views/layout.html.php");
  }

	function signUp(){
    $page_content ="Affichage formulaire inscription";
    include("./views/layout.html.php");
  }

  function signIn(){
  	ob_start();
  	include('./views/signIn.php'); 
    $page_content =ob_get_clean();
    include("./views/layout.html.php");
  }

  function validForAuth( $log, $password){
  	
  	$sql = 'SELECT * FROM USERS WHERE ME_NAME = ? and ME_LASTNAME = ? ';
  	$stmt = $db->prepareStatement($sql) ; 
		$stmt= $db->bindValues([$log,$password]);
		$stmt= $db->execute();

		
 	}

  function save(){
    $page_content ="sauvegarde user";
    include("./views/layout.html.php");
  }

  function delete(){
    $page_content ="suppression user";
    include("./views/layout.html.php");
  }

  function edit($id){
    $page_content ="suppression user";
    include("./views/layout.html.php");
  }



}
