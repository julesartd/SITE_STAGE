<?php

include "bd_connexion.php";

function insertCompetenceChapeau($idCP, $nomCP, $idBac){

    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO bloc VALUES (:idCP , :idBac, :nomCP)");
        $req->bindValue('idCP', $idCP);
        $req->bindValue('idBac', $idBac);
        $req->bindValue('nomCP', $nomCP);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function insertCompetence($nomCompetence ,$idBloc){
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("INSERT INTO competence VALUES(:idBloc , null, :nomCompetence)");
        $rec->bindValue('idBloc', $idBloc);
        $rec->bindValue('nomCompetence', $nomCompetence);
        $rec->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function insertSousCompetence($nomSousCompetence ,$idCompetence ,$idBloc){
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("INSERT INTO sous_Competence VALUES(:idBloc , :idCompetence , null, :nomSousCompetence)");
        $rec->bindValue('idBloc', $idBloc);
        $rec->bindValue('idCompetence', $idCompetence);
        $rec->bindValue('nomSousCompetence', $nomSousCompetence);
        $rec->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getCompetence($idBloc){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from competence where IDBLOC = :idBloc");
        $req->bindValue('idBloc', $idBloc);
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage();
    die();
}
return $resultat;
}


function getBloc() { 
    $resultat = array();
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("select * from bloc");
        $rec->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

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


function GetSousCompetence($idCompetence){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from sous_competence where IDCOMPETENCE = :idCompetence");
        $req->bindValue('idCompetence', $idCompetence);
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>