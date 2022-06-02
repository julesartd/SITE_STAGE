<?php

include_once "bd_connexion.php";


function insertEvenement($event,$classe,$semaine){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO affecter VALUES(:idEvent, :idClasse, :idSemaine)");

        $req->bindValue('idEvent', $event);
        $req->bindValue('idClasse', $classe);
        $req->bindValue('idSemaine', $semaine);
        $req->execute();

    
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getEvent(){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * from evenement");

      
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getWeek(){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT DISTINCT week from time_dimension where db_date BETWEEN '2021-09-06' and '2022-07-03' ORDER BY id");

      
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getWeekEvent($classe, $semaine){
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT idEvent from affecter
        Where  idClasse=:classe and idWeek=:semaine");
        $req->bindValue('classe',$classe);
        $req->bindValue('semaine',$semaine);

      
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>