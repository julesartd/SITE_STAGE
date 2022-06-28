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


function getCompetenceMatiereById($id)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM matiere_competence where idMatiere = :id");
        $req->bindValue("id", $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
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


function getMatiereByProfAndClasse($idProf, $idClasse)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM matiere m INNER JOIN attribuer_matiere ap ON ap.idMatiere = m.idMatiere 
        WHERE ap.idProf = :id and ap.idClasse = :classe");
        $req->bindValue('id', $idProf);
        $req->bindValue('classe', $idClasse);
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

function insertCompetenceMatiere($libelle, $intitule, $id)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO matiere_competence VALUES(null, :libelle, :intitule, :id)");

        $req->bindValue('libelle', $libelle);
        $req->bindValue('intitule', $intitule);
        $req->bindValue('id', $id);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function supprCompetenceMatiere($id)
{
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

function getCompetenceByMatiereFromClasse($idCompetence)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM matiere_competence  WHERE idMatiere =:id ORDER BY idCompetenceMatiere");
        $req->bindValue('id', $idCompetence);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function attribuerProfMatiere($classe, $prof, $matiere)
{    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into attribuer_matiere values (:matiere, :prof, :classe)");
        $req->bindValue('matiere', $matiere);
        $req->bindValue('classe', $classe);
        $req->bindValue('prof', $prof);
        $req->execute();

    } catch (PDOException $e) {
        echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
        Ce professeur est déja attribuer a cette classe pour cette matière!
        <br>
        <a href='./?action=prof'>retour</a>
        </div>";
        die();
    }

}