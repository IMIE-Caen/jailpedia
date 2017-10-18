<div class="listArticle">
  <h1>Liste des articles</h1>
  <?php foreach ($articles as $article) { ?>
    <div class="article">
      <h2><a href="/articles/<?= $article->getId(); ?>" title="<?= $article->getTitle(); ?>"><?= $article->getTitle(); ?></a></h2>
      <div class="article-text"><?= $article->getText(); ?></div>
      <div class="bottom">
        <a href="/articles/<?= $article->getId(); ?>" class="voir" title="<?= $article->getTitle(); ?>">Lire la suite</a>
      </div>
    </div>
  <?php } ?>
</div>

