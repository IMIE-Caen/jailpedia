<div class="form_article">
  <h2>Modification d'un article</h2>
  <form class="form-vertical" method="POST" action="/articles/edit">
    <div class="form-group">
      <label>Titre</label>
      <input class="form-control" type="text" name="title" value="<?= $article->getTitle(); ?>" />
    </div>
    <div class="form-group">
      <label>Texte</label>
      <textarea name="texte" class="form-control" rows="15"><?= $article->getText(); ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $article->getId(); ?>" />
    <button type="submit" class="btn btn-default">Enregister</button>
  </form>
</div>

