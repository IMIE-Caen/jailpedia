<?php


ini_set('display_errors', 'On');
include_once 'PDO.php';
include_once 'autoload.php';

session_start();

$request = new MyHttp();
$PDO = new SQLitePDO();
$PDO->bdd();

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

$router->post('addNoteArticle','/^\/articles\/(?<id>\d+)\/?$/',
    function ($request){
    $id = $request->routerParams['id'];
    (new NotationController())->addNote($_SESSION['userConnect']->getId(),$id,$_POST["note"]);
});

$router->post('createArticle', '/^\/articles\/create\/?$/',
  function($request){ (new ArticlesController())->save($_POST);
  header("Location: /articles");  }
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
$router->get('showUser', '/^\/users\/(\d+)\/?$/',
  function($request){
    $id = $request->routerParams[1];
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
$router->get('editUser', '/^\/users\/edit\/(?<id>\d+)\/?/',
  function($request){
    $id = $request->routerParams['id'];
    (new UsersController())->edit($id);
});

$router->delete('deleteUser', '/^\/users\/delete\/(?<id>\d+)\/?/',
  function($request){
    $id = $request->routerParams['id'];
    (new UsersController())->delete($id);
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


$router->post('createTag','/^\/tag\/add\/?$/', function($request){
  (new TagsController())->add($_POST["tag"]);
});

$router->post('deleteTag','/^\/tag\/delete\/(\d+)\/?$/', function($request){
  $id = $request->routerParams['id'];
  (new TagsController())->delete($id);
});

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
      //$_SESSION['role'] = $controller->UserConnect($email,$pwd);
      $_SESSION['userConnect'] = $controller->UserConnect($email,$pwd);
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

$router->post('gestionUpdateUser','/^\/gestion\/users\/update\/?$/', function($request){
  $id = $request->routerParams[1];
  (new UsersController())->update($_POST);
  header("location:" . $_SERVER['HTTP_REFERER']);
});
$router->get('gestionDeleteUsers', '/^\/gestion\/users\/(\d+)\/?$/', function($request){
  $id = $request->routerParams[1];
  (new UsersController())->deleteUser($id);
  header("location:" . $_SERVER['HTTP_REFERER']);
});

$router->get('gestionArticles', '/^\/gestion\/articles\/?$/', function($request){
  (new GestionController())->GestionArticles();
});
$router->get('gestionDeleteArticles', '/^\/gestion\/articles\/delete\/(\d+)\/?$/', function($request){
  $id = $request->routerParams[1];
  (new ArticlesController())->delete($id);
  header("location:" . $_SERVER['HTTP_REFERER']);
});

$router->get('gestionTags', '/^\/gestion\/tags\/?$/', function($request){
  (new GestionController())->GestionTags();
});

$router->get('deleteTag', '/^\/gestion\/tags\/delete\/(\d+)\/?$/', function($request){
  $id = $request->routerParams[1];
  (new TagsController())->deleteTag($id);
  header("location:" . $_SERVER['HTTP_REFERER']);
});

$router->get('newTag','/^\/gestion\/tags\/create\/?$/', function($request){
  $name = $preg_match_results[1];
  (new TagsController())->createTag($name);
  header("location:" . $_SERVER['HTTP_REFERER']);
});


// historique modif 
$router->get('historiqueArticle','/^\/articles\/history\/(\d+)\/?$/', function($request){
  $id = $request->routerParams[1];
  (new ArticlesController())->historyArticle($id);
 
});

if($router->dispatch($request))
  exit(0);

ob_start();
include("./views/404.html.php");
$page_content = ob_get_clean();
header("HTTP/1.0 404 Not Found");
include("./views/layout.html.php");
