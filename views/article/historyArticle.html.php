<div class="listArticle">
  

  <?php
 
  if(count($articleModifs)==0) {

   echo  "Aucune modification pour cet article! " ;

 } else { ?>
 <h1>Modificication de l'article <?= $articleModifs[0]->getArticle()->getTitle() ; ?> </h1>
  <?php foreach ($articleModifs as $histoArticle) { ?>

    <div class="article">
      <!-- <h2><?= $histoArticle->getArticle()->getTitle(); ?></h2>
      <div class="article-text"><?= $histoArticle->getArticle()->getText(); ?></div> -->
      
       <h6>Modifié le  : <?= $histoArticle->getDateModif(); ?>  - par <?= $histoArticle->getUser()->getFirstname(); ?> </h6>
       <h6> Titre : <?= $histoArticle->getNewTitle(); ?><h6> 
       	<?= $histoArticle->getNewText(); ?>

      </div>
      <?php

      if(isset($_SESSION['connecte']) ) { ?>
      <div class="bottom">
        <a href="#" class="voir" title=" Retour version ">Retourner à cette version </a>
      </div>

    </div>
    
  <?php }}} ?>
</div>