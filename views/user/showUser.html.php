<?php 
$me = $_SESSION['userConnect'];

if( $me->getId() ==  $user->getId() ) {

?>

	<h1>Mon compte</h1>
	<!-- <?php $id = $user->getId(); ?> -->

	<div>
		<label>Nom :  </label> <?= $me->getFirstname(); ?> </br>
		<label>Prenom :  </label> <?= $me->getLastname(); ?> </br>
		<label>Date de naissance :  </label> <?= $me->getDob(); ?> </br>
		<label>Email:  </label> <?= $me->getEmail(); ?> </br>
	</div>


	<div >
		<a href="/users/edit/<?= $id ?>" class="voir" >Modifier </a>
	</div>

<?php
	}
	ELSE { ?>

		 <h1>Son compte</h1>

	<div>
		<label>Nom :  </label> <?= $user->getFirstname(); ?> </br>
		<label>Prenom :  </label> <?= $user->getLastname(); ?> </br>
		<label>Date de naissance :  </label> <?= $user->getDob(); ?> </br>
	</div>
<?php }?>

