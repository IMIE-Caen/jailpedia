<form action="/users/save" method="POST" class="form-vertical">
  <h1>Création d'un compte</h1>
    <div class="form-group">
        <label for="fisrtname"> Prenom :</label>
        <input class="form-control" type="text" id="firstname" name="firstname"/>
    </div>
    <div class="form-group">
        <label for="lastname">Nom :</label>
        <input class="form-control" type="text" id="lastname" name="lastname" />
    </div>
    <div class="form-group">
        <label for="dob">Date de naissance :</label>
        <input class="form-control" type="date" id="dob" name="dob" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" id="email" name="email" />
    </div>
    <div class="form-group">
        <label for="mdp">Mot de passe</label>
        <input class="form-control" type="password" id="password" name="password" />
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <input class="form-control" type="role" id="role" name="role" value="user" readonly="readonly"/>
    </div>
    <div class="boutonAction">
      <input type="submit" value="Créer un compte" class="btn btn-default" />
    </div>
</form>
