<?php

include_once "bd_connexion.php";

function getDiplomeWithClasse()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM diplome INNER JOIN classe on diplome.idDiplome=classe.idDiplome");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getDiplome()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM diplome");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getDiplomeByIdProf($idProf)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM diplome d
         INNER JOIN classe c ON d.idDiplome = c.idDiplome 
         INNER JOIN attribuer_classe a ON a.idClasse = c.idClasse WHERE a.idProf = :idProf");
         $req->bindValue('idProf', $idProf);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertDiplome($nomDiplome)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO diplome VALUES (null, :nomDiplome)");
        $req->bindValue('nomDiplome', $nomDiplome);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function supprDiplome($idDiplome)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM diplome WHERE idDiplome=:idDiplome");
        $req->bindValue(':idDiplome', $idDiplome);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


