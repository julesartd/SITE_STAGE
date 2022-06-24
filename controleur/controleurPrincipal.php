<?php

include_once "modele/authentification.inc.php";

function controleurPrincipal($action){
    $lesActions = array();

    $lesActions["calendrier"] = "calendrier.php";
    $lesActions["competence"] = "competence.php";
    $lesActions["diplome"] = "diplome.php";
    $lesActions["matiere"] = "matiere.php";
    $lesActions["competenceMatiere"] = "competenceMatiere.php";
    $lesActions["sousCompetence"] = "sousCompetence.php";
    $lesActions["event"] = "evenement.php";
    $lesActions["classe"] = "classe.php";
    $lesActions["activite"] = "activite.php";
    $lesActions["detailClasse"] = "detailClasse.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["prof"] = "prof.php";
    $lesActions["eleve"] = "eleve.php";
    $lesActions["strategie"] = "strategie.php";
    $lesActions["recap"] = "recapCompetence.php";
    $lesActions["utilisateur"] = "utilisateur.php";

    if(isLoggedOn()){
        $lesActions["defaut"] = "classe.php";
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
