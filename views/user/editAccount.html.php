<form action="/users/edit/" method="POST">
  <h1>Modifier mon compte</h1>
  <input type="hidden" id="id" name="id" value="<?php echo $user->getId() ?>"/>
  <div class="form-group">
    <label for="fisrtname"> Prenom :</label>
    <input class="form-control" type="text" id="firstname" name="firstname" value="<?php echo $user->getFirstname() ?>"/>
  </div>
  <div class="form-group">
    <label for="lastname">Nom :</label>
    <input class="form-control" type="text" id="lastname" name="lastname" value="<?php echo $user->getLastname() ?>"/>
  </div>
  <div class="form-group">
    <label for="dob">Date de naissance :</label>
    <input class="form-control" type="date" id="dob" name="dob" value="<?php echo $user->getDob() ?>"/>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="email" id="email" name="email" value="<?php echo $user->getEmail() ?>"/>
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input class="form-control" type="password" id="password" name="password" value="<?php echo $user->getPassword() ?>" />
  </div>
  <div class="form-group">
      <label for="role">Role</label>
      <input class="form-control" type="role" id="role" name="role" value="<?php echo $user->getRole() ?>" readonly="readonly"/>
  </div>
  <div class="form-group">
    <div class="boutonAction">
      <input type="submit"  class="btn btn-default" value="Enregistrer les modifications" />
    </div>
  </div>
</form>
