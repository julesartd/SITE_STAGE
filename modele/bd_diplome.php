<?php

include_once "bd_connexion.php";

function getDiplomeWithClasse() { 
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM diplome INNER JOIN classe on diplome.idDiplome=classe.idDiplome");
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getDiplome() { 
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM diplome");
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertDiplome($nomDiplome) {
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO diplome VALUES (null, :nomDiplome)");
        $req->bindValue('nomDiplome', $nomDiplome);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    
    }
}

function supprDiplome($idDiplome) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM diplome WHERE idDiplome=:idDiplome");
        $req->bindValue(':idDiplome', $idDiplome);
        $req->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getClasse(){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *, nomDiplome FROM classe inner join diplome on classe.idDiplome=diplome.idDiplome");
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertClasse($nomClasse, $idDiplome){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO classe VALUES (null, :nomClasse, :idDiplome)");
        $req->bindValue('nomClasse', $nomClasse);
        $req->bindValue('idDiplome', $idDiplome);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    
    }
}
