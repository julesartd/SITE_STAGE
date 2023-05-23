<?php
include_once "modele/bd_calendrier.php";
include_once "modele/bd_classe.php";

if (isset($_SESSION['mailUtilisateur'])) {

    $listeEvent = getEvent();
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


    if (isset($_POST['btnAjoutEvent'])) {
        $semaineAdd = substr($_POST['numero'], -2);
        if (isset($_POST['numero'], $_POST['evenement'], $_POST['classe'])) {

            if ($semaine < 10) {

                insertEvenement($_POST['evenement'], $_POST['classe'], substr($semaineAdd, -1));
                header("Location:/?action=event");
            } else {

                insertEvenement($_POST['evenement'], $_POST['classe'], $semaineAdd);
                header("Location:/?action=event");
            }
        }
    }

    if (isset($_POST['btnSupprEvent'])) {
        if (isset($_POST['classe'])) {
            deleteEventFromClasse($_POST['classe']);
            header("Location:/?action=event");
        }
    }

    if ($_SESSION["idDroitUtilisateur"] == 1) {
        $listeClasse = getClasse();

        include "vue/vueEvent.php";

    }
    if ($_SESSION["idDroitUtilisateur"] == 2 || $_SESSION["idDroitUtilisateur"] == 3) {
        $listeClasse = getClasseByIdProf($_SESSION['idProfesseur']);

        include "vue/vueEvent.php";
    }
} else {
    header("Location:/?action=connexion&login=non");
}