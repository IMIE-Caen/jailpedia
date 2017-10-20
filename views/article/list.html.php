<?php
$limit = 1;
$pages = ceil($articlesCount / $limit);

$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
    'options' => array(
        'default'   => 1,
        'min_range' => 1,
    ),
)));

// Calculate the offset for the query
$offset = ($page - 1)  * $limit;

// Some information to display to the user
$start = $offset + 1;
$end = min(($offset + $articlesCount), $articlesCount);

  ?>

<div class="listArticle">
  <h1>Liste des articles</h1>

  <?php
  if(sizeof($articles)==0) {

   echo  "Aucun articles en base ! " ;

 } else {


   foreach ($articles as $article) { ?>
    <div class="article">
      <h2><a href="/articles/<?= $article->getId(); ?>" title="<?= $article->getTitle(); ?>"><?= $article->getTitle(); ?></a></h2>
      <div class="article-text"><?= $article->getText(); ?></div>
      <div class="bottom">
        <a href="/articles/<?= $article->getId(); ?>" class="voir" title="<?= $article->getTitle(); ?>">Lire la suite</a>
      </div>
    </div>
  <?php }} ?>
</div>

<ul class='pagination text-center' id="pagination">
<?php

 if(!empty($pages)){
   for($i=1; $i<=$pages; $i++){
 if($i == 1){?>
            <li class='active'  id="<?php echo $i;?>"><a href='/articles/?page=<?php echo $i;?>'><?php echo $i;?></a></li>
 <?php } else{?>
 <li id="<?php echo $i;?>"><a href='/articles/?page=<?php echo $i;?>'><?php echo $i;?></a></li>
 <?php }}?>
<?php } ?>
</ul>
