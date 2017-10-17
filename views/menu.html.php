<nav class="container navbar navbar-expand-lg">
    <ul class="navbar-nav">
      <?php 
        if ($_SESSION['connecte'] == false) {


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

      <?php 
        } ?>
    </ul>
    <a class="paypal" href="http://www.paypal.com" title="Faire un don" target="_blank">

        <img src="/images/paypal.png" alt="Logo Paypal" title="Paypal" />
   
    </a>
</nav>
