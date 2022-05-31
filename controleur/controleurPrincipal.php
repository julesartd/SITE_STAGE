<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

function controleurPrincipal($action){
    $lesActions = array();

    $lesActions["calendrier"] = "calendrierProfesseur.php";
    $lesActions["bloc"] = "insertionBloc.php";
    $lesActions["competence"] = "insertionCompetence.php";
    $lesActions["bac"] = "insertionBac.php";
    $lesActions["sousCompetence"] = "insertionSousCompetence.php";
    $lesActions["event"] = "insertionEvent.php";
    $lesActions["classe"] = "insertionClasse.php";
 
 
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>
