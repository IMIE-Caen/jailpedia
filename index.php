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
  } else if (file_exists("./tools/" . $className . '.php')) {
    require_once "./tools/" . $className . '.php';
    return true;
  } else {
    return false;
  }
}

$request = new MyHttp();
$PDO = new SQLitePDO();
$PDO->bdd();
$preg_match_results = [];

if ($request->pathInfo() == "/") {
  $controller = new HomeController();
  $controller->render();
}

/* * *********
 * GET
 * ********* */ 
else if ($request->method() == "GET") {

  /**
   *  Affichage d'un article
   *  url = /articles/{id}
   */
  if (preg_match('/^\/articles\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new ArticlesController();
    $controller->show($id);
  }

  /**
   * Affichage d'un utilisateur
   * url = /users/{id}
   */ 
  else if (preg_match('/^\/users\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new UsersController();
    $controller->show($id);
  }

  /**
   * Affichage d'un tag
   * url = /tags/{id}
   */
  else if (preg_match('/^\/tags\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new TagsController();
    $controller->show($id);
  }

  /**
   * Affiche la liste des articles
   * url = /articles
   */
  else if (preg_match('/^\/articles\/?$/', $request->pathInfo())) {
    $controller = new ArticlesController();
    $controller->showAllArticles();
  }

  /**
   * Affiche le formulaire de création d'un article
   * url = /articles/new
   */
  else if (preg_match('/^\/articles\/new\/?$/', $request->pathInfo())) {
    $controller = new ArticlesController();
    $controller->create();
  }
  /**
   * Gestion des users
   * url = /gestion/users
   */
  else if (preg_match('/^\/gestion\/users\/?$/', $request->pathInfo())) {
    $controller = new GestionController();
    $controller->GestionUsers();
  }
  else if (preg_match('/^\/gestion\/users\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new User();
    $controller->deleteUser($id);
    header("location:" . $_SERVER['HTTP_REFERER']);
  }
  else if (preg_match('/^\/gestion\/articles\/?$/', $request->pathInfo())) {
    $controller = new GestionController();
    $controller->GestionArticles();
  }
  else if (preg_match('/^\/gestion\/articles\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new Article();
    $controller->deleteArticle($id);
    header("location:" . $_SERVER['HTTP_REFERER']);
  }
  else if (preg_match('/^\/gestion\/tags\/?$/', $request->pathInfo())) {
    $controller = new GestionController();
    $controller->GestionTags();
  }
  else if (preg_match('/^\/gestion\/tags\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new Tag();
    $controller->deleteTag($id);
    header("location:" . $_SERVER['HTTP_REFERER']);
  }

  /**
   * Affiche le formulaire d'édition d'un article
   * url = /articles/edit/{id}
   */
  else if (
          preg_match('/^\/articles\/edit\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new ArticlesController();
    $controller->edit($id);
  }

  /**
   * Affiche la liste des tags
   * url = /tags
   */
  else if (preg_match('/^\/tags\/?$/', $request->pathInfo())) {
    $controller = new TagsController();
    $controller->showAllTags();
  }

  /**
   * Affiche le formulaire d'inscription
   * url = /signup
   */
  else if (preg_match('/^\/signup\/?$/', $request->pathInfo())) {
    $controller = new UsersController();
    $controller->signUp();
  }

  /**
   * Affiche le formulaire de connexion
   * url = /signin
   */
  else if (preg_match('/^\/signin\/?$/', $request->pathInfo())) {
    $controller = new UsersController();
    $controller->signIn();
  }

  /**
   * Affiche le formulaire de recherche d'un article
   * url = /articles/search
   */
  /* else if (preg_match('/^\/articles\/search\/?$/', $request->pathInfo())) {
    $controller = new ArticlesController();
    $controller->search();
    } */

  /**
   * Déconnecte un utilisateur
   * url = /logout
   */
  else if (preg_match('/^\/logout\/?$/', $request->pathInfo())) {
    $_SESSION['connecte'] = false;
    session_destroy();
    header('Location: /');
    exit();
  }

  /**
   * Affiche le formulaire d'édition d'un utilisateur
   * url = /users/edit/{id}
   */
  else if (
    preg_match('/^\/users\/edit\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new UsersController();
    $controller->edit($id);
  }

  /**
   * Suppression d'un tag
   * url = /tag/delete/{id}
   */
  else if (preg_match('/^\/tag\/delete\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new TagsController();
    $controller->delete($id);
  }

  /**
   * Si aucune route ne correspond on envoie une 404
   */
  else {
    ob_start();
    include("./views/404.html.php");
    $page_content = ob_get_clean();
    header("HTTP/1.0 404 Not Found");
    include("./views/layout.html.php");
  }
}

/* * *********
 * POST
 * ********* */ 
else if ($request->method() == "POST") {

  /**
   * Ajoute un article
   * url = /articles/create
   */
  if (preg_match('/^\/articles\/create\/?$/', $request->pathInfo())) {
    $controller = new ArticlesController();
    $controller->save($_POST);
  }

  /**
   * Enregistre un utilisateur
   * url = /users/save
   */
  else if (preg_match('/^\/users\/save\/?$/', $request->pathInfo())) {
    $controller = new UsersController();
    $controller->save($_POST);
    header('Location: /signin');
  }

  /**
   * Connexion d'un utilisateur
   * url = /users/signin
   */
  else if (preg_match('/^\/users\/signin\/?$/', $request->pathInfo())) {
    $controller = new UsersController();
    $email = $_POST['login'];
    $pwd = $_POST['password'];
    if ($controller->validForAuth($email, $pwd)) {
      $_SESSION['connecte'] = true;
      $_SESSION['role'] = $controller->RoleUser($email, $pwd);
      header('Location: /articles');
      exit();
    } else {
      //$_SESSION['connecte'] = false;
      header('Location: /signin');
      exit();
    }
  }

  /**
   * Edition d'un article
   * url = /artiles/edit
   */
  else if (preg_match('/^\/articles\/edit\/?$/', $request->pathInfo(), $preg_match_results)) {
    $controller = new ArticlesController();
    $controller->update($_POST);
    $id = $_POST['id'];
    header("Location: /articles/$id");
  }

  /**
   * Recherche un article
   * url = /articles
   */
  else if (preg_match('/^\/articles\/search\/?$/', $request->pathInfo())) {
    $controller = new ArticlesController();
    $controller->search($_POST);
  }

  /**
   * Edition d'un utilisateur
   * url = /users/edit
   */
  else if (preg_match('/^\/users\/edit\/?$/', $request->pathInfo(), $preg_match_results)) {
    $controller = new UsersController();
    $controller->update($_POST);
    $id = $_POST['id'];
    header("Location: /");
  }

  /**
   * Ajout d'un tag
   * url = /tag/add
   */
  else if (preg_match('/^\/tag\/add\/?$/', $request->pathInfo(), $preg_match_results)) {
    $controller = new TagsController();
    $controller->add($_POST["tag"]);
  }
}

/* * *********
 * DELETE
 * ********* */
else if ($request->method() == "DELETE") {

  /**
   * Supprime un article
   * url = articles/delete/{id}
   */
  if (preg_match('/^\/articles\/delete\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
    $id = $preg_match_results[1];
    $controller = new ArticlesController();
    $controller->delete($id);
  }
}


/**
 * Supprime un utilisateur
 * url = /users/delete/{id}
 */
else if (preg_match('/^\/users\/delete\/(\d+)\/?$/', $request->pathInfo(), $preg_match_results)) {
  $id = $preg_match_results[1];
  $controller = new ArticlesController();
  $controller->delete($id);
}
