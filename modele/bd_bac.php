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
        $req = $cnx->prepare("SELECT * FROM classe");
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getBacByClasse($id) { 
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM bac INNER JOIN classe on bac.idBac=classe.idBac WHERE classe.idClasse= :id");
        $req->bindValue("id",$id);
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
