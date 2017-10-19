<h1>Mon compte</h1>
<?= $id = $user->getId(); ?>
<form action="/users/edit/<?= $id ; ?>" method="POST">
<div>
<label>Nom :  </label> <?= $user->getFirstname(); ?> </br>
<label>Prenom :  </label> <?= $user->getLastname(); ?> </br>
<label>Date de naissance :  </label> <?= $user->getDob(); ?> </br>
<label>Email:  </label> <?= $user->getEmail(); ?> </br>
</div>

 <div class="boutonAction">
    <input type="submit" value="Modifier" class="btn btn-default" />
  </div>
 </form>