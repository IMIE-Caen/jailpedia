<h2>Bienvenue sur l'accueil</h2>

<div>
	<h3> L'article au hasard </h3>

	<h4> <?=$randomArticle->getTitle(); ?> </h4>

	<?php
		echo $randomArticle->getText(); 

	?>

</div>

<div>

	
	<h3> Dernier articles publiés </h3>
	<?php
		foreach ($articles as $article) {
	?>
	<div> 
		<?php
			$id = $article->getId(); 
			
		?>  
		<h4> <?=$article->getTitle(); ?> </h4>

		<?php

			$text = Util::coupeTexte($article->getText(),5);
			echo $text ;
		?>
			<a href="/articles/<?= $id ?>" title="Voir plus">Voir plus</a>
	</div> 
	<?php	
		}
	?>
</div>

