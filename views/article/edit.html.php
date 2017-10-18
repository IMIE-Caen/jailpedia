<div class="form_article">
  <form class="form-vertical" method="POST" action="/articles/edit">
    <h1>Modification d'un article</h1>
    <div class="form-group">
      <label>Titre</label>
      <input class="form-control" type="text" name="title" value="<?= $article->getTitle(); ?>" />
    </div>
    <div class="form-group">
      <label>Texte</label>
      <textarea name="texte" class="form-control" rows="15"><?= $article->getText(); ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $article->getId(); ?>" />
    <div class="boutonAction">
      <input type="submit"  class="btn btn-default" value="Enregistrer" />
    </div>
  </form>
</div>

