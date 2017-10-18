<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 14:44
 */

require_once('Model/Article.php');
require_once('Model/User.php');
require_once('Model/Contribution.php');
require_once('Model/Evaluation.php');
require_once('Model/Tag.php');
require_once('Model/Categorisation.php');
require_once('PDO.php');
require_once('controllers/UsersController.php');

//$ajout = Article::createArticle("Fleury Merogis","C'est un article sur Fleury Merogis");
//$createuser = User::createUser("Thibault","Lemesle","20-10-2017","tlemesle@gmail.com","tlua1994");
//$createuser = User::createUser("Valentin","Gallien","20-10-2017","valentin.gallien@imie.fr","toto");
//$createuser = User::createUser("Cindy","Castel","20-10-2017","cindy.castel@imie.fr","toto");
//$createuser = User::createUser("Benjamin","Aubert","20-10-2017","benjamin.aubert@imie.fr","toto");

//$createtag = Tag::createTag("Prisons d'Europe");
$articles = Article::fetchAll();
//$contribution = Contribution::setContribution(1,1);
//$contribution = Contribution::getContributionByArticle(1);
//$contribution = Contribution::getContributionByUser(1);

foreach ($articles as $txt){
    echo $txt->getId().' : '.$txt->getTitle() ."\n";
}

$test = Article::getArticleById(1);
foreach ($test as $item) {
    echo $item->getTitle();
}

//$test = Categorisation::addTagToArticle(1,1);
//$test = Evaluation::addEvaluationToArticle(1,1,5);
//$test = Evaluation::addEvaluationToArticle(1,2,7);
//$test = Evaluation::addEvaluationToArticle(1,3,2);
//$test = Evaluation::addEvaluationToArticle(1,4,9);
$test = Evaluation::getAverageNoteArticle(1);
echo "Note moyenne pour l'article : ". $test."\n";
$test = Evaluation::getUserNoteArticle(1,1);
echo "Note du user : ".$test;
$controleur = new UsersController();
$controleur->validForAuth("valentin.gallien@imie.fr","toto");
//$test1 = Article::updateArticle("Guantanamo","Article sur Guantanamo",1);
