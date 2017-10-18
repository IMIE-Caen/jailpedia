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
        if (!isset($_SESSION['role']) == 'admin') {
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
  <?php // var_dump($_SESSION["user"]); exit; ?>
  <?php if (isset($_SESSION["user"])) { ?>
     Bonjour <?= $_SESSION["user"]->getFirstname(); ?>
  <?php } ?>
    <a class="paypal" href="http://www.paypal.com" title="Faire un don" target="_blank">
      <img src="/images/paypal.png" alt="Logo Paypal" title="Paypal" />
    </a>
</nav>
