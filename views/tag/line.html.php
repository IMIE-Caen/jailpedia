<tr>
  <td><?= $tag->getId(); ?></td>
  <td><?= $tag->getName(); ?></td>
  <td><a class="btn-delete-tag" href="/tag/delete/<?= $tag->getId(); ?>">Delete</a></td>
</tr>