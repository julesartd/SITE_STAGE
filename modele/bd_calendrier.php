<?php

include_once "bd_connexion.php";


function insertEvenement($event, $classe, $semaine)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO affecter VALUES(:idEvent, :idClasse, :idSemaine)");

        $req->bindValue('idEvent', $event);
        $req->bindValue('idClasse', $classe);
        $req->bindValue('idSemaine', $semaine);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getEvent()
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * from evenement");


        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
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


function supprTableCalendrier()
{
    try {
        $connex = connexionPDO();
        $req =  $connex->prepare("ALTER TABLE affecter DROP FOREIGN KEY fk_week;
        TRUNCATE affecter;
        TRUNCATE time_dimension; 
        ALTER TABLE affecter
        ADD CONSTRAINT fk_week
        FOREIGN KEY (idWeek) REFERENCES time_dimension(Week);");

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function creeTableCalendrier($dateDebut ,$dateFin)
{
    try {
        $connex = connexionPDO();
        $req =  $connex->prepare("CALL fill_date_dimension(:dateDebut, :dateFin)");

        $req->bindValue('dateDebut', $dateDebut, PDO::PARAM_STR);
        $req->bindValue('dateFin', $dateFin, PDO::PARAM_STR);

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

}
?>