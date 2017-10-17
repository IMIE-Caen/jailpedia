<?php
//require_once ("../../Model/Article.php");
$article = new Article();
$article->setTitle("Titre 1");
$article->setText("Mon article 1");
$articles = [$article];
?>
<div class="listArticle">
<?php foreach ($articles as $article) { ?>
    <div class="article">
      <h2><?= $article->getTitle(); ?></h2>
      <div class="article-text"><?= $article->getText(); ?></div>
    </div>
    <?php } ?>
</div>

