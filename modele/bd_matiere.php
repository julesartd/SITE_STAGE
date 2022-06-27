<?php

include_once "bd_connexion.php";

function getMatiere()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM matiere");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}



function getMatiereByProf($idProf)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM matiere m INNER JOIN attribuer_matiere ap ON ap.idMatiere = m.idMatiere WHERE ap.idProf = :id");
        $req->bindValue('id', $idProf);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCompetenceChapeauByMatiere($id)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM matiere_competence WHERE idMatiere = :id");
        $req->bindValue('id', $id);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertMatiere($nom)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO matiere VALUES (null, :nom)");
        $req->bindValue('nom', $nom);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function supprCompetenceByMatiere($id)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM matiere_competence WHERE idMatiere=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function supprMatiere($id)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM matiere WHERE idMatiere=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function insertCompetenceMatiere($libelle, $intitule, $id){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO matiere_competence VALUES(null, :libelle, :intitule, :id)");

        $req->bindValue('libelle', $libelle);
        $req->bindValue('intitule', $intitule);
        $req->bindValue('id', $id);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function supprCompetenceMatiere($id){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM matiere_competence WHERE idCompetenceMatiere=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}