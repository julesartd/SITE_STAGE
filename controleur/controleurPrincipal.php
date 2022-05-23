<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

function controleurPrincipal($action){
    $lesActions = array();

    $lesActions["modification"] = "modificationArbitre.php";
    $lesActions["info"] = "informationMatch.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["ajout"] = "ajoutArbitre.php";
    $lesActions["defaut"] = "accueil.php";
    $lesActions["PDF"] = "matchPDF.php";
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>