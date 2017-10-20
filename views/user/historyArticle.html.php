<div class="listArticle">
  <h1>Liste des articles</h1>

  <?php
  if(sizeof($articleModifs)==0) {

   echo  "Aucun articles en base ! " ;

 } else {

   foreach ($articleModifs as $article) { ?>
    <div class="article">
      <h2><a href="/articles/<?= $article->getId(); ?>" title="<?= $article->getTitle(); ?>"><?= $articleModifs->getTitle(); ?></a></h2>
      <div class="article-text"><?= $articleModifs->getArticle()->getText(); ?></div>
      <div class="bottom">
        <a href="/articles/<?= $article->getId(); ?>" class="voir" title="<?= $article->getTitle(); ?>">Lire la suite</a>
      </div>
    </div>
  <?php }} ?>
</div>