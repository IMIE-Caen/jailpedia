<nav class="container navbar navbar-expand-lg">
    <ul class="navbar-nav">
      <?php
        if (!isset($_SESSION['connecte'])) {
      ?>
      <li class="nav-item">
        <a href="/signin" title="Se connecter">Se connecter</a>
      </li>
      <li class="nav-item">
        <a href="/signup" title="Créer un compte">Créer un compte</a>
      </li>
      <?php
      }
      else {
         ?>
      <li class="nav-item">
        <a href="/logout" title="Deconnexion">Se deconnecter</a>
      </li>
      <li class="nav-item">
        <a href="/articles/new" title="Créer un article">Créer un article</a>
      </li>
        <?php
          if (isset( $_SESSION['userConnect'])) {
            $id = $_SESSION['userConnect']->getId();
        ?>

        <li class="nav-item">
          <a href="/users/<?= $id ?>" title="Mon compte">Mon compte</a>
        </li>

        <?php
           //$userCoName = User::getUserById($id);
           echo  "Bonjour " .$_SESSION['userConnect']->getFirstname();



        }

        //$userCoRole = User::getUserById($id);
       // if ($_SESSION['role'] == 'admin'){
                if ($_SESSION['userConnect']->getRole() == 'admin'){

      ?>

      <li class="nav-item" >
          <div class="btn-group">
            <button type="button" class="btn btn-secondaire dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion Admin</button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/gestion/users">Users</a>
            <a class="dropdown-item" href="/gestion/articles">Articles</a>
            <a class="dropdown-item" href="/gestion/tags">Tags</a>
          </div>
        </div>
      </li>
      <?php
        } ?>
      <?php
        } ?>

    </ul>

    <a class="paypal" href="/contact?subject=paypal" title="Faire un don">
      <img src="/images/paypal.png" alt="Logo Paypal" title="Paypal" />
    </a>
</nav>
