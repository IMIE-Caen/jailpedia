<div class="content">
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
        <textarea class="form-control" rows="30" id="texte"></textarea>
      </div>
      <div class="form-group">
         <div class="Tags">
             <select class="form-control input-lg select2-single" dir="rtl">
                 <optgroup label="Mountain Time Zone">
                   <option value="AZ">Arizona</option>
                   <option value="CO">Colorado</option>
                </optgroup>
             </select>
         </div>
     </div>
      <button type="submit" class="btn btn-default">Enregister</button>

    </form>
  </div>
</div>


<script>
  $( ".select2-single, .select2-multiple" ).select2( {
  theme: "bootstrap",
  placeholder: "Entrer ou sélectionner un ou plusieurs tags",
  maximumSelectionSize: 6,
  containerCssClass: ':all:'
  } );

  $( ":checkbox" ).on( "click", function() {
  $( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
  });
</script>
