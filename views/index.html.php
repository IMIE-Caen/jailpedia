<div class="homepage">
	<h1>JailPedia - Préparez votre évasion</h1>
	<?php
		if(sizeof($articles) == 0 && $randomArticle == null ) {
			echo " Notre si ne  pas encore de d'articles ..... " ; ?>
			<a href="/articles/new" title="Créer">Créez en un ici</a>
		<?php } else {
	?>
	<div class="illustration">
		<img src="/images/alcatraz.jpg" alt="La prison d'Alcatraz" title="La prison d'Alcatraz" />
	</div>
	<section>
		<h2> L'article au hasard </h2>
			<div class="article">
			<h3> <a href="/articles/<?= $id ?>" title="<?= $randomArticle->getTitle(); ?>"> <?= $randomArticle->getTitle(); ?> </a> </h3>
			<div class="description">
			<?php
				echo $randomArticle->getText();
			?>
			</div>
			<div class="bottom">
				<a class="voir" href="/articles/<?= $id ?>" title="<?= $randomArticle->getTitle(); ?>">Lire l'article</a>
			</div>
		</div>
	</section>

	<section>
		<h2> Dernier articles publiés </h2>
		<?php
			foreach ($articles as $article) {
		?>
		<div class="article">
			<?php $id = $article->getId(); ?>
			<h3><a href="/articles/<?= $id ?>" title="<?=$article->getTitle(); ?>"><?=$article->getTitle(); ?></a></h3>
			<div class="description">
			<?php
				$text = Util::coupeTexte($article->getText(),5);
				echo $text ;
			?>
			</div>
			<div class="bottom">
				<a class="voir" href="/articles/<?= $id ?>" title="<?=$article->getTitle(); ?>">En savoir plus</a>
			</div>
		</div>
		<?php
			}
		}
		?>
	</section>
	<section>
	    <h2> Liste des tags </h2>
      <?php foreach ($tags as $tag) { ?>
          <?php $id = $tag->getId(); ?>
          <a class="voir" href="/tags/<?= $id ?>" title=<?=$tag->getName(); ?> ><?=$tag->getName(); ?> </a>
       <?php } ?>
	</section>
</div>
