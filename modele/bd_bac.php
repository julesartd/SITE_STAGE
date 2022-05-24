<?php

include_once "bd_connexion.php";

function getBac() { 
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM bac");
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
?>