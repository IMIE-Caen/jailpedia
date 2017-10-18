<?php
$PDO = new SQLitePDO();
$sql = 'SELECT * FROM TAGS';
$stmt = $PDO->bdd()->prepare($sql);
$stmt->execute();
$tags_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
?>


<table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>name</th>
        </tr>
      </thead>
      <tbody>
           <?php foreach ($tags_list as $tag) { ?>
          <tr>
              <td><?php echo $tag['id'] ?></td>
              <td><?php echo $tag['name'] ?></td>
              <td><a href="/gestion/tags/<?php echo $tag['id'] ?>">Delete</a></td>
       </tr>
       <?php } ?>
      </tbody>
    </table>
