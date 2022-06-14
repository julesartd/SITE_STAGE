<?php 
function getClasse()
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *, nomDiplome FROM classe inner join diplome on classe.idDiplome=diplome.idDiplome");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getClasseById($id)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *, nomDiplome FROM classe 
        inner join diplome on classe.idDiplome=diplome.idDiplome 
        where idClasse= :id");
        $req->bindValue('id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getClasseByIdProf($idProf)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT *, nomDiplome FROM classe 
        inner join diplome on classe.idDiplome=diplome.idDiplome 
        INNER JOIN attribuer_prof a ON a.idClasse = classe.idClasse WHERE a.idProf = :idProf");
        $req->bindValue('idProf', $idProf);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertClasse($NiveauClasse, $idDiplome)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO classe VALUES (null, :niveauClasse, :idDiplome)");
        $req->bindValue('niveauClasse', $NiveauClasse);
        $req->bindValue('idDiplome', $idDiplome);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function SupprClasse($id)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM classe WHERE idClasse=:idClasse");
        $req->bindValue(':idClasse', $id);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

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
 
function getProfByClasse($idClasse){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM professeur p
        INNER JOIN attribuer_prof ap ON p.idProf = ap.idProf
        WHERE ap.idClasse = :idClasse");
        $req->bindValue('idClasse', $idClasse);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

}

function getEleveByClasse($idClasse){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM eleve e
        INNER JOIN attribuer_eleve ae ON e.idEleve = ae.idEleve
        WHERE ae.idClasse = :idClasse");
        $req->bindValue('idClasse', $idClasse);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

}

function getProf(){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM professeur");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

}
