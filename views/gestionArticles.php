<table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>title</th>
          <th>text</th>
        </tr>
      </thead>
      <tbody>
           <?php foreach ($articles as $article) { ?>
          <tr>
              <td><?= $article->getId(); ?></td>
              <td><?= $article->getTitle(); ?></td>
              <td><?= $article->getText(); ?></td>
              <td><a href="/gestion/articles/delete/<?= $article->getId(); ?>">Delete</a></td>
       </tr>
       <?php } ?>
      </tbody>
    </table>
