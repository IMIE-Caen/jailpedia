<h2>Bienvenue sur l'accueil</h2>

<?php 

	if(sizeof($articles) == 0  ) { 
		echo " Notre si ne contient pas encore de d'articles ..... " ; ?>
		<a href="/articles/new" title="Créer">Créez en un ici</a>
	<?php } else { 
?> 
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
	}
	?>
</div>

