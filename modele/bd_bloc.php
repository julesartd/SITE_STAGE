<?php

include_once "bd_connexion.php";







function getBloc() { 
    $resultat = array();
    try {
        $connex = connexionPDO();
        $rec = $connex->prepare("SELECT * FROM bloc");
        $rec->execute();


        $resultat=$rec->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}



// function GetSousCompetence($idCompetence){
//     $resultat = array();

//     try {
//         $cnx = connexionPDO();
//         $req = $cnx->prepare("select * from sous_competence where IDCOMPETENCE = :idCompetence");
//         $req->bindValue('idCompetence', $idCompetence);
//         $req->execute();

//         $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
//     }catch (PDOException $e) {
//         print "Erreur !: " . $e->getMessage();
//         die();
//     }
//     return $resultat;
// }
?>