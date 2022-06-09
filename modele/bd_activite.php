<?php



function insertActivite($nom, $competence, $prof, $classe){

    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO activite VALUES(null, :nom, :competence, :prof, :classe)");

        $req->bindValue('nom', $nom);
        $req->bindValue('competence', $competence);
        $req->bindValue('prof', $prof);
        $req->bindValue('classe', $classe);
        $req->execute();
        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getCompetenceChapeauByDiplomeFromClasse($classe){

    $resultat = array();
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM competence_chapeau cp 
        INNER JOIN diplome d ON cp.idDiplome=d.idDiplome 
        INNER JOIN classe c ON d.idDiplome=c.idDiplome WHERE c.idCLasse =:classe");
        $req->bindValue('classe', $classe);
        $req->execute();


        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}




?>