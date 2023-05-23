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
        $req = $cnx->prepare("SELECT DISTINCT(nomMatiere) , m.idMatiere FROM matiere m INNER JOIN attribuer_matiere ap ON ap.idMatiere = m.idMatiere WHERE ap.idProf = :id");
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

function getMatiereByClasse($idClasse)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM matiere m INNER JOIN attribuer_matiere ap ON ap.idMatiere = m.idMatiere 
        WHERE ap.idClasse = :classe");
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
        echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
        Impossible de supprimer cette matière car elle posséde une compétence qui est attribuée à une ou plusieurs activités!
        <br>
        <a href='./?action=matiere'>retour</a>
        </div>";
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
        echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
        Impossible de supprimer cette matière car elle posséde une compétence qui est attribuée à une ou plusieurs activités!
        <br>
        <a href='./?action=matiere'>retour</a>
        </div>";
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
        echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
        Impossible de supprimer cette compétence car elle est attribuée à une ou plusieurs activités !
        <br>
        <a href='./?action=matiere'>retour</a>
        </div>";
        die();
    }
}

function getCompetenceByMatiere($idCompetence)
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
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into attribuer_matiere values (:matiere, :prof, :classe)");
        $req->bindValue('matiere', $matiere);
        $req->bindValue('classe', $classe);
        $req->bindValue('prof', $prof);
        $req->execute();

    } catch (PDOException $e) {
        echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
        Ce professeur est déja attribué à cette classe avec cette matière!
        <br>
        <a href='./?action=prof'>retour</a>
        </div>";
        die();
    }

}

function attribuerActiviteMatiere($idActivite, $idCompetence, $idWeekDebut, $idWeekFin)
{

    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO attribuer_activite_matiere VALUES(:idActivite, :idCompetence, :idWeekDeb, :idWeekFin)");

        $req->bindValue('idActivite', $idActivite);
        $req->bindValue('idCompetence', $idCompetence);
        $req->bindValue('idWeekDeb', $idWeekDebut);
        $req->bindValue('idWeekFin', $idWeekFin);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getAttribuerActiviteMatiereByClasseAndMatiere($classe, $matiere)
{
    try {

        $connex = connexionPDO();
        $req = $connex->prepare("  SELECT DISTINCT acm.idActivite, idWeekDebut, idWeekFin, nomActivite 
        FROM attribuer_activite_matiere acm 
        inner join  activite a on acm.idActivite = a.idActivite 
        inner join matiere_competence mc on mc.idCompetenceMatiere=acm.idCompetenceMatiere inner join 
        matiere m on m.idMatiere = mc.idMatiere
        where a.idClasse = :idC  and m.idMatiere = :idM ORDER BY idWeekDebut, idWeekFin");
        $req->bindValue("idC", $classe);
        $req->bindValue("idM", $matiere);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nombreCompetenceMatiereVu($idCompetence, $classe, $matiere)
{

    try {

        $connex = connexionPDO();
        $req = $connex->prepare("SELECT COUNT(acm.idCompetenceMatiere) as nbCompetence FROM attribuer_activite_matiere acm
        INNER JOIN matiere_competence mc on mc.idCompetenceMatiere = acm.idCompetenceMatiere 
        inner join activite a on a.idActivite = acm.idActivite
        WHERE mc.idCompetenceMatiere = :idCompetenceMatiere and a.idClasse = :classe AND mc.idMatiere = :matiere");
        $req->bindValue("idCompetenceMatiere", $idCompetence);
        $req->bindValue("classe", $classe);
        $req->bindValue("matiere", $matiere);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCompetenceMatiereClasse($week, $activite)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT idCompetenceMatiere from attribuer_activite_matiere acm 
        inner join activite a on acm.idActivite = a.idActivite where acm.idWeekDebut = :week and acm.idActivite = :activite");
        $req->bindValue('week', $week);
        $req->bindValue('activite', $activite);


        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCountSemaineMatiere($semaineDeb, $semaineFin, $classe)
{

    try {

        $connex = connexionPDO();
        $req = $connex->prepare("SELECT COUNT(DISTINCT acm.idActivite) as num FROM attribuer_activite_matiere  acm
        inner join activite a on acm.idActivite = a.idActivite  where idWeekDebut = :semaineDeb and idWeekFin = :semaineFin and a.idClasse = :classe");
        $req->bindValue("semaineDeb", $semaineDeb);
        $req->bindValue("semaineFin", $semaineFin);
        $req->bindValue("classe", $classe);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getNomMatiere($id)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT nomMatiere as nom FROM matiere WHERE idMatiere = :id");
        $req->bindValue("id", $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}