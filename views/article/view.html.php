<h1><?= $article->getTitle(); ?></h1>
<p>Note :<?= $note ?> /10</p>
<p><?= $article->getText(); ?></p>
<img src="../../images/articles/<?= Article::getImage($article->getId()) ?>" />