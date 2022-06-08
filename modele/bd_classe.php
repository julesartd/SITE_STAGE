<?php 


function insertProf($nom, $prenom)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO professeur VALUES(null,:nom, :prenom)");

        $req->bindValue('nom', $nom);
        $req->bindValue('prenom', $prenom);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function insertEleve($nom, $prenom)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO eleve VALUES(null,:nom, :prenom)");

        $req->bindValue('nom', $nom);
        $req->bindValue('prenom', $prenom);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
 
 
?>