<?php

include_once "bd_connexion.php";

function getUtilisateurs()
{
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

function getUtilisateurByMailU($mailU)
{


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

function getUtilisateurByIdProf($id)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where idProfesseur= :id");
        $req->bindValue(':id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function insertUtilisateur($mail, $mdp, $droit, $idProf)
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

function updateMdptUtilisateur($mdp, $idProf)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("UPDATE utilisateur SET mdpUtilisateur = :mdp where idProfesseur = :idProf");
        $req->bindValue('mdp', $mdp);
        $req->bindValue('idProf', $idProf);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function str_to_noaccent($str)
{
    $url = $str;
    $url = preg_replace('#Ç#', 'C', $url);
    $url = preg_replace('#ç#', 'c', $url);
    $url = preg_replace('#è|é|ê|ë#', 'e', $url);
    $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
    $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
    $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
    $url = preg_replace('#ì|í|î|ï#', 'i', $url);
    $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
    $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
    $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
    $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
    $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
    $url = preg_replace('#ý|ÿ#', 'y', $url);
    $url = preg_replace('#Ý#', 'Y', $url);
     
    return ($url);
}

function resetPassword($mdp,$idProf)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("UPDATE utilisateur SET mdpUtilisateur = :mdp where idProfesseur = :idProf");
        $req->bindValue('mdp', $mdp);
        $req->bindValue('idProf', $idProf);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getDroit(){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from droit");
    
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getDroitUtilisateur($id){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT idDroitUtilisateur FROM utilisateur WHERE idProfesseur = :id");
        $req->bindValue('id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>