<?php
ini_set('display_errors', 'On');

include_once("./PDO.php");

$sql = 'SELECT * FROM ARTICLES';
$stmt = $db->prepare($sql);
$stmt->execute();
//extaire les données
$articles_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
//Parcourir la liste des membres
foreach ($articles_list as $row) {
    echo 'Identifiant'.$row['ME_ID'].'Nom'.$row['ME_NAME']."<br />";
}
echo "<br />";
$sql = 'SELECT * FROM USERS';
$stmt = $db->prepare($sql);
$stmt->execute();
//extaire les données
$users_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
//Parcourir la liste des membres
foreach ($users_list as $row) {
    echo 'Identifiant'.$row['ME_ID']. 'Prenom '.$row['ME_NAME'].' Nom '.$row['ME_LASTNAME']."<br />";
}


function __autoload($className) {
  if (file_exists($className . '.php')) {
    require_once $className . '.php';
    return true;
  }
  else if (file_exists("./controllers/".$className . '.php')){
    require_once "./controllers/".$className . '.php';
    return true;
  }
  return false; 



}

$request = new MyHttp();
$preg_match_results = [];


if($request->pathInfo() == "/"){

  $controller = new HomeController();
  $controller->render();

}


if ($request->method()== "GET"){
    // /articles/12345
    if(
      preg_match('/^\/articles\/(\d+)\/?$/',
        $request->pathInfo(),
        $preg_match_results) ){
 
      $id = $preg_match_results[1];
      $controller = new ArticlesController();
      $controller->show($id);

    }

    // /users/123
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

} 
// si méthode HTTP est POST 
elseif($request->method()== "GET"){

  // recuperer les articles 
  // /articles
  if(
    preg_match('/^\/articles\/?$/',
      $request->pathInfo())){
   $controller = new ArticlesController();
   $controller->showAllArticles();
  }

   //ajout article 
  // /articles/create
   else if(
    preg_match('/^\/articles\/create\/?$/',
      $request->pathInfo())){
     $controller = new ArticlesController();
    $controller->save();

  }


  // /tags 
   else if (preg_match('/^\/tags\/?$/',
    $request->pathInfo())) {
    $controller = new TagsController(); 
  $controller->showAllTags(); 
}




}

elseif($request->method()== "PATCH"){
  
  // modifier un article 
  // /articles/update 
  if(
    preg_match('/^\/articles\/edit\/(\d+)\/?$/',
      $request->pathInfo(),
      $preg_match_results) ){
    $id = $preg_match_results[1];
    $controller = new ArticlesController();
    $controller->edit($id);

  }



} 



else{
   var_dump("toto");
  header("HTTP/1.0 404 Not Found");
  echo file_get_contents("./views/404.html.php");
  echo "La page n'existe pas";
}
