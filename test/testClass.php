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
require_once ('../PDO.php');


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
$db = new PDO('sqlite:../JailPedia.sqlite');
//Activer les exceptions
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'INSERT INTO ARTICLES (title, text) values(:TITRE,:TEXTE)';
$stmt = $db->prepare($sql);
$P = array('TITRE' => 'Guantanamo','TEXTE'=>'Coucou');
//Executer la requete
$stmt->execute($P);
$sql = 'INSERT INTO ARTICLES (title, text) values(:TITRE,:TEXTE)';
$stmt = $db->prepare($sql);
$P = array('TITRE' => 'Alcatraz','TEXTE'=>'Coucou');
//Executer la requete
$stmt->execute($P);
$stmt->closeCursor();


$articles = Article::fectchAll();
foreach ($articles as $txt){
    echo $txt->getId().' : '.$txt->getTitle() ."\n";
}

$test = Article::getArticleById(1);
foreach ($test as $item) {
    echo $item->getTitle();
}

