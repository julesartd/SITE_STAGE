<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "modele/authentification.inc.php";

if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){

    include "$racine/vue/vueAuthentification.php";

}
else
{
    $mailU = $_POST["mailU"];
    $mdpU = $_POST["mdpU"];
    login($mailU, $mdpU);
    if(isLoggedOn()){
        header("Location:index.php?action=classe");
    }
    else{
        header("Location:index.php?action=connexion");
    }
}
?>