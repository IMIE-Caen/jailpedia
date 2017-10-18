<?php

$tags = Tag::fetchAll();
$listTags = null;
if (isset($article)) {
  $listTags = Categorisation::getIdTagByArticle($article->getId());
}
var_dump($listTags);
foreach($tags as $tag) {
  $selected = "";
  if (in_array($tag->getId(), $listTags)) {
    $selected = "selected=\"selected\"";
  }
  ?>
<option value="<?= $tag->getId(); ?>" <?= $selected ?>><?= $tag->getName(); ?></option>
<?php
}