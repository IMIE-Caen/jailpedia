<div class="listArticle">
<?php foreach ($articles as $article) { ?>
    <div class="article">
      <h2><?= $article->getTitle(); ?></h2>
      <div class="article-text"><?= $article->getText(); ?></div>
    </div>
    <?php } ?>
</div>

