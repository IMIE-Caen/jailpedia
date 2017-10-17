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
require_once('PDO.php');


$tag = new Tag();
$tag->setName("Prisons célèbres");

$article = new Article();
$article->setTitle("Alcatraz");
$article->setText("Ceci est un texte sur Alcatraz");
$article->setTag($tag);

$user1 = new User();
$user1->setFirstname("Bernard");
$user1->setLastname("Lavilliers");
$user1->setDob("20/10/1967");
$user1->setEmail("brouette@aol.fr");

$user2 = new User();
$user2->setFirstname("Francky");
$user2->setLastname("Vincent");
$user2->setDob("20/10/1967");
$user2->setEmail("azerty@aol.fr");

$contribution = new Contribution($user1,$article);
$contribution->setUser($user1);
$contribution->setArticle($article);

$username = $contribution->getUser();
$text = $contribution->getArticle();

$eval = new Evaluation($article,2,$user2);
$eval->setArticle($article);
$eval->setNote(2);
$eval->setUser($user2);

echo 'Contribution de '.$username->getFirstname() .' '. $username->getLastname().' sur l\'article '.$text->getTitle();
echo "\n";
echo ''.$eval->getUser()->getFirstname() .' '.$eval->getUser()->getLastname() .' a mis la note de '.$eval->getNote() .' pour l\'article '.$eval->getArticle()->getTitle();
echo "\n";
/****************************************/
//$ajout = Article::createArticle("Fleury Merogis","C'est un article sur Fleury Merogis");

$articles = Article::fetchAll();
var_dump($articles);
foreach ($articles as $txt){
    echo $txt->getId().' : '.$txt->getTitle() ."\n";
}

$test = Article::getArticleById(1);
foreach ($test as $item) {
    echo $item->getTitle();
}

$test1 = Article::updateArticle("Guantanamo","Article sur Guantanamo",1);
$test2 = Article::deleteArticle(1);
