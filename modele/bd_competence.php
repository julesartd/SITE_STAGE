<?php

include_once "bd_connexion.php";

function insertCompetence($idCompetence, $nomCompetence, $idBloc){



    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("INSERT INTO competence VALUES(:idCompetence , :idBloc, :nomCompetence)");

        $rec->bindValue('idCompetence', $idCompetence);
        $rec->bindValue('nomCompetence', $nomCompetence);
        $rec->bindValue('idBloc', $idBloc);
        $rec->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getMaxCompetence(){

    $resultat = 0;
    try {

        $connex = connexionPDO();
        $req = $connex->prepare("SELECT MAX(IDCOMPETENCE) FROM COMPETENCE");
        $req->execute();

        $resultat=$req->fetch(PDO::FETCH_ASSOC);

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