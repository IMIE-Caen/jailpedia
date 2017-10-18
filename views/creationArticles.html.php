<div class="content">
  <div class="content_article">
    <div class="form_article">
      <h2>créer un article</h2>
      <form action="/articles/new"
            class="form-vertical" method="post">
        <div class="form-group">
          <label for="Titre">Titre:</label> <input type="titre"
                                                   class="form-control" id="titre" placeholder="Entrer un titre" name="titre">
        </div>
        <div class="form-group">
          <label for="texte">Texte de l'article:</label>
          <textarea class="form-control" rows="15" id="texte"></textarea>
        </div>
        <div class="form-group">
        <div class="input-group select2-bootstrap-append">
          <select id="single-append-text" class="form-control select2-allow-clear">
            <optgroup label="Liste des tags">
              <?php
              $PDO = new SQLitePDO();
              $sql = 'SELECT * FROM TAGS';
              $stmt = $PDO->bdd()->prepare($sql);
              $stmt->execute();
              $tags_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
              $stmt->closeCursor();
              foreach ($tags_list as $tag) {
                ?>
                <option value="<?php echo $tag['ID'] ?>"><?php echo $tag['Name']; ?></option>
<?php } ?>
            </optgroup>
          </select>
          <button type="submit" class="btn btn-default" id="add">Add</button>
        </div>
    </div>
    <div class="form-group">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
    <button type="submit" class="btn btn-default">Save</button>
    </form>
  </div>
</div>

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
