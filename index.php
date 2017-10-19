<?php

session_start();

ini_set('display_errors', 'On');
include_once 'PDO.php';

function __autoload($className) {
  if (file_exists($className . '.php')) {
    require_once $className . '.php';
    return true;
  } else if (file_exists("./controllers/" . $className . '.php')) {
    require_once "./controllers/" . $className . '.php';
    return true;
  } else if (file_exists("./Model/" . $className . '.php')) {
    require_once "./Model/" . $className . '.php';
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
$PDO = new SQLitePDO();
$PDO->bdd();
$preg_match_results = [];


$router = Router::getInstance();

// home

$router->get('getHome', '/^\/$/', function($request){
  (new HomeController())->render();
});



// articles
$router->get('showArticle', '/^\/articles\/(?<id>\d+)\/?$/',
  function($request){
    $id = $request->routerParams['id'];
    (new ArticlesController())->show($id);
});
$router->post('createArticle', '/^\/articles\/create\/?$/',
  function($request){ (new ArticlesController())->save($_POST);  }
);
$router->get('indexArticles', '/^\/articles\/?$/',
  function($request){ (new ArticlesController())->showAllArticles(); }
);
$router->get('newArticle', '/^\/articles\/new\/?$/',
  function($request){ (new ArticlesController())->create();  }
);
$router->get('editArticle', '/^\/articles\/edit\/(?<id>\d+)\/?$/',
  function($request){
    $id = $request->routerParams['id'];
    (new ArticlesController())->edit($id);
});
$router->post('updateArticle', '/^\/articles\/edit\/?$/',
  function($request){
    $id = $_POST['id'];
    (new ArticlesController())->update($_POST);
    header("Location: /articles/$id");
});
$router->post('searchArticle', '/^\/articles\/search\/?$/',
  function($request){ (new ArticlesController())->search($_POST); }
);
$router->delete('deleteArticle','/^\/articles\/delete\/(\d+)\/?$/',
  function($request){
    $id = $request->routerParams['id'];
    (new ArticlesController())->delete($id);
});






// users

$router->get('showUser', '/^\/users\/(?<id>\d+)\/?/',
  function($request){
    $id = $request->routerParams['id'];
    (new UsersController())->show($id);
});
$router->post('updateUser', '/^\/users\/edit\/?/',
  function($request){
    (new UsersController())->update($_POST);
    $id = $_POST['id'];
    header("Location: /users/$id");
});
$router->post('createUser', '/^\/users\/save\/?/',
  function($request){
    (new UsersController())->save($_POST);
    header("Location: /signin");
});
$router->get('showUser', '/^\/users\/edit\/(?<id>\d+)\/?/',
  function($request){
    $id = $request->routerParams['id'];
    (new UsersController())->edit($id);
});

$router->delete('deleteUser', '/^\/users\/edit\/(?<id>\d+)\/?/',
  function($request){
    $id = $request->routerParams['id'];
    (new ArticlesController())->delete($id);
});


// tags

$router->get('showTag', '/^\/tags\/(?<id>\d+)\/?/',
  function($request){
    $id = $request->routerParams['id'];
    (new TagsController())->show($id);
});
$router->get('indexTags', '/^\/tags\/?/',
  function($request){ (new TagsController())->showAllTags(); }
);


// session


$router->get('newRegistration','/^\/signup\/?$/', function($request) {
  (new UsersController())->signUp();
});
$router->get('newSession','/^\/signin\/?$/', function($request) {
  (new UsersController())->signIn();
});
$router->post('createSession', '/^\/users\/signin\/?$/',
  function($request){
    $controller = new UsersController();
    $email = $_POST['login'];
    $pwd = $_POST['password'];
    if($controller->validForAuth($email,$pwd)){
      $_SESSION['connecte'] = true ;
      $_SESSION['role'] = $controller->RoleUser($email,$pwd);
      header('Location: /articles');
    } else {
      //$_SESSION['connecte'] = false;
      header('Location: /signin');
    }


});

$router->get('destroySession', '/^\/logout\/?$/', function($request){
  $_SESSION['connecte'] = false;
  session_destroy();
  header('Location: /');
});


$router->get('gestionUsers', '/^\/gestion\/users\/?$/', function($request){
  (new GestionController())->GestionUsers();
});
$router->get('gestionDeleteUsers', '/^\/gestion\/users\/(\d+)\/?$/', function($request){
  $id = $request->routerParams[1];
  (new User())->deleteUser($id);
  header("location:" . $_SERVER['HTTP_REFERER']);
});

$router->get('gestionArticles', '/^\/gestion\/articles\/?$/', function($request){
  (new GestionController())->GestionArticles();
});

$router->get('deleteTag', '/^\/gestion\/articles\/(\d+)\/?$/', function($request){
  $id = $request->routerParams[1];
  (new Tag())->deleteTag($id);
  header("location:" . $_SERVER['HTTP_REFERER']);
});





if($router->dispatch($request))
  exit(0);

ob_start();
include("./views/404.html.php");
$page_content = ob_get_clean();
header("HTTP/1.0 404 Not Found");
include("./views/layout.html.php");
