<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 14:44
 */

require_once('../Model/Article.php');
require_once('../Model/User.php');
require_once('../Model/Contribution.php');
require_once('../Model/Evaluation.php');
require_once('../Model/Tag.php');


$tag = new Tag("Prisons célèbres");
$article = new Article("Alcatraz","Ceci est un article sur Alcatraz",$tag);

$user1 = new User("Bernard","Lavilliers","20/10/1967","brouette@aol.fr");
$user2 = new User("Francky","Vincent","20/10/1967","azerty@aol.fr");


$contribution = new Contribution($user1,$article);

$username = $contribution->getUser();
$text = $contribution->getArticle();

$eval = new Evaluation($article,2,$user2);
echo 'Contribution de '.$username->getFirstname() .' '. $username->getLastname().' sur l\'article '.$text->getTitle();
echo "\n";
echo ''.$eval->getUser()->getFirstname() .' '.$eval->getUser()->getLastname() .' a mis la note de '.$eval->getNote() .' pour l\'article '.$eval->getArticle()->getTitle();
echo "\n";
/****************************************/
$articles = Article::fectchAll();
var_dump($articles);
foreach ($articles as $txt){

}