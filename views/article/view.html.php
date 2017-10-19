<h1><?= $article->getTitle(); ?></h1>
<p><?= $article->getText(); ?></p>
<img src="../../images/articles/<?= Article::getImage($article->getId()) ?>" />