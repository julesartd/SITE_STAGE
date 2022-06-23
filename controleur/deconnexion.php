<?php

    include_once "modele/authentification.inc.php";

    if(isset($_SESSION['mailUtilisateur'])){
        header("Location:/");
        logout();
    }
?>

