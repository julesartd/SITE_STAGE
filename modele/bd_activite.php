<?php

include_once "bd_connexion.php";

function insertActivite($nom, $prof, $classe)
{

    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO activite VALUES(null, :nom, :prof, :classe)");

        $req->bindValue('nom', $nom);
        $req->bindValue('prof', $prof);
        $req->bindValue('classe', $classe);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getCompetenceChapeauByDiplomeFromClasse($classe)
{

    $resultat = array();
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM competence_chapeau cp 
        INNER JOIN diplome d ON cp.idDiplome=d.idDiplome 
        INNER JOIN classe c ON d.idDiplome=c.idDiplome WHERE c.idCLasse =:classe ORDER BY libelleCompetence");
        $req->bindValue('classe', $classe);
        $req->execute();


        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getActivite($semaine)
{

    $resultat = array();
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT idWeek FROM attribuer_activite where idWeek = :semaine");
        $req->bindValue("semaine", $semaine);
        $req->execute();


        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCountSemaine($semaine, $classe)
{

    try {

        $connex = connexionPDO();
        $req = $connex->prepare("SELECT COUNT(DISTINCT ac.idActivite) as num FROM attribuer_activite  ac
        inner join activite a on ac.idActivite = a.idActivite  where idWeek = :semaine and a.idClasse = :classe");
        $req->bindValue("semaine", $semaine);
        $req->bindValue("classe", $classe);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAttribuerActiviteByClasse($classe)
{
    try {

        $connex = connexionPDO();
        $req = $connex->prepare("SELECT DISTINCT ac.idActivite, idWeek, nomActivite FROM attribuer_activite ac 
        inner join  activite a on ac.idActivite = a.idActivite   where a.idClasse = :id  ORDER BY idWeek");
        $req->bindValue("id", $classe);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getWeekActivite()
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT DISTINCT idWeek from attribuer_activite");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getSousCompetenceClasse($week, $activite)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT idSousCompetence from attribuer_activite ac 
        inner join activite a on ac.idActivite = a.idActivite where ac.idWeek = :week and ac.idActivite = :activite");
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

function getLastActivite(){

    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT MAX(idActivite) as num FROM activite");

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function attribuerActivite($idActivite, $idWeek, $idSousCompetence){

    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO attribuer_activite VALUES(:idActivite, :idWeek, :idSousCompetence)");

        $req->bindValue('idActivite', $idActivite);
        $req->bindValue('idWeek', $idWeek);
        $req->bindValue('idSousCompetence', $idSousCompetence);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}