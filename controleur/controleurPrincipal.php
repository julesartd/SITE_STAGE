<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

function controleurPrincipal($action){
    $lesActions = array();

    $lesActions["calendrier"] = "calendrierProfesseur.php";
    $lesActions["insertion"] = "insertionBloc.php";
 
 
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>
