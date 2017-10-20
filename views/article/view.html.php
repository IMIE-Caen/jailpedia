<?php
  $image = Article::getImage($article->getId());
 ?>
<div class="article-view">
  <?php if (isset($_SESSION['connecte'])) { ?>
    <a href="/articles/edit/<?= $article->getId(); ?>" title="Editer cet article">Editer cet article</a>
  <?php } ?>
  <h1><?= $article->getTitle(); ?></h1>
  <div class="container">
    <div class="row">
      <?php if ($image != "") { ?>
      <div class="col-4 imgContainer">
        <img class="img-thumbnail" src="../../images/articles/<?= Article::getImage($article->getId()) ?>" />
      </div>
      <?php } ?>
      <div class="col-<?= $image != "" ? "8":"12" ?> description"><?= $article->getText(); ?></div>
    </div>
  </div>
  <div class="informations">
    <h2>Informations sur cet article</h2>
    <?php if (isset($_SESSION['connecte'])) { ?>
      <form action="/articles/<?= $article->getId() ?>" method="post">
        <div class="leform">
          <label for="note">Noter cet article : </label>
          <select name="note" id="note">
          <?php for($i = 0; $i <= 10; $i++) { ?>
            <option value="<?= $i; ?>"><?= $i; ?></option>
          <?php } ?>
          </select>
          / 10
          <input type="submit" class="voir" value="Noter" />
        </div>
      </form>
    <?php } ?>
    <div>
      <span>Contributeurs :</span>
      <?php if(!($nbContrib = count($contribs))) { ?>Aucun contributeur connu<?php } else { ?>
        <?php
          $i = 1;
          foreach ($contribs as $contrib) {
        ?>
            <a href="/users/<?= $contrib->getId(); ?>"><?= $contrib->getFirstname(); ?> <?= $contrib->getLastname(); ?><a><?= $i < $nbContrib ? ", ":""; ?>
        <?php
            $i++;
          }
        ?>
      <?php } ?>
    </div>
    <div>Note : <?= $note != NULL ? round($note, 1) . " / 10" : "Cet article n'a pas encore été noté."; ?></div>
    <?php if(count($tags)) { ?>
      <div> Tags :
          <?php foreach ($tags as $tag) { ?>
              <a href="/tags/<?= $tag->getId(); ?>"><?= $tag->getName(); ?><a> &nbsp;
          <?php } ?>
      </div>
    <?php } ?>
  </div>


  <div> Voir les dernières modifications

 <a href="/articles/history/<?= $article->getId(); ?>">Voir <a> &nbsp;

  </div>
</div>
