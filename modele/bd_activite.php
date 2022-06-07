<?php



function insertActivite($nom, $competence, $prof){

    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO activite VALUES(null, :nom, :competence, :prof)");

        $req->bindValue('nom', $nom);
        $req->bindValue('competence', $competence);
        $req->bindValue('prof', $prof);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}




?>