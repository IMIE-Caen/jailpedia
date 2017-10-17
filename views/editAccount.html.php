<form action="/users/edit/" method="POST">
    <h3> Modifier mon compte </h3>
    <div>
        
        <input type="hidden" id="id" name="id" value="<?php echo $user->getId() ?>"/>
    </div>
    <div>
        <label for="fisrtname"> Prenom :</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $user->getFirstname() ?>"/>
    </div>
    <div>
        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo $user->getLastname() ?>"/>
    </div>
    <div>
        <label for="dob">Date de naissance :</label>
        <input type="date" id="dob" name="dob" value="<?php echo $user->getDob() ?>"/>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="mail" id="email" name="email" value="<?php echo $user->getEmail() ?>"/>
    </div>
    <div>
        <label for="mdp">Mot de passe</label>
        <input type="password" id="password" name="password" value="<?php echo $user->getPassword() ?>" />
    </div>
    <div>
    <button type="submit">Modifier</button>
    </div>
</form>