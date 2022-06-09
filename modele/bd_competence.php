<?php

include_once "bd_connexion.php";

function insertCompetence($libelle, $intitule, $idDiplome){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO competence_chapeau VALUES(null, :libelle, :intitule, :idDiplome)");

        $req->bindValue('libelle', $libelle);
        $req->bindValue('intitule', $intitule);
        $req->bindValue('idDiplome', $idDiplome);
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

function getSousCompetence(){

    $resultat = array();
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("SELECT *, libelleCompetence FROM sous_competence s 
        inner join competence_chapeau c on s.idCompetence = c.idCompetence");
        $rec->execute();


        $resultat=$rec->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getCompetenceChapeauByDiplome($id){

   
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("SELECT * FROM competence_chapeau where idDiplome =:id");
        $rec->bindValue("id", $id);
        $rec->execute();


        $resultat=$rec->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getCompetenceChapeauById($id){

   
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("SELECT * FROM competence_chapeau where idCompetence =:id");
        $rec->bindValue("id", $id);
        $rec->execute();


        $resultat=$rec->fetch(PDO::FETCH_ASSOC);
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


function getMaxSousCompetenceId($id){

    try {

        $connex = connexionPDO();
        $req = $connex->prepare("SELECT MAX(libelleSousCompetence) as num FROM sous_competence where idCompetence = :id");
        $req->bindValue("id", $id);
        $req->execute();

        $resultat=$req->fetch(PDO::FETCH_ASSOC);

    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nombreSousCompetenceVu(){

    try {

        $connex = connexionPDO();
        $req = $connex->prepare("SELECT COUNT(idSousCompetence) as nombre FROM attribuer_activite");
     
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);

    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}



function supprSousCompetence($id){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM sous_competence WHERE idSousCompetence=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

}

function supprCompetence($id){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM competence_chapeau WHERE idCompetence=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

}

function supprSousCompetenceByCompetence($id){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM Sous_Competence WHERE idCompetence=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

}

function supprCompetenceByDiplome($id){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM competence_chapeau WHERE idDiplome=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

}

