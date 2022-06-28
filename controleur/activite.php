<?php


include_once "modele/bd_activite.php";
include_once "modele/bd_diplome.php";
include_once "modele/bd_classe.php";
include_once "modele/bd_competence.php";
include_once "modele/bd_calendrier.php";

$dateDt = getDateDebut();
$dateDebut = $dateDt['db_date'];
$dateF = getDateFin();
$dateFin = $dateF['db_date'];

$calendrierDebut = getMinYearAndWeek();
$calendrierFin = getMaxYearAndWeek();

$yearFin = $calendrierFin['year'];
$weekFin = $calendrierFin['week'];

$yearDebut = $calendrierDebut['year'];
$weekDebut = $calendrierDebut['week'];



if ($weekFin < 10) {
    $maxCalendrier = $yearFin . '-W0' . $weekFin;
} else {
    $maxCalendrier = $yearFin . '-W' . $weekFin;
}


if ($weekDebut < 10) {
    $minCalendrier = $yearDebut . '-W0' . $weekDebut;
} else {
    $minCalendrier = $yearDebut . '-W' . $weekDebut;
}



$semaine = getWeekByDate($dateDebut, $dateFin);


if (isset($_SESSION["mailUtilisateur"])) {
    $listeDiplome = getDiplome();
    $listeClasse = getClasse();
    $listeProf = getProf();

    if (isset($_POST['btnValider'])) {
        $semaineDeb = substr($_POST['numeroSemaineDebut'], -2);
        $semaineFin = substr($_POST['numeroSemaineFin'], -2);
        if ($semaine < 10) {
            $semaineDeb = substr($semaineDeb, -1);
            $semaineFin = substr($semaineFin, -1);
        }

        insertActivite($_POST['txtNomActivite'], $_POST['professeur'], $_POST['niveauClasse']);
        $recupId = getLastActivite();
        $id = $recupId['num'];
        if (isset($_POST['sous_Competence1']) != "") {

            attribuerActivite($id, $_POST['sous_Competence1'], $semaineDeb, $semaineFin);
        }
        if (isset($_POST['sous_Competence2']) != "") {
            attribuerActivite($id, $_POST['sous_Competence2'], $semaineDeb, $semaineFin);
        }
        if (isset($_POST['sous_Competence3']) != "") {
            attribuerActivite($id, $_POST['sous_Competence3'], $semaineDeb, $semaineFin);
        }
        if (isset($_POST['sous_Competence4']) != "") {
            attribuerActivite($id, $_POST['sous_Competence4'], $semaineDeb, $semaineFin);
        }
    }
    
    if ($_SESSION["idDroitUtilisateur"] == 1) {

        include "vue/vueActivite.Admin.php";
    } 
    if ($_SESSION["idDroitUtilisateur"] == 2) {

        $listeDiplome = getDiplome();
        $listeClasse = getClasseByIdProf($_SESSION["idProfesseur"]);
        if (isset($_POST['btnAjoutActivite'])) {
            insertActivite($_POST['txtNomActivite'], $_POST['SelectCompetence'], $_SESSION['idProfesseur'], $_POST['selectClasse']);

            header("Location:index.php?action=activite");
        }
        include "vue/vueActivite.Prof.php";
    }

    if ($_SESSION["idDroitUtilisateur"] == 3) {
    }
} else {
    header("Location:/?action=connexion&login=non");
}
