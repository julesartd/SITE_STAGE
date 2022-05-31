<?php

include_once "bd_connexion.php";

function getBac() { 
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM bac INNER JOIN classe on bac.idBac=classe.idBac");
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertBac($nomBac) {
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO bac VALUES (null, :nomBac)");
        $req->bindValue('nomBac', $nomBac);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    
    }
}

function supprBac($idBac) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM bac WHERE IDBAC=:idBac");
        $req->bindValue(':idBac', $idBac);
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
        $req = $cnx->prepare("SELECT *, nomBac FROM classe inner join bac on classe.idBac=bac.idBac");
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertClasse($NiveauClasse, $idBac, $nomClasse){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO classe VALUES (null, :nomClasse, :idBac, :nomClasse)");
        $req->bindValue('nomClasse', $NiveauClasse);
        $req->bindValue('idBac', $idBac);
        $req->bindValue('nomClasse', $nomClasse);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    
    }
}
