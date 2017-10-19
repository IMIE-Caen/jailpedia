<div class="form_article">
  <form action="/articles/create" class="form-vertical" method="post" enctype="multipart/form-data">
    <h1>Créer un article</h1>
    <div class="form-group">
      <label for="titre">Titre :</label>
      <input type="text" class="form-control" id="titre" placeholder="Entrer un titre" name="titre">
    </div>
    <div class="form-group">
      <label for="texte">Texte de l'article:</label>
      <textarea class="form-control" rows="15" id="texte" name="texte"></textarea>
    </div>
      <div class="form-group">
          <label for="image">Image :</label>
          <input type="file" class="form-control" id="image" name="image" accept="image/x-png,image/gif,image/jpeg">
      </div>
    <div class="form-group">
      <div class="Tags">
        <label for="tags">Tags</label>
        <select id="tags" style="width: 100%;" class="select2-single" name="tags[]" multiple="multiple">
          <?php include ("views/tag/select.html.php"); ?>
        </select>
      </div>
    </div>
    <div class="boutonAction">
      <input type="submit"  class="btn btn-default" value="Enregistrer" />
    </div>
  </form>
</div>
