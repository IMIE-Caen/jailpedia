<?php

session_start();

ini_set('display_errors', 'On');
include_once 'PDO.php';

function __autoload($className) {
  if (file_exists($className . '.php')) {
    require_once $className . '.php';
    return true;
  } 
  else if (file_exists("./controllers/" . $className . '.php')) {
    require_once "./controllers/" . $className . '.php';
    return true;
  }

  else if (file_exists("./Model/".$className . '.php')){
    require_once "./Model/".$className . '.php';
    return true;
  }
  else if (file_exists("./tools/".$className . '.php')){
    require_once "./tools/".$className . '.php';
    return true;
  } else{
      return false;
  }

}

$request = new MyHttp();
$PDO     = new SQLitePDO();
$PDO->bdd();
$preg_match_results = [];



if($request->pathInfo() == "/"){

  $controller = new HomeController();
    $controller->render();
}

else if ($request->method() == "GET") {
  // /articles/12345
  if (preg_match('/^\/articles\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new ArticlesController();
    $controller->show($id);
  }

  // /users/1
  else if (preg_match('/^\/users\/(\d+)\/?$/',$request->pathInfo(),$preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new UsersController();
    $controller->show($id);
  }

  // /tags/{id}
  else if (preg_match('/^\/tags\/(\d+)\/?$/',$request->pathInfo(),$preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new TagsController();
    $controller->show($id);
  }

  // recuperer les articles
  // /articles
  else if(preg_match('/^\/articles\/?$/',$request->pathInfo())){
    $controller = new ArticlesController();
    $controller->showAllArticles();
  }

  //create article
  else if(preg_match('/^\/articles\/new\/?$/',$request->pathInfo())){
    $controller = new ArticlesController();
    $controller->create();
  }

  // /tags
  else if (preg_match('/^\/tags\/?$/', $request->pathInfo())) {
    $controller = new TagsController();
    $controller->showAllTags();
  }

  //inscription
  // /signup
  else if (preg_match('/^\/signup\/?$/',$request->pathInfo())) {
    $controller = new UsersController();
    $controller->signUp();
  }

  //connexion
  // /signin
  else if (preg_match('/^\/signin\/?$/',$request->pathInfo())) {
    $controller = new UsersController();
    $controller->signIn();
  }

  //formulaire recherche article
  else if (preg_match('/^\/articles\/search\/?$/',$request->pathInfo())) {
    $controller = new ArticlesController();
    $controller->search();
  }

  // /users/123
  else if (preg_match('/^\/users\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new UsersController();
    $controller->show($id);
  }

  // /tags/{id}
  else if (preg_match('/^\/tags\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new TagsController();
    $controller->show($id);
  } 

  //deconnexionUser
  else if (preg_match('/^\/logout\/?$/',$request->pathInfo())) {
    $_SESSION['connecte']= false ;
    session_destroy();
    header('Location: /');
    exit();
  }

   //modif user
  else if(
    preg_match('/^\/users\/edit\/(\d+)\/?$/',$request->pathInfo(),$preg_match_results) ){
      $id = $preg_match_results[1];
      $controller = new UsersController();
      $controller->edit($id);
      }

  else{
    ob_start(); 
    include("./views/404.html.php");
    $page_content = ob_get_clean();
    header("HTTP/1.0 404 Not Found");
    include("./views/layout.html.php");
    
  }
}

// si méthode HTTP est POST
else if($request->method()== "POST"){

  //ajout article
  // /articles
  if(preg_match('/^\/articles\/?$/',$request->pathInfo())){
    $controller = new ArticlesController();
  }

  else if (preg_match('/^\/articles\/?$/', $request->pathInfo())) {
    $controller = new ArticlesController();
    $controller->showAllArticles();
  }

  //ajout article 
  // /articles/create
  else if (preg_match('/^\/articles\/create\/?$/', $request->pathInfo())) {
    $controller = new ArticlesController();
    $controller->save($_POST);
  }

  // ajout user
  // /users
  else if (preg_match('/^\/users\/save\/?$/',$request->pathInfo())) {
    $controller = new UsersController();
    $controller->save($_POST);
    header('Location: /signin');
  }

  //connexionUser
  else if (preg_match('/^\/users\/signin\/?$/',$request->pathInfo())) {
    $controller = new UsersController();
    $email = $_POST['login'];
    $pwd = $_POST['password'];
    if($controller->validForAuth($email,$pwd)){
      $_SESSION['connecte']= true ;
      header('Location: /articles');
      exit();
    }
    else{
      $_SESSION['connecte']= false ;
      header('Location: /signin');
      exit();
    }
  }

  // recherche article
  else if(preg_match('/^\/articles\/?$/',$request->pathInfo())){
    $controller = new ArticlesController();
    $controller->searchArticle();
  }

  // modifier un article
  // /articles/update
  else if(preg_match('/^\/articles\/edit\/(\d+)\/?$/',$request->pathInfo(),$preg_match_results) ){

  }

  // /tags 
  else if (preg_match('/^\/tags\/?$/', $request->pathInfo())) {
    $controller = new TagsController();
    $controller->showAllTags();
  }  

  else if(preg_match('/^\/users\/edit\/?$/',$request->pathInfo(),$preg_match_results) ){
    $controller = new UsersController();
    $controller->update($_POST);
    $id = $_POST['id'];
    header("Location: /users/$id");
   }
}
    

else if($request->method()== "DELETE"){

  // supprimer un article
  // /articles/delete/{id}
  if(preg_match('/^\/articles\/delete\/(\d+)\/?$/',$request->pathInfo(),$preg_match_results)){
    $id = $preg_match_results[1];
    $controller = new ArticlesController();
    $controller->delete($id);
  }

  // supprimer un user
  // /users/delete/{id}
  else if(preg_match('/^\/users\/delete\/(\d+)\/?$/',$request->pathInfo(),$preg_match_results) ){
        $id = $preg_match_results[1];
        $controller = new ArticlesController();
        $controller->delete($id);
      }

    }
    
  
  


 


