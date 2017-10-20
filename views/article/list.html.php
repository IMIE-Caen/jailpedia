<?php
$PDO = new SQLitePDO();
$sql = 'SELECT COUNT(*) FROM ARTICLES';
$stmt = $PDO->bdd()->prepare($sql);
$stmt->execute();
$pagination_list = $stmt->fetchColumn();
$stmt->closeCursor();

$limit = 2;
$pages = ceil($pagination_list / $limit);

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
$end = min(($offset + $pagination_list), $pagination_list);

  ?>

<div class="listArticle">
  <h1>Liste des articles</h1>

  <?php
  if(sizeof($articles)==0) {

   echo  "Aucun articles en base ! " ;

 } else {

   $sql = 'SELECT * FROM ARTICLES LIMIT :limit OFFSET :offset';
   $stmt = $PDO->bdd()->prepare($sql);
   // Bind the query params
   $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
   $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
   $stmt->execute();
   // Do we have any results?
   if ($stmt->rowCount() > 0) {
       // Define how we want to fetch the results
       $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $iterator = new IteratorIterator($stmt);

           foreach ($pagination_list as $row) { ?>
            <div class="article">
              <h2><a href="/articles/<?= $row->getId(); ?>" title="<?= $row->getTitle(); ?>"><?= $row->getTitle(); ?></a></h2>
              <div class="article-text"><?= $row->getText(); ?></div>
              <div class="bottom">
                <a href="/articles/<?= $row->getId(); ?>" class="voir" title="<?= $row->getTitle(); ?>">Lire la suite</a>
              </div>
            </div>
          <?php }}

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

<?php

// The "back" link
$prevlink = ($page > 1) ? '<a href="?page=1" >&laquo;</a> <a href="?page=' . ($page - 1) . '" >&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

// The "forward" link
$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" >&rsaquo;</a> <a href="?page=' . $pages . '" >&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

// Display the paging information
echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages', $nextlink, ' </p></div>';
