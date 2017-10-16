<?php

class UsersController {
  function show($id){

    $page_content ="Affichage de l'user $id";
    include("./views/layout.html.php");
  }


}
