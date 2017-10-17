<form action="/users/save" method="POST">
    <h3> Création d'un compte </h3>
    <div>
        <label for="fisrtname"> Prenom :</label>
        <input type="text" id="firstname" name="firstname"/>
    </div>
    <div>
        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname" />
    </div>
    <div>
        <label for="dob">Date de naissance :</label>
        <input type="date" id="dob" name="dob" />
    </div>
    <div>
        <label for="email">Email</label>
        <input type="mail" id="email" name="email" />
    </div>
    <div>
        <label for="mdp">Mot de passe</label>
        <input type="password" id="password" name="password" />
    </div>
    <div>
    <button type="submit">OK</button>
    </div>
</form>

