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

?>