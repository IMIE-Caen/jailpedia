<h1><?= $article->getTitle(); ?></h1>
<p>Note : <?= $note ?> /10</p>
<p><?= $article->getText(); ?></p>
<img src="../../images/articles/<?= Article::getImage($article->getId()) ?>" />

<?php
if (isset($_SESSION['connecte'])) {
?>
<form action="/articles/<?= $article->getId() ?>" class="form-vertical" method="post">
    <h1>Noter cet article</h1>
    <div class="form-group">
        <label for="note">Note :</label>
        <select name="note" id="note">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div>
    <input type="submit"  class="btn btn-default" value="Enregistrer" />
</form>
    <?php
}
?>