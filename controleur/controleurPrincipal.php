<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "modele/authentification.inc.php";

function controleurPrincipal($action){
    $lesActions = array();

    $lesActions["calendrier"] = "calendrierProfesseur.php";
    $lesActions["bloc"] = "insertionBloc.php";
    $lesActions["competence"] = "insertionCompetence.php";
    $lesActions["diplome"] = "insertionDiplome.php";
    $lesActions["sousCompetence"] = "insertionSousCompetence.php";
    $lesActions["event"] = "insertionEvent.php";
    $lesActions["classe"] = "insertionClasse.php";
    $lesActions["activite"] = "activite.php";
<<<<<<< HEAD
    $lesActions["detailClasse"] = "detailClasse.php";
 
=======
>>>>>>> 3613623433a79549c7c2d34d7c5de13ba5f27602
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["prof"] = "prof.php";
    $lesActions["eleve"] = "eleve.php";

    if(isLoggedOn()){
        $lesActions["defaut"] = "insertionClasse.php";
    }
    else{
        $lesActions["defaut"] = "connexion.php";
    }
 
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>
