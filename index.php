<?php
ini_set('display_errors', 'On');


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

