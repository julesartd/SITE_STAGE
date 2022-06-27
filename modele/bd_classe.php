<?php

include_once "bd_connexion.php";

function getClasse()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *, nomDiplome FROM classe inner join diplome on classe.idDiplome=diplome.idDiplome");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getClasseById($id)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *, nomDiplome FROM classe 
        inner join diplome on classe.idDiplome=diplome.idDiplome 
        where idClasse= :id");
        $req->bindValue('id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getClasseByIdProf($idProf)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *, nomDiplome FROM classe 
        inner join diplome on classe.idDiplome=diplome.idDiplome 
        INNER JOIN attribuer_prof a ON a.idClasse = classe.idClasse WHERE a.idProf = :idProf");
        $req->bindValue('idProf', $idProf);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertClasse($NiveauClasse, $idDiplome)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO classe VALUES (null, :niveauClasse, :idDiplome)");
        $req->bindValue('niveauClasse', $NiveauClasse);
        $req->bindValue('idDiplome', $idDiplome);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function SupprClasse($id)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM classe WHERE idClasse=:idClasse");
        $req->bindValue(':idClasse', $id);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function insertProf($nom, $prenom, $dateNaiss)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO professeur VALUES(null,:nom, :prenom, :dateNaiss)");

        $req->bindValue('nom', $nom);
        $req->bindValue('prenom', $prenom);
        $req->bindValue('dateNaiss', $dateNaiss);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function insertEleve($nom, $prenom)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO eleve VALUES(null,:nom, :prenom)");

        $req->bindValue('nom', $nom);
        $req->bindValue('prenom', $prenom);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getProfByClasse($idClasse)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM professeur p
        INNER JOIN attribuer_prof ap ON p.idProf = ap.idProf
        WHERE ap.idClasse = :idClasse");
        $req->bindValue('idClasse', $idClasse);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getProfById($id)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM professeur p
        WHERE idProf = :idProf");
        $req->bindValue('idProf', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getEleveByClasse($idClasse)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM eleve e
        INNER JOIN attribuer_eleve ae ON e.idEleve = ae.idEleve
        WHERE ae.idClasse = :idClasse");
        $req->bindValue('idClasse', $idClasse);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getProf()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM professeur");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLastProf()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT MAX(idProf) as num FROM professeur");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function attribuerProf($classe, $prof)
{    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into attribuer_prof values (:classe, :prof)");
        $req->bindValue('classe', $classe);
        $req->bindValue('prof', $prof);
        $req->execute();

    } catch (PDOException $e) {
        echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
        Ce professeur est déja attribuer a cette classe!
        <br>
        <a href='./?action=prof'>retour</a>
        </div>";
        die();
    }
   
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


function deleteProfFromClasse($idClasse){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("DELETE FROM attribuer_prof WHERE idClasse=:idClasse");
        $req->bindValue('idClasse', $idClasse);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}