<h1>Mon compte</h1>
<?php $id = $user->getId(); ?>

<div>
	<label>Nom :  </label> <?= $user->getFirstname(); ?> </br>
	<label>Prenom :  </label> <?= $user->getLastname(); ?> </br>
	<label>Date de naissance :  </label> <?= $user->getDob(); ?> </br>
	<label>Email:  </label> <?= $user->getEmail(); ?> </br>
</div>


<div >
	<a href="/users/edit/<?= $id ?>" class="voir" >Modifier </a>
</div>



