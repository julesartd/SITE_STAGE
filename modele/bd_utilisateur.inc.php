<?php

include_once "bd_connexion.php";

function getUtilisateurs() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where mailUtilisateur=:mailU");
        $req->bindValue(':mailU', $mailU);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertUtilisateur($mail,$mdp,$droit,$idProf)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO utilisateur VALUES (:mail, :mdp, :droit, :idProf)");
        $req->bindValue('mail', $mail);
        $req->bindValue('mdp', $mdp);
        $req->bindValue('droit', $droit);
        $req->bindValue('idProf', $idProf);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


?>