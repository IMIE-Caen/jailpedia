<div class="listArticle">
<?php
  if(count($articleModifs)==0) {
    echo  "Aucune modification pour cet article! " ;
  } else { ?>
    <h1>Historique des modificications de l'article <?= $articleModifs[0]->getArticle()->getTitle() ; ?></h1>
    <?php foreach ($articleModifs as $histoArticle) { ?>
    <div class="article">
        <h2> Titre : <?= $histoArticle->getNewTitle(); ?></h2>
       	<div class="description"><?= $histoArticle->getNewText(); ?></div>
        <div>Modifié le  : <?= $histoArticle->getDateModif(); ?> par <?= $histoArticle->getUser()->getFirstname(); ?></div>
    </div>
      <?php
        if(isset($_SESSION['connecte']) ) { ?>
          <div class="bottom">
            <a href="#" class="voir" title="Retour version">Retourner à cette version</a>
          </div>
      <?php } ?>
  <?php }} ?>
</div>
