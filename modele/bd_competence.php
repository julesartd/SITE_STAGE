<?php

include "bd_connexion.php";

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

        $resultat=$req->fetch(PDO::FETCH_DEFAULT);

    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    return $resultat;
    
}
?>