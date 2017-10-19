<form id="form-ajout-tag" method="POST" action="/tag/add">
  <label for="tag">Nom du tag</label>
  <input type="text" class="form-control" id="tag" placeholder="Enter Tag" name="tag">
  <input class="btn btn-default" type="submit" value="Ajouter" />
</form>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tags as $tag) { ?>
      <?php include("./views/tag/line.html.php"); ?>
    <?php } ?>
  </tbody>
</table>
