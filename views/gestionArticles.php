<?php
$PDO = new SQLitePDO();
$sql = 'SELECT * FROM ARTICLES';
$stmt = $PDO->bdd()->prepare($sql);
$stmt->execute();
$articles_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
?>


<table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>title</th>
          <th>text</th>
        </tr>
      </thead>
      <tbody>
           <?php foreach ($articles_list as $article) { ?>
          <tr>
              <td><?php echo $article['id'] ?></td>
              <td><?php echo $article['title'] ?></td>
              <td><?php echo $article['text'] ?></td>
              <td><a href="/gestion/articles/delete/<?php echo $article['id'] ?>">Delete</a></td>
       </tr>
       <?php } ?>
      </tbody>
    </table>
