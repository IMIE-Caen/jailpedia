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
  } else{
      return false;
  }

}

$request = new MyHttp();
$PDO     = new SQLitePDO();
$PDO->bdd();
$preg_match_results = [];

/*exemple requete SQLitePDO


$sql = 'SELECT * FROM ARTICLES';
$stmt = $PDO->bdd()->prepare($sql);
$stmt->execute();
//extaire les données
$articles_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
//Parcourir la liste des membres
foreach ($articles_list as $row) {
echo 'Identifiant'.$row['ID'].' Titre '.$row['TITRE']."<br />";
}*/


if ($request->pathInfo() == "/") {

  $controller = new HomeController();
  $controller->render();
}


else if ($request->method() == "GET") {
// /articles/12345
  if (
    preg_match('/^\/articles\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {


    $id = $preg_match_results[1];
    $controller = new ArticlesController();
    $controller->show($id);
  }


// /users/toto
  elseif (preg_match('/^\/users\/(\w+)\/?$/',
    $request->pathInfo(),
    $preg_match_results)) {

    $id = $preg_match_results[1];
  $controller = new UsersController();
  $controller->show($id);
}

// /tags/{id}
elseif (preg_match('/^\/tags\/(\d+)\/?$/',
  $request->pathInfo(),
  $preg_match_results)) {
  $id = $preg_match_results[1];
$controller = new TagsController();
$controller->show($id);
}
// recuperer les articles
// /articles
else if(
  preg_match('/^\/articles\/?$/',
    $request->pathInfo())){
  $controller = new ArticlesController();
  $controller->showAllArticles();
}
else if(
  preg_match('/^\/articles\/new\/?$/',
    $request->pathInfo())){
  $controller = new ArticlesController();
  $controller->create();
}
// /tags
else if (preg_match('/^\/tags\/?$/',
  $request->pathInfo())) {
  $controller = new TagsController();
$controller->showAllTags();

}

//inscription
// /signup
elseif (preg_match('/^\/signup\/?$/',
  $request->pathInfo())) {
  $controller = new UsersController();
  $controller->signUp();
}

//connexion
// /signin
else if (preg_match('/^\/signin\/?$/',
  $request->pathInfo()) ) {
  $controller = new UsersController();
$controller->signIn();
}

//formulaire recherche article
else if (preg_match('/^\/articles\/search\/?$/',
  $request->pathInfo())) {
  $controller = new ArticlesController();
$controller->search();
}


// /users/123
elseif (preg_match('/^\/users\/(\w+)\/?$/', $request->pathInfo(), $preg_match_results)) {

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
  else if (preg_match('/^\/logout\/?$/',
    $request->pathInfo())) {
    $_SESSION['connecte']= false ;
    header('Location: /');
      exit();
    }
}

// si méthode HTTP est POST
else if($request->method()== "POST"){

//ajout article
// /articles

  if(
    preg_match('/^\/articles\/?$/',
      $request->pathInfo())){
    $controller = new ArticlesController();}

    else if (
      preg_match('/^\/articles\/?$/', $request->pathInfo())) {
      $controller = new ArticlesController();
      $controller->showAllArticles();
    }

//ajout article 
// /articles/create
    else if (
      preg_match('/^\/articles\/create\/?$/', $request->pathInfo())) {
      $controller = new ArticlesController();
      $controller->save();
          }

// ajout user


// /users
    else if (preg_match('/^\/users\/save\/?$/',
      $request->pathInfo())) {
      $controller = new UsersController();
      $controller->save($_POST);
      header('Location: /signin');
  }

//connexionUser
  else if (preg_match('/^\/users\/signin\/?$/',
    $request->pathInfo())) {
    $controller = new UsersController();
    $email = $_POST['login'];
    $pwd = $_POST['password'];
    if($controller->validForAuth($email,$pwd)){
      $_SESSION['connecte']= true ;
      header('Location: /articles');
      exit();
    }else{
      $_SESSION['connecte']= false ;
      header('Location: /signin');
      exit();
    }
  }

  }

// recherche article
else if(
  preg_match('/^\/articles\/?$/',
    $request->pathInfo())){
  $controller = new ArticlesController();
  $controller->searchArticle();

}



elseif($request->method()== "PATCH"){

  // modifier un article
  // /articles/update
    if(
      preg_match('/^\/articles\/edit\/(\d+)\/?$/',
        $request->pathInfo(),
        $preg_match_results) ){}

  // /tags 
      else if (preg_match('/^\/tags\/?$/', $request->pathInfo())) {
        $controller = new TagsController();
        $controller->showAllTags();
      }
  } 

  elseif ($request->method() == "PATCH") {

  // modifier un article 
  // /articles/update 
      if (
        preg_match('/^\/articles\/edit\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {

        $id = $preg_match_results[1];
        $controller = new ArticlesController();
        $controller->edit($id);
      }


      else if(
        preg_match('/^\/users\/edit\/(\w+)\/?$/',
          $request->pathInfo(),
          $preg_match_results) ){
        $id = $preg_match_results[1];
        $controller = new ArticlesController();
        $controller->edit($id);

      }

    }

    elseif($request->method()== "DELETE"){

  // supprimer un article
  // /articles/delete/{id}
      if(
        preg_match('/^\/articles\/delete\/(\d+)\/?$/',
          $request->pathInfo(),
          $preg_match_results) ){
        $id = $preg_match_results[1];
        $controller = new ArticlesController();
        $controller->delete($id);

      }

  // supprimer un user
  // /users/delete/{id}
      else if(
        preg_match('/^\/users\/delete\/(\d+)\/?$/',
          $request->pathInfo(),
          $preg_match_results) ){
        $id = $preg_match_results[1];
        $controller = new ArticlesController();
        $controller->delete($id);

      }

    }
  
  else{
    var_dump("toto");
    header("HTTP/1.0 404 Not Found");
    echo file_get_contents("./views/404.html.php");
    echo "La page n'existe pas";
  }

 


