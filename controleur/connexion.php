<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "modele/authentification.inc.php";


if (isset($_POST["mailU"], $_POST["mdpU"])) {


    $mailU = $_POST["mailU"];
    $mdpU = $_POST["mdpU"];



    login($mailU, $mdpU);


    if (isLoggedOn()) {
        header("Location:index.php?action=classe");
    } else {
        header("Location:/?action=connexion&identifiant=non");
    }
}

if (isset($_GET['login']) && $_GET['login'] == 'non') {

    echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
        Veuillez vous connecter pour accéder à cette page
      </div>";
}

if (isset($_GET['identifiant']) && $_GET['identifiant'] == 'non') {

    echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
       Vos identifiants sont invalides
      </div>";
}

include "$racine/vue/vueAuthentification.php";

?>