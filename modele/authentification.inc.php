<?php

include_once "bd_utilisateur.inc.php";

function login($mailU, $mdpU) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMailU($mailU);
    $mdpBD = $util["mdpUtilisateur"];
    $droitBD = $util["idDroitUtilisateur"];
    $idProfBD = $util["idProfesseur"];

    if (trim($mdpBD) == trim($mdpU)) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["mailUtilisateur"] = $mailU;
        $_SESSION["mdpUtilisateur"] = $mdpBD;
        $_SESSION["idDroitUtilisateur"] = $droitBD;
        $_SESSION["idProfesseur"] = $idProfBD;
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailUtilisateur"]);
    unset($_SESSION["mdpUtilisateur"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["mailUtilisateur"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mailUtilisateur"])) {
        $util = getUtilisateurByMailU($_SESSION["mailUtilisateur"]);
        if ($util["mailUtilisateur"] == $_SESSION["mailUtilisateur"] && $util["mdpUtilisateur"] == $_SESSION["mdpUtilisateur"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

?>