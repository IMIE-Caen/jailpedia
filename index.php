<?php
ini_set('display_errors', 'On');
include_once("./my_http.php");
include_once("./controllers/HomeController.php");
include_once("./controllers/ArticlesController.php");
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

    $request = new MyHttp();
    $preg_match_results = [];


    if($request->pathInfo() == "/"){

      $controller = new HomeController();
      $controller->render();

    }

    // /articles/12345
    elseif(
        preg_match('/^\/articles\/(\d+)\/?$/',
                    $request->pathInfo(),
                    $preg_match_results) ){

        $id = $preg_match_results[1];
        $controller = new ArticlesController();
        $controller->show($id);

    }
    else{
      header("HTTP/1.0 404 Not Found");
      echo file_get_contents("./views/404.html.php");
      echo "La page n'existe pas";
}

?>
