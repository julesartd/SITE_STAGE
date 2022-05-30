<?php

include_once "bd_connexion.php";

function insertCompetence($libelle, $intitule, $idBac){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO competence_chapeau VALUES(null, :libelle, :intitule, :idBac)");

        $req->bindValue('libelle', $libelle);
        $req->bindValue('intitule', $intitule);
        $req->bindValue('idBac', $idBac);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



function insertSousCompetence($libelle, $intitule, $idCompetence){

    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO sous_competence VALUES(null, :libelle, :intitule, :idCompetence)");

        $req->bindValue('libelle', $libelle);
        $req->bindValue('intitule', $intitule);
        $req->bindValue('idCompetence', $idCompetence);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getCompetenceChapeau(){

    $resultat = array();
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("SELECT * FROM competence_chapeau");
        $rec->execute();


        $resultat=$rec->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}



function getCompetenceChapeauByBac($id){

   
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("SELECT * FROM competence_chapeau where idBac =:id");
        $rec->bindValue("id", $id);
        $rec->execute();


        $resultat=$rec->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getSousCompetenceById($id){

   
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("SELECT * FROM sous_competence where idCompetence =:id");
        $rec->bindValue("id", $id);
        $rec->execute();


        $resultat=$rec->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getMaxCompetenceId($id){

    try {

        $connex = connexionPDO();
        $req = $connex->prepare("SELECT MAX(idSousCompetence) as num FROM sous_competence where idCompetence = :id");
        $req->bindValue("id", $id);
        $req->execute();

        $resultat=$req->fetch(PDO::FETCH_ASSOC);

    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

