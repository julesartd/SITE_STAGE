<?php

include "bd_connexion.php";
function InsererCompetence($nomCompetence ,$idBloc){
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

function InsererSousCompetence($nomSousCompetence ,$idCompetence ,$idBloc){
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


function getBloc() { 
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("SELECT * FROM bloc");
        $rec->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



?>