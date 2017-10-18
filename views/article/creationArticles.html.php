<div class="form_article">
  <form action="/articles/create" class="form-vertical" method="post">
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
      <div class="Tags">
        <select class="form-control input-lg select2-single" dir="rtl">
          <!-- Liste des tags à mettre pus tard -->
        </select>
      </div>
    </div>
    <div class="boutonAction">
      <input type="submit"  class="btn btn-default" value="Enregistrer" />
    </div>
  </form>
</div>
<!--
<script>
  $(".select2-single, .select2-multiple").select2({
    theme: "bootstrap",
    placeholder: "Entrer ou sÃ©lectionner un ou plusieurs tags",
    maximumSelectionSize: 6,
    containerCssClass: ':all:'
  });

  $(":checkbox").on("click", function () {
    $(this).parent().nextAll("select").prop("disabled", !this.checked);
  });
</script>
-->